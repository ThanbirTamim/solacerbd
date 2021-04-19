<?php

namespace App\Http\Controllers;

use App\AllProducts;
use App\Contact;
use App\CustomerUser;
use App\Order;
use App\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalProduct = AllProducts::count();
        $totalMembers= CustomerUser::count();
        $totalOrder= Order::count();
        $totalUndonePayment = Order::where('payment_status', 'undone')->where('delivery_status', 'undone')->count();
        $totalUndoneDelivary = Order::where('payment_status', 'done')->where('delivery_status', 'undone')->count();
        $contactundone = Contact::where('status', 'undone')->count();
//        return $contactundone;
        return view('Admin.Pages.home',compact('totalProduct','totalMembers','totalOrder','totalUndonePayment','totalUndoneDelivary','contactundone'));
    }
}
