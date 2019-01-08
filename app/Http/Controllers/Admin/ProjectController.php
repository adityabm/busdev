<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectImage;

use Auth;
use DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('pages.dashboard.project.index');
    }

    public function getData(Request $request)
    {
    	if(Auth::user()->role != 'admin'){
	    	$models = Project::with(['user','docs','images'])->where('user_id',Auth::user()->id);
    	}else{
	    	$models = Project::with(['user','docs','images']);
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

    public function proses(Request $request)
    {
    	$id = $request->get('id',null);

    	if($id){
    		$project = Project::find($id);

    		if(!$project){
    			return response()->json(['success' => false,'message' => 'Project Not Found!']);
    		}
    	}else{
    		$project = new Project;
    	}

    	$project->project_name = $request->project_name;
    	$project->description = $request->description;
    	$project->target = $request->target;
    	$project->timeline_start = $request->timeline_start;
    	$project->timeline_end = $request->timeline_end;
    	$project->percentage = $request->percentage;
    	$project->tags = $request->tags;
    	$project->user_id = Auth::user()->id;
    	$project->status = 'submitted';

    	$project->save();

    	$image = $request->image;

    	foreach ($image as $im) {
    		$project_image = new ProjectImage;
    		$project_image->project_id = $project->id;
    		$project_image->image = $im;
    		$project_image->save();
    	}

    	$docs = $request->docs;

    	foreach ($docs as $doc) {
    		$project_docs = new ProjectDetail;
    		$project_docs->project_id = $project->id;
    		$project_docs->project_file = $doc;
    		$project_docs->save();
    	}

    	return response()->json(['success' => true,'message' => 'Success Updating Data']);
    }

    public function uploadImage(Request $request)
    {
    	$imageName = 'projectimage-'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('project/images'), $imageName);
         
    	return response()->json(['success'=>'You have successfully upload file.','name' => $imageName]);
    }

    public function uploadFile(Request $request)
    {
    	$imageName = 'projectfile-'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('project/document'), $imageName);
         
    	return response()->json(['success'=>'You have successfully upload file.','name' => $imageName]);
    }

    public function approve(Request $request)
    {
    	$id = $request->get('id',null);

		$project = Project::find($id);

		if(!$project){
			return response()->json(['success' => false,'message' => 'Project Not Found!']);
		}

		$project->status = 'approved';
		$project->save();

		return response()->json(['success' => true, 'message' => 'Success Updating Status']);
    }

    public function reject(Request $request)
    {
    	$id = $request->get('id',null);

		$project = Project::find($id);

		if(!$project){
			return response()->json(['success' => false,'message' => 'Project Not Found!']);
		}

		$project->status = 'rejected';
		$project->save();

		return response()->json(['success' => true, 'message' => 'Success Updating Status']);
    }
}
