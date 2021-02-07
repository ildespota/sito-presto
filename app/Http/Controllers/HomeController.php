<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use COM;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)
            ->orderByDesc('created_at')
            ->take(5)->get();
        return view('home', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        if($announcement->is_accepted)
        {
            return view('announcements.detail', compact('announcement')); 
        }
        else
        {
            return redirect(route('home'));
        }
       
    }


    public function showCategory(Category $category){

        $category_id=Category::find($category->id);
        $announcements=$category_id->announcements()->where('is_accepted', true)->orderByDesc('created_at')->paginate(5);
        
        return view('announcements.category', compact('announcements'));

    }


    public function search(Request $request){

        $q=$request->q;
        $announcements=Announcement::search($q)->where('is_accepted', true)->get(); 
   
        return view('search_result', compact('announcements','q'));
    }


}
