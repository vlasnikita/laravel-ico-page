@extends('layouts.app')
@section('title') @lang('cabinet2.text_1') @endsection
@section('description') @endsection
@section('keywords')
@endsection
@section('content')

    <script src="/js/ethereumjs-accounts.js"></script>
    <script src="/js/eth_create.js"></script>
    <script src="/js/eth_profile.js"></script>

    <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-6 animate-box">
                    <h3>Get In Touch</h3>
                    <form action="/{{$locale}}/profile/password_reset" method="post">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="old_password">Old Password</label>
                                <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Your old password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password">New Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Your new password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password_confirmation">Repeat Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repeat new password">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Edit" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="gtco-contact-info">
                        <h3>User Information</h3>
                        <ul>
                            <li class="email"><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></li>
                        </ul>

                        <form action="/{{$locale}}/save_profile" method="post">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="eth_wallet">Your ETH wallet</label>
                                    <input type="text" id="eth_wallet" name="eth_wallet" class="form-control" placeholder="Your ETH wallet" value="{{Auth::user()->eth_wallet}}">
                                    You tokens balance: <b><span id="token_balance">Unknown</span></b> XWIN
                                </div>
                            </div>

                            <div class="row form-group" id="private_key_div" style="display: none">
                                <div class="col-md-12">
                                    <label for="eth_wallet">Private key for ETH wallet</label>
                                    <input type="text" id="private_key" name="private_key" class="form-control" value="">
                                    Please print and save your private key. We can't restore it.
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="button" value="Create new wallet" id="create_wallet" class="btn btn-primary">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>

                        <div class="form-group">
                            <input type="button" value="Get tokens (pay 10 BTC)" id="pay_btc" class="btn btn-primary">
                            <span id="pay_btc_span" style="display: none">
                                <br>
                                <i>Please send <span id="pay_btc_price"></span> BTC to <span id="pay_btc_address"></span> to buy tokens</i>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        $('#pay_btc').on('click', function () {
            $.ajax({
                url: "<?=url('/') . '/en/go_blockchain' ?>",
                type: "post",
                success: function (response) {
                    var server_response = jQuery.parseJSON( response );
                    if (server_response['blockchain_address'].length > 10 && server_response['blockchain_price'] > 0) {

                        $('#pay_btc_price').html(server_response['blockchain_price']);
                        $('#pay_btc_address').html(server_response['blockchain_address']);
                        $('#pay_btc_span').show(500);

                    }else alert('Some error, please try again later') ;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Some error, please try again later') ;
                }
            });
        }) ;
    </script>

@endsection