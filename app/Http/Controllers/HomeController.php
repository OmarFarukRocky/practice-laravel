<?php

namespace App\Http\Controllers;

use App\Mail\OfferEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $users = User::latest()->paginate(10);
        return view('home',compact('users'));
    }

    public function sendEmail($id)
    {
        $users = User::find($id)->email;
       // dd($users);
       Mail::to($users)->send(new OfferEmail());
       notify()->success('E-Mail send successfully!');
       return back();
        
    } 
    public function sendAllEmail(Request $request)
    {
        //dd($request->check);
        foreach($request->check as $id){
            Mail::to(User::find($id)->email)->send(new OfferEmail());
        }
        notify()->success('E-Mail send successfully!');
        return back();
        
        
    } 
}
