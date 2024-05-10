<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Insertion;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{


    public function index() 
    {
        $insertion_to_check = Insertion::where('is_accepted', null)->first();
        return view('revisor.index', compact('insertion_to_check'));
    }

    public function accept (Insertion $insertion)
    {
        $insertion->setAccepted(true);
        return redirect()->back()->with('accepted', __("ui.insertionRevisorAccepted"));

    }

    public function decline (Insertion $insertion)
    {
        $insertion->setAccepted(false);
        return redirect()->back()->with('denied', __("ui.insertionRevisorDenied"));
    }

    public function becomeRevisor (){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homePage')->with('revisor', __("ui.revisorRequest"));
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:make-user-revisor', ["email"=>$user->email]);
        return redirect()->route('homePage')->with('message', __("ui.becameRevisor"));
        
    }

    
}
