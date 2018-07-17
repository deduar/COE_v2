<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperiencesCategories extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experience_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_name','category_status'];

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
