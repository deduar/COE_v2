<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currency';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cur_name', 'cur_exchange'];

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
