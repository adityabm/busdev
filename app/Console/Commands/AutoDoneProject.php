<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Project;
use App\Models\ProjectInvest;
use App\User;

class AutoDoneProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'done:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $project = Project::where('status','approved')->get();
		
		foreach($project as $p){
			$p->status = 'done';
			$p->save();
			
			$invest = ProjectInvest::where('project_id',$p->id)->get();
			foreach($invest as $i){
				$i->status = 'done';
				$i->save();
				
				$user = User::find($i->user_id);
				$user->balance += $i->invest + ($i->invest * $p->percentage) / 100;
				$user->save();
			}
		}
    }
}
