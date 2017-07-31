<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $products = Product::paginate(10);
        return view('tickets.settings.products.index')->with('products', $products);
    }

    public function create() {

        return view('tickets.settings.products.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'product'=>'required'
        ]);

        $prod = $request['product'];
        $product = new Product();
        $product->product = $prod;
        $product->sortproduct = $prod;
        $product->save();

        return redirect()->route('products.index');
    }

    public function show($id) {

        return redirect('products');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
