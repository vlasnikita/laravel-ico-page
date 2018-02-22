<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;

class Settings extends Model
{
    use CrudTrait;

    protected $table = 'settings';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $fillable = [ 'key', 'name', 'description', 'value', 'field', 'active', 'created_at', 'updated_at'];
    public $timestamps = true;

}
