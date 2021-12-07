<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dash\Todo;
use App\Models\Dash\Client;
use App\Models\Dash\Product;
use App\Models\User;


class DashController extends Controller
{

    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $clients = Client::all();
        $todos = Todo::latest()->paginate(5);

        return view('dash.index', compact('todos', 'clients', 'products', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
