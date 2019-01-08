<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\ProjectInvest;

use Auth;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$data = [];
    	$data['submit'] = Project::where('status','submitted');
    	$data['done'] = Project::where('status','done');
    	$data['reject'] = Project::where('status','rejected');
    	$data['invest'] = ProjectInvest::query();

    	if(Auth::user()->role != 'admin'){
    		$data['submit'] = $data['submit']->where('user_id',Auth::user()->id);
    		$data['done'] = $data['done']->where('user_id',Auth::user()->id);
    		$data['reject'] = $data['reject']->where('user_id',Auth::user()->id);
    		$data['invest'] = $data['invest']->where('user_id',Auth::user()->id);
    	}

    	$data['submit'] = $data['submit']->count();
    	$data['done'] = $data['done']->count();
    	$data['reject'] = $data['reject']->count();
    	$data['invest'] = $data['invest']->count();

    	return view('pages.dashboard.index',compact('data'));
    }
}
