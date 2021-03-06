<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionRemoveFaces;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));

        $categories= Category::all();

        return view('announcements.form', compact('categories', 'uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        // dd($request->uniqueSecret);
        $announcement=Announcement::create([
         'title'=>$request->title,
         'description'=>$request->description,
         'category_id'=>$request->category,
         'price'=>$request->price,
         'user_id'=>Auth::id()
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages= session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images,$removedImages);

        foreach ($images as $image) {
            $i= new AnnouncementImage();
            $fileName = basename($image);
            $newFileName= "public/announcements/{$announcement->id}/{$fileName}";

            Storage::move($image, $newFileName);
    
            $i->file=$newFileName;

            $i->announcement_id= $announcement->id;
            $i->save();


            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 380,380),
                new ResizeImage($i->file, 600,500),
            ])->dispatch($i->id);
        }

        File::deleteDirectory(storage_path('/app/public/temp/{$uniqueSecret}'));
        
        return redirect(route('announcement.thankyou'));
    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret=$request->input('uniqueSecret'); 
        $filename=$request->file('file')->store("public/temp/{$uniqueSecret}");
        dispatch(new ResizeImage(
            $filename, 
            120,
            120

        ));

        session()->push("images.{$uniqueSecret}",$filename);
        return response()->json(
            // session()->get("images.{$uniqueSecret}")    
            [
                    'id'=> $filename
            ]
        );


    }

    public function removeImage(Request $request){
        /* dd('ciao'); */
        $uniqueSecret=$request->input('uniqueSecret'); 
        $filename=$request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $filename);
        Storage::delete($filename);

        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret=$request->input('uniqueSecret'); 
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages= session()->get("removedimages.{$uniqueSecret}", []);
        $images=array_diff($images,$removedImages);
        $data=[];

        foreach($images as $image){
            $data[]=[
                'id'=>$image,
                'src'=> AnnouncementImage::getUrlByFilePath($image, 120 , 120)
            ];
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        /* dd($request, $announcement); */
        $updated_title = $request->title;
        $updated_price = $request->price;
        $updated_description = $request->description;

        if($updated_description){
            $announcement->description = $updated_description;
        }

        if($updated_price){
            $announcement->price = $updated_price;
        }

        if($updated_title){
            $announcement->title = $updated_title;
        }

        $announcement->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }

    public function thankyou(){
        return view('announcements.thankyou');
    }


    public function userDestroyAnnouncement(Announcement $announcement){

        $id = $announcement->deleteAnnouncement();
        return redirect(route('home'));

    }
}
