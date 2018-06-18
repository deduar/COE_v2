<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['reservation_date','res_user_id','res_guide_id','status'];

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
