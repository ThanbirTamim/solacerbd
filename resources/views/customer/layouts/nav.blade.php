<!--{{--navbar--}}-->
<nav class="navbar navbar-expand-md  fixed-top maine-menu" style="background: linear-gradient(dodgerblue, white)">
    <div class="container">
        <button class="navbar-toggler ml-auto" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"> <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span> </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active"> <a class="nav-link" href="/">Home</a> </li>
                <li class="nav-item"> <a class="nav-link" href="/all-products" tabindex="-1" aria-disabled="true">All Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="/customer/membership" tabindex="-1" aria-disabled="true">Membership</a></li>
                <li class="nav-item"> <a class="nav-link" href="/customer/contact" tabindex="-1" aria-disabled="true"> Contact </a></li>
                <li class="nav-item"> <a class="nav-link" href="/checkout/cart" tabindex="-1" aria-disabled="true"> Cart <i class="fa fas fa-cart-plus" style="font-size: 19px;color: black"></i></a></li>
                @if (!isset($_SESSION['valid']))
                <li class="nav-item"> <a class="nav-link" href="/customer/login" tabindex="-1" aria-disabled="true">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
