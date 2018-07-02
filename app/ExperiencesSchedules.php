<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperiencesSchedules extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experience_schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['exp_id', 'exp_begin_date','exp_end_date','exp_schedule_type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relations
     */
}
