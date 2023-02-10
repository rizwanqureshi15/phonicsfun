<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $guard = 'admins';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this
            ->belongsToMany('App\Role', 'role_admin')
            ->withTimestamps();
    }

    public function isAdmin()
    {
        if($this->role_id === 1){ 
            return true; 
        } else {
            return false; 
        }
    }

    public function hasRole($role)
    {
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }
}