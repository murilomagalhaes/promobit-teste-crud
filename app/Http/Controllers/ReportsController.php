<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function relevance()
    {
        return view('reports.relevance', ['title' => 'Rel. Relevancia']);
    }
}
