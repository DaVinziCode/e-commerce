<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = array("products" => DB::table('products')->orderBy('id', 'desc')->simplePaginate(10));
        // $products = Product::all();
        // return view('products.index', ['products' => $products]);
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            "product_name" => 'required',
            "qty" => 'required',
            "actual_stock" => 'required',
            "stock_left" => 'required',
            'price'=> 'required|decimal:2',
            "description" => 'nullable',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image'=> 'mimes:jpeg,png,bmp,tiff |max:4096',
            ]);

            $filenameWithExtension = $request->file('product_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('product_image')->storeAs('public/product', $filenameToStore);

            $request->file('product_image')->storeAs('public/product/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/product/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 93);

            $data['product_image'] = $filenameToStore;
        }



        Products::create($data);

        // return redirect('/')->with('message', 'New Student was added successfully!');
        return to_route('admin.products.index')->with('message', 'New Product was added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('admin.products.show', ['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('admin.products.edit', ['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
         $data = $request->validate([
            "product_name" => 'required',
            "quantity" => 'required',
            "actual_stock" => 'required',
            "stock_left" => 'required',
            'price'=> 'required|decimal:2',
            "description" => 'nullable',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image'=> 'mimes:jpeg,png,bmp,tiff |max:4096',
            ]);

            $filenameWithExtension = $request->file('product_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('product_image')->storeAs('public/product', $filenameToStore);

            $request->file('product_image')->storeAs('public/product/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/product/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 93);

            $data['product_image'] = $filenameToStore;
        }

        Products::create($data);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect('/')->with('message', 'Data was successfully deleted!');
    }

    public function createThumbnail($path, $width, $height){
        $img = Image::make($path)->resize($width, $height, function
        ($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
