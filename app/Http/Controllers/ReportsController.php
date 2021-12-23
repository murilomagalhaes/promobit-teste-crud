<?php

namespace App\Http\Controllers;

use App\Models\TagModel;

class ReportsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function relevance()
    {
        $relevance = request('relevance') === 'less' ? 'asc' : 'desc';

        $tags = TagModel::withCount('products')->orderBy('products_count', $relevance)->get();

        return view('reports.relevance', [
            'title' => 'Rel. Relevancia de Tags',
            'tags' => $tags,
        ]);
    }
}
