<?php

namespace App\Http\Controllers;

use COM;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Announcement;
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
        $categories = Category::inRandomOrder()->limit(3)->get();

        $announcements = Announcement::where('is_accepted', true)
            ->orderByDesc('created_at')
            ->take(5)->get();
        return view('home', compact('announcements', 'categories'));
    }

    public function show(Announcement $announcement)
    {
       /*  dd($announcement); */
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
        $announcements=Announcement::search($q)->where('is_accepted', true);
   
        return view('search_result', compact('announcements','q'));
    }

    public function notallowed(){
        return view('revisor.notallowed');
    }

    public function locale($locale){
       
        session()->put('locale',$locale);
        return redirect()->back();
    }

}
