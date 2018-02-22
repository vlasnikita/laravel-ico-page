<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class User extends Model
{
    use CrudTrait;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'users';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $fillable = [ 'name', 'surname', 'email', 'eth_wallet'] ;
    public $timestamps = true;


//    public function projects(){
//        return $this->hasMany('App\Models\Project');
//    }
//
//    public function usersMessages(){
//        return $this->hasMany('App\Models\UsersMessages');
//    }
}
