<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use Sluggable, SoftDeletes;

	protected $table = 'project';
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'project_name'
            ]
        ];
    }

    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }

    public function docs()
    {
    	return $this->hasMany('App\Models\ProjectDetail','project_id','id');
    }

    public function images()
    {
    	return $this->hasMany('App\Models\ProjectImage','project_id','id');
    }
}
