<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\TagModel;
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
        $products_qty = ProductModel::count();
        $tags_qty = TagModel::count();

        return view('home', [
            'title' => 'Painel de Controle',
            'products_qty' => $products_qty,
            'tags_qty' => $tags_qty,
        ]);
    }
}
