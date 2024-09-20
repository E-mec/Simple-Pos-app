<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorJPG;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);


        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product_code = $request->product_code;

        $products = new Product;

        //  Image Section

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $file->move(public_path() . '/product/images', $file->getClientOriginalName());
            $product_image = $file->getClientOriginalName();
            $products->product_image = $product_image;
        }

        // Barcode image selection

        $generator = new BarcodeGeneratorJPG();

        file_put_contents('product/barcodes/' . $product_code . '.jpg',  $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 3, 50));

        // $barcodes = $generator->getBarcode($product_code, $generator::TYPE_STANDARD_2_5, 2, 60);

        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->alert_stock = $request->alert_stock;
        $products->barcode = $product_code . '.jpg';
        $products->save();

        return redirect()->back()->with('message', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $products)
    {
        $product_code = $request->product_code;

        $products =  Product::find($products);

        //  Image Section

        if ($request->hasFile('product_image')) {

            if ($products->product_image != '') {
                $proImage_path = public_path().'product/images/' . $products->product_image;
                unlink($proImage_path);
            }

            $file = $request->file('product_image');
            $file->move(public_path() . '/product/images', $file->getClientOriginalName());
            $product_image = $file->getClientOriginalName();
            $products->product_image = $product_image;
        }

        // Barcode image selection

        if ($request->product_code != '' && $request->product_code != $products->product_code) {

            $unique = Product::where('product_code', $product_code)->first();

            if ($unique) {
                return redirect()->back()->with('message', 'Product Code Already Taken!!');

            }

            if ($products->barcode != '') {
                $barcode_path = public_path().'product/barcodes/' . $products->barcode;
                unlink($barcode_path);
            }

            $generator = new BarcodeGeneratorJPG();

            file_put_contents('product/barcodes/' . $product_code . '.jpg',  $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 3, 50));

            $products->barcode = $product_code . '.jpg';

        }


        $products->product_name = $request->product_name;
        // $products->product_code = $request->product_code;
        $products->product_code = $product_code;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->alert_stock = $request->alert_stock;
        $products->save();



        // $product -> update($request->all());

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function GetProductBarcode()
    {
        $productsBarcode = Product::select('barcode', 'product_code')->get();

        return view('products.barcode.index', compact('productsBarcode'));
    }
}
