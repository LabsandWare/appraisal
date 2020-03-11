<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'staff_id', 'supervisor_comment', 'employee_comment',
        'supervisor_status', 'comment_status', 'employee_goal_points',
        'supervisor_goal_points', 'supervisor_achievement_points', 'employee_achievement_points',
        'supervisor_challenging_points', 'supervisor_challenging_points', 'employee_uuid'
    ];


    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }

}