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

    public function transaction()
    {
    	return view('pages.dashboard.transaction.index');
    }

    public function getDataTransaction(Request $request)
    {
    	if(Auth::user()->role != 'admin'){
	    	$models = ProjectInvest::with(['project'])->where('user_id',Auth::user()->id);
    	}else{
	    	$models = ProjectInvest::with(['project']);
    	}
        $params = $request->get('params', false);
        $order  = $request->get('order', false);

        if ($params) {
            foreach ($params as $key => $val) {
                if ($val == '') continue;
                switch ($key) {
                    default:
                        $models = $models->where($key, $val);
                        break;
                }
            }
        }

        $count = $models->count();

        if ($order) {
            $order_direction = $request->get('order_direction', 'asc');
            if (empty($order_direction)) $order_direction = 'asc';

            switch ($order) {
                default:
                    $models = $models->orderBy($order, $order_direction);
                    break;
            }
        }

        $page    = $request->get('page', 1);
        $perpage = $request->get('perpage', 20);

        $models = $models->skip(($page - 1) * $perpage)->take($perpage)->get();
        foreach ($models as &$model) {
        	$model->role = Auth::user()->role;
        }

        $result = [
            'data'  => $models,
            'count' => $count
        ];

        return response()->json($result);
    }
}
