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
        $announcements = Announcement::all()->take(-5)->sortDesc();
        return view('home', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.detail', compact('announcement'));
    }


    public function showCategory(Category $category){

        $category_id=Category::find($category->id);
        $announcements=$category_id->announcements()->paginate(5);
        
        return view('announcements.category', compact('announcements'));

    }


}
