<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor');
    }

    public function index(){
        $announcement = Announcement::where('is_accepted',null)
            ->orderByDesc('created_at')
            ->first();
        return view('revisor.index', compact('announcement'));
    }

    private function setAccepted($announcement_id, $value){
        $announcement = Announcement::find($announcement_id);
        $announcement->is_accepted = $value;
        $announcement->save();
        return redirect(route('revisor.index'));
    }

    public function accept($announcement_id){

        return $this->setAccepted($announcement_id, true);
    }

    public function reject($announcement_id){
        return $this->setAccepted($announcement_id, false);
    }
    public function indexTrash(){
    $announcements = Announcement::where('is_accepted',false)
    ->orderByDesc('created_at')->get();
    return view('revisor.trash',compact('announcements')); 
    }


    public function restore($announcement_id){
        /* dd($announcement_id); */
        return $this->setAccepted($announcement_id,null);
    }

    public function destroyAnnouncement(Announcement $announcement)
    {
        $id = $announcement->deleteAnnouncement();
        return redirect()->back()->with('message', "L'annuncio n $id e' stato cancellato definitivamente, RIP.");
    }

}

