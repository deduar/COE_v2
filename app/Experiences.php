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
    protected $fillable = ['exp_name', 'exp_guide_id', 'exp_photo', 'exp_location', 'exp_summary','exp_min_people', 'exp_max_people', 'exp_duration', 'exp_duration_h', 'exp_price','exp_currency', 'exp_category', 'exp_private_note', 'exp_video','exp_statys','exp_published','exp_flat','exp_paypal','exp_bank_name','exp_beneficiary','exp_account_number','exp_document_type','exp_document_number'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relations
     */
    
    public function experiencesPhotos()
    {
        return $this->hasMany('App\ExperiencesPhotos');
    }
}
