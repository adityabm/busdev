<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectInvest;

use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug,$pay)
    {
        $project = Project::with(['user','docs','images'])->where('slug',$slug)->first();

        return view('pages.landing.order',compact('project','pay'));
    }

    public function proses(Request $request)
    {
    	$id = $request->id;
    	$bayar = $request->bayar;

    	$project = Project::find($id);
    	$project->invest += $bayar;
    	$project->save();

    	$invest = new ProjectInvest;
    	$invest->project_id = $id;
    	$invest->user_id = Auth::user()->id;
    	$invest->invest = $bayar;
    	$invest->status = 'paid';
    	$invest->save();

    	return response()->json(['success' => true,'message' => 'Berhasil Menginvestasikan Project ini. Terima Kasih']);
    }
}
