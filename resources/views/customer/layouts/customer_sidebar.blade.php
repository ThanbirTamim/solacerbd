<div class="sidenav">
    {{--teacher der naam show er jonno side bar e Controller theke user naam ansi who login--}}
    <h4 style="color:white;font-family: 'Times New Roman'">{{$_SESSION['phone']}}</h4>
    <a target="_blank" style="font-family: 'Times New Roman'" href="/">Visit Site</a>
    <a style="font-family: 'Times New Roman'" href="/customer/dashboard">Dashboard</a>

    {{--for logout--}}
    <a style="color: red; font-family: 'Times New Roman'" href="/customer/logout"
       onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="/customer/logout" method="POST" style="display: none;">
        @csrf
    </form>




</div>
