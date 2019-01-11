<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInvest extends Model
{
    use SoftDeletes;

	protected $table = 'project_invest';

	public function project()
	{
		return $this->hasOne('App\Models\Project','id','project_id');
	}
}
