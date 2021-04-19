<div class="sidenav">
    {{--teacher der naam show er jonno side bar e Controller theke user naam ansi who login--}}
    <h4 style="color:white;font-family: 'Times New Roman'">{{ Auth::user()->name }}</h4>
    <a target="_blank" style="font-family: 'Times New Roman'" href="/">Visit Site</a>
    <a style="font-family: 'Times New Roman'" href="/admin">Dashboard</a>
    <a style="font-family: 'Times New Roman'" href="/admin/front_view">Front View</a>
    <a style="font-family: 'Times New Roman'" href="/admin/about_solacer">About Solacer</a>
    <a style="font-family: 'Times New Roman'" href="/admin/all_products">All Products</a>
    {{--<a style="font-family: 'Times New Roman'" href="/admin/best_selling_product">Best Selling Product</a>--}}
    <a style="font-family: 'Times New Roman'" href="/admin/team">Team</a>
    <a style="font-family: 'Times New Roman'" href="/admin/social_media">Social Media</a>
    <a style="font-family: 'Times New Roman'" href="/admin/customer_order">Customer Order</a>
    <a style="font-family: 'Times New Roman'" href="/admin/sms_service">SMS Service</a>
    <a style="font-family: 'Times New Roman'" href="/admin/add_users">Add User</a>
    <a style="font-family: 'Times New Roman'" href="/admin/members">Members</a>
    <a style="font-family: 'Times New Roman'" href="/admin/contact">Contact</a>
    <a style="font-family: 'Times New Roman'" href="/admin/password_reset">Password Reset</a>
    {{--for logout--}}
    <a style="color: red; font-family: 'Times New Roman'" href="{{ route('logout') }}"
       onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>




</div>
