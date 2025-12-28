<?php

namespace App\Http\Controllers\Customer;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')->with(['products' => function ($query) {
            $query->where('status', 'available');
        }])->get();
        return view('customer.homepage.index', compact('categories'));
    }
}
