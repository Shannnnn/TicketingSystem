<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $brands = Brand::paginate(10);
        return view('tickets.settings.brands.index')->with('brands', $brands);
    }

    public function create() {
        return view('tickets.settings.brands.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'brand'=>'required'
        ]);

        $brands = $request['brand'];
        $brand = new Brand();
        $brand->brand = $brands;
        $brand->save();

        return redirect()->route('brands.index');
    }

    public function show($id) {

        return redirect('brands');
    }

    public function destroy($id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
