<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;

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
    public function create()
    {

        $uniqueSecret = base_convert(sha1(uniqid(mt_rand())), 16, 36);

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
        
        return redirect(route('announcement.thankyou'));
    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret=$request->uniqueSecret; 
        $filename=$request->file('file')->store("public/temp/{$uniqueSecret}");
        session()->push("images.{$uniqueSecret}",$filename);
        return response()->json(
            session()->get("images.{$uniqueSecret}")    
        );
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
        //
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
}
