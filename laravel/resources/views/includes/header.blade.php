<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="col-xs-2">
                <div id="gtco-logo"><a href="/">EthereumWorks</a></div>
            </div>
            <div class="col-xs-8 text-center menu-1">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                </ul>
            </div>
            <div class="col-xs-2 text-right hidden-xs menu-2">

                    @if(Auth::check())
                    <ul style="margin-bottom: 20px;"><li class="btn-cta"><a href="/{{$locale}}/profile"><span>Profile</span></a></li></ul>
                    <ul><li class="btn-cta"><a href="/{{$locale}}/logout"><span>Logout</span></a></li></ul>
                    @else
                    <ul><li class="btn-cta"><a href="#gtco-started"><span>Login</span></a></li></ul>
                    @endif

            </div>
        </div>

    </div>
</nav>

<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(/images/img_bg_1.jpg);">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>EthereumWorks</h1>
                        <h2>Tokens sold: <span id="tokens_sold"></span> XWIN</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>