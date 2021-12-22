<?php

namespace App\Http\Controllers;

use App\Models\TagModel;

class TagsController extends Controller
{
    /**
     * Show Tags.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = TagModel::orderBy('id', 'desc')->paginate();

        return view('tags', [
            'title' => 'Tags',
            'tags' => $tags
        ]);
    }

    /**
     * Search Tags.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        $query = request('query') ?? '';

        $tags = TagModel::where('name', 'like', "%$query%")
            ->orderBy('id', 'desc')
            ->paginate();

        return view('tags', [
            'title' => 'Tags',
            'tags' => $tags,
            'query' => $query
        ]);
    }

    /**
     * Show the specified Tag for edit/delete, or show the form to create a new Tag.
     *
     * @param  TagModel $tag
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function form(TagModel $tag = null)
    {
        return view('tag_form', [
            'title' => 'Tags',
            'tag' => $tag
        ]);
    }

    /**
     * Store a new Tag or update an existing one.
     */
    public function store(TagModel $tag = null)
    {
        // Validates tag name
        $this->validate(request(), [
            'name' => 'required|max:40|alpha_dash',
        ]);

        // If tag is null, create a new one
        TagModel::updateOrCreate(
            ['id' => $tag->id ?? null],
            ['name' => request('name')]
        );

        // Redirect to tags page with success message
        return redirect('tags')->with('success', 'Tag gravada!');
    }

    /**
     * Delete a Tag.
     */
    public function destroy(TagModel $tag)
    {
        if ($tag->delete()) {
            return redirect('tags')->with('warning', 'Tag Excluída!');
        }

        return redirect('tags')->with('warning', 'Tag não encontrada ou já excluída!');
    }
}
