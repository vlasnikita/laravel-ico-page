$( document ).ready(function() {
    // var passphrase = randomString(15) ;
    var accounts = new Accounts();
    var newAccount = accounts.new(); //passphrase.value

    var account = newAccount.address ;
    var private = newAccount.private ;

    $('#create_wallet').click(function(){
        $('#eth_wallet').val(account) ;
        $('#private_key').val(private) ;
        $('#private_key_div').show(500) ;
    });
});