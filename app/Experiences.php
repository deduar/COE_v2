<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experience';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['exp_name', 'exp_photo', 'exp_location', 'exp_summary','exp_min_people', 'exp_max_people', 'exp_duration', 'exp_duration_h', 'exp_price', 'exp_category', 'exp_private_note'];

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
