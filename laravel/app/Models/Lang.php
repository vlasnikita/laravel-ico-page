<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Lang extends Model
{
    use CrudTrait;

    protected $table = 'languages';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $fillable = ['name', 'app_name', 'active', 'native', 'abbr'];
    public $timestamps = true;

    public static function getActive() {

        $host = env('DB_HOST', 'localhost'); // адрес сервера
        $database = env('DB_DATABASE', 'laravel'); // имя базы данных
        $user = env('DB_USERNAME', 'root'); // имя пользователя
        $password = env('DB_PASSWORD', ''); // пароль

        $link = mysqli_connect($host, $user, $password, $database) ;

        $query = "SELECT * FROM `laravel_languages` WHERE active = 1";
        $res = mysqli_query($link, $query);
        $lang_arr = [];
//        dd($link);
        while($row = mysqli_fetch_array($res))
        {
            $lang_arr[$row['abbr']] = $row['name'];

        }

        mysqli_close($link);
        return $lang_arr;

//        $lang = json_decode(file_get_contents('../public/cache/languages.txt'));
//        return (array) $lang->active ;

    }

    public static function getDefault() {

        $host = env('DB_HOST', 'localhost'); // адрес сервера
        $database = env('DB_DATABASE', 'laravel'); // имя базы данных
        $user = env('DB_USERNAME', 'root'); // имя пользователя
        $password = env('DB_PASSWORD', ''); // пароль


        $link = mysqli_connect($host, $user, $password, $database) ;

        $query = "SELECT * FROM `laravel_languages` WHERE active = 1 AND `default` = 1";
        $res = mysqli_query($link, $query);
        $lang_arr = '';
        while($row = mysqli_fetch_array($res))
        {
            $lang_arr = $row['abbr'];

        }

        mysqli_close($link);
        return $lang_arr;

//        $lang = json_decode(file_get_contents('../public/cache/languages.txt'));
//        return $lang->default ;

    }

    public static function getImages() {

        $host = env('DB_HOST', 'localhost'); // адрес сервера
        $database = env('DB_DATABASE', 'laravel'); // имя базы данных
        $user = env('DB_USERNAME', 'root'); // имя пользователя
        $password = env('DB_PASSWORD', ''); // пароль

        $link = mysqli_connect($host, $user, $password, $database) ;

        $query = "SELECT * FROM `laravel_languages` WHERE active = 1";
        $res = mysqli_query($link, $query);
        $lang_arr = [];
        while($row = mysqli_fetch_array($res))
        {
            $lang_arr[$row['abbr']] = $row['flag'];

        }

        mysqli_close($link);
        return $lang_arr;

//        $lang = json_decode(file_get_contents('../public/cache/languages.txt'));
//        return (array) $lang->images ;
    }

    // Lang::active()->get();
    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

}