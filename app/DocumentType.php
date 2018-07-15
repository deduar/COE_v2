<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'document_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['documentType_name', 'documentType_status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relations
     */

    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
