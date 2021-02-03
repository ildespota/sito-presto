<?php

namespace App\Http\Controllers;

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
        $announcements = Announcement::all()->take(-5)->sortDesc();
        return view('home', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.detail', compact('announcement'));
    }
}
