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

    public function indexProject()
    {
        $project = Project::with(['user','docs','images'])->where('status','approved')->paginate(10);
        
        return view('pages.landing.list-project',compact('project'));
    }

    public function detailProject($slug)
    {
        $project = Project::with(['user','docs','images'])->where('slug',$slug)->first();

        if(!$project){
            return redirect()->back();
        }

        return view('pages.landing.project',compact('project'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $project = Project::with(['user','docs','images'])->where('status','approved')->where('project_name','like',"%$search%")->paginate(10);
        
        return view('pages.landing.list-search',compact('project','search'));   
    }
}
