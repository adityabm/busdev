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
}
