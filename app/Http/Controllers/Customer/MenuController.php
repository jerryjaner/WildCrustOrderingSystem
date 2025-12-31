<?php

namespace App\Http\Controllers\Customer;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
         $categories = Category::where('status', 'active')->with(['products' => function ($query) {
            $query->where('status', 'available');
        }])->get();
        return view('customer.menu.index', compact('categories'));
    }
}
