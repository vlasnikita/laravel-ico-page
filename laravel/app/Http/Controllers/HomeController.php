<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Book;
use App\Models\Subtitle;


use URL;
use Config;
use Cookie;
use Auth;
use Route;
use Image;
use File;

use Dedicated\GoogleTranslate\Translator;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function blockchain_ipn(Request $request){
        $content = $request->all();

        mail("esalitrynskiy@gmail.com", "blockchain_ipn_unconfirmed", print_r($content, true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setLanguage(Request $request, $lang)
    {
        $url_array = array_slice(explode("/",url()->previous()),3);
        $url_array[0] = $lang;
        $comeback = implode('/',$url_array);
        if(!empty($lang) && array_key_exists($lang, Config::get('app.locales'))) {
            Cookie::queue(Cookie::make('lang', $lang, 3600));
            return redirect($comeback);
        } else {
            return redirect('/');
        }
    }

}
