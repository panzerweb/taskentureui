<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

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
    

    public function starred()
    {
        return view('pages.starred');
    }
    public function trash()
    {
        return view('pages.trash');
    }

    // Help Function
    // Also The profile of each developers
    public function help()
    {
        $devs = Developer::allDevs(); //Show all Developers

        return view('pages.help', compact('devs'));
    }

    public function findDevs($id){
        $dev = Developer::findDeveloper($id);

        return view('pages.developer', ['dev' => $dev]);
    }

    // FAQS Function
    public function FAQS(){
        return view('pages.faqs');
    }
    // Report Bug
    public function ReportBug(){
        return view('pages.reportbug');
    }
    // Developers Message
    public function devMessage(){
        return view('pages.devmessage');
    }

}
public function index()
    {
        return view('home');
    }