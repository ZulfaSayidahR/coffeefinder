<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCoffee = CoffeeShop::count();
        $totalReview = Review::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact(
            'totalCoffee',
            'totalReview',
            'totalUser'
        ));
    }
}