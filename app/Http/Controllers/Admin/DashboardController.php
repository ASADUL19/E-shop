<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;


class DashboardController extends Controller
{
    public function dashboardview()
    {
        $categories=Category::all()->count();
        $products=Product::all()->count();
        $users=User::all()->count();
         return view('dashboard.admin',compact('categories','products','users'));
    }

    public function userdetails()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }
    public function alluserdeatils($id)
    {
        $users=User::find($id);
        return view('admin.user.user_details',compact('users'));
    }
}
