<nav class="navbar navbar-fixed-top navbar-expand p-0 nav">
    <a class="navbar-brand text-center col-xs-12 col-md-2 col-lg-2 mr-0" href="{{route('home')}}"
        style="color:#000;font-weight:700;"> EKSPOSISI </a>

    <div id="timerdiv" class="col-md-8">
        <h3 class="time text-center" id="timerdiv">
            <span id="mins">{{$menit}} </span>
            <span>:</span>
            <span id="seconds">{{$detik}}</span>
        </h3>
    </div>



    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button"><span
            class="oi oi-menu"></span></button>
</nav>
