<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Auth;
use Hash;
use Validator;

use App\Http\Requests\PasswordRequest as PasswordRequest;
use App\Http\Requests\EthAddressRequest as EthAddressRequest;

use App\Http\Requests;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function save_profile(EthAddressRequest $request) {
        $update = [
            'eth_wallet' => $request->input('eth_wallet')
        ];
        DB::table('users')->where('id', Auth::user()->id)->update($update);

        return redirect('/profile');
    }

    public function passwordReset(PasswordRequest $request){

        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
            if($request->input('password') === $request->input('password_confirmation')){
                $update = [
                    'password' => Hash::make($request->input('password'))
                ];
                DB::table('users')->where('id', Auth::user()->id)->update($update);
                echo 'Password changed';
                return redirect('/profile');
            } else {
                echo 'Passwords do not match';
            }
        } else {
            echo 'You entered the wrong old password';
        }

    }

    public function go_blockchain(){
        $btc_count = 10 ; // Я хочу купить токенов на 10 BTC
        $usd_exchange = 10876 ; // Цена BTC в долларах США
        $usd_sum = round( $btc_count * $usd_exchange, 10 ) ; // Конвертируем сумму в BTC в доллары (или можно напрямую передавать на api цену в BTC)

        $credentials['xpub'] = '' ; // XPUB KEY
        $credentials['key'] = '' ; // API KEY

        $price = file_get_contents('https://blockchain.info/tobtc?currency=USD&value=' . $usd_sum); // Эту сумму и адрес сохраняем в базу данных и привязываем к пользователю

        $btc_payments['payment_id'] = rand(11111,93333333);
        $btc_payments['blockchain_price'] = $price;

        $my_callback_url = URL::to('/' . request()->segment(1) . '/blockchain_ipn?payment_id=' . $btc_payments['payment_id']); // Ссылка куда придет уведомление о оплате

        $root_url = 'https://api.blockchain.info/v2/receive';
        $parameters = 'xpub=' . $credentials['xpub'] . '&callback=' . urlencode($my_callback_url) . '&key=' . $credentials['key'];
        $response = file_get_contents($root_url . '?' . $parameters);
        $object = json_decode($response);

        $btc_payments['blockchain_address'] = $object->address; // Этот адрес и сумму сохраняем в базу данных и привязываем к пользователю

        if (strlen($btc_payments['blockchain_address']) > 10 && $btc_payments['blockchain_price'] > 0) {
            $return = array(
                'blockchain_address' => $btc_payments['blockchain_address'],
                'blockchain_price' => $btc_payments['blockchain_price']
            );

            return json_encode($return);
        }else die('Some error happened') ;
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

}
