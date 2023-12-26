<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Resume;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Products::latest()->paginate(5);
        $products = Products::orderBy('sequence', 'asc')->get();
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Products::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Products $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Products $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Products $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('info', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Products $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $product = Products::where('id', $id)->first();
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function updateColumnOrder(Request $request)
    {

        $newOrder = $request->input('newOrder');
        $ResumeId = $request->input('resume_id');
        if ($newOrder) {
            foreach ($newOrder as $index => $productId) {
                Products::where('id', $productId)->update(['sequence' => $index + 1]);
            }
        } else {
            foreach ($ResumeId as $index => $resumeId) {
                Resume::where('id', $resumeId)->update(['sequence' => $index + 1]);
            }
        }

        return response()->json(['message' => 'Column order updated successfully']);
    }
}
