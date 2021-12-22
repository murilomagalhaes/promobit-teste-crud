<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

class ProductsController extends Controller
{
    /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = ProductModel::orderBy('id', 'desc')->paginate();

        return view('products', [
            'title' => 'Produtos',
            'products' => $products
        ]);
    }

    /**
     * Search products.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        $query = request('query') ?? '';

        $products = ProductModel::where('name', 'like', "%$query%")
            ->orderBy('id', 'desc')
            ->paginate();

        return view('products', [
            'title' => 'products',
            'products' => $products,
            'query' => $query
        ]);
    }

    /**
     * Show the specified product for edit/delete, or show the form to create a new one.
     *
     * @param  ProductModel $product
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function form(ProductModel $product = null)
    {
        return view('product_form', [
            'title' => 'products',
            'product' => $product
        ]);
    }

    /**
     * Store a new Tag or update an existing one.
     */
    public function store(ProductModel $product = null)
    {
        // Validates product name
        $this->validate(request(), [
            'name' => 'required|max:140',
        ]);

        // If product is null, create a new one
        ProductModel::updateOrCreate(
            ['id' => $product->id ?? null],
            ['name' => request('name')]
        );

        // Redirect to products page with success message
        return redirect('products')->with('success', 'Produto gravado!');
    }

    /**
     * Delete a Tag.
     */
    public function destroy(ProductModel $product)
    {
        if ($product->delete()) {
            return redirect('products')->with('warning', 'Produto excluído!');
        }

        return redirect('products')->with('warning', 'Produto não encontrado ou já excluído!');
    }
}
