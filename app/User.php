<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'register_code','group', 'status', 'confirmed', 'address', 'last_name', 'avatar', 'age', 'phone', 'nationality', 'job', 'postal_code', 'city', 'country', 'language', 'biography', 'admin','video','company','other_language', 'paypal', 'bank_name','beneficiary','account_number','document_type','document_number'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relations
     */
    
    public function experiences()
    {
        return $this->hasMany('App\Experiences');
    }
}
