<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller {
    public function index( Request $request ) {
        $searchTerm = $request->input( 'search' );

        $productsQuery = Product::query();

        if ( !empty( $searchTerm ) ) {
            $productsQuery->where( 'name', 'like', '%' . $searchTerm . '%' )->orwhere( 'email', 'like', '%' . $searchTerm . '%' );
        }

        $products = $productsQuery->paginate( 3 );

        return view( 'products.index', compact( 'products' ) );
    }

    public function create() {
        return view( 'products.create' );
    }

    public function store( Request $request ) {
        //form validation//
        $request->validate( [
            'name'=>'required',
            'email'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,pdf,png,gif|max:100000',
            'progress'=>'required|in:complete,incomplete,inprogress',
            'duedate'=>'required',
        ] );

        //image upload//
        $imageName = time().'.'.$request->image->extension();
        $request->image->move( public_path( 'products' ), $imageName );

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->email = $request->email;
        $product->duedate = $request->duedate;
        $product->progress = $request->progress;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess( 'Product created successfully' );
    }

    public function edit( $id ) {
        $product = Product::where( 'id', $id )->first();
        return view( 'products.edit', [ 'product'=>$product ] );

    }

    public function update( Request $request, $id ) {
        //form validation//
        $request->validate( [
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg,jpeg,pdf,png,gif|max:100000',
            'email'=>'required',
            'duedate'=>'required',
            'progress'=>'required|in:complete,incomplete,inprogress',
        ] );
        $product = Product::where( 'id', $id )->first();
        //image upload//
        if ( isset( $request->image ) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move( public_path( 'products' ), $imageName );
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->email = $request->email;
        $product->duedate = $request->duedate;
        $product->progress = $request->progress;
        $product->save();
        return back()->withSuccess( 'Product update successfully' );

    }

    public function destroy( $id ) {
        $product = Product::where( 'id', $id )->first();
        $product->delete();
        return back()->withSuccess( 'Product delete successfully' );
    }

    public function show( $id ) {
        $product = Product::where( 'id', $id )->first();

        return view( 'products.show', [ 'product'=>$product ] );
    }
}
