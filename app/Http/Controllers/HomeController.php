<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::with(['user','docs','images'])->where('status','approved')->take(6)->get();

        return view('pages.landing.index',compact('project'));
    }

    public function detailProject($slug)
    {
        $project = Project::with(['user','docs','images'])->where('slug',$slug)->first();

        if(!$project){
            return redirect()->back();
        }

        return view('pages.landing.project',compact('project'));
    }
}
