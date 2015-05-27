<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

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
    protected $fillable = ['alias', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['password', 'remember_token', 'email', 'id', 'created_at', 'updated_at','puntos', 'dinero_anadido', 'nombre_usuario', 'apellido_usuario', 'pais', 'ciudad', 'cp', 'direccion'];

    /**
     * The hasMany relation.
     * 
     */
    public function dreams()
    {
        return $this->hasMany('App\Dream');
    }

}
