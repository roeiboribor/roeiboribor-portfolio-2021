<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = $this->getCategories();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('product_name', 'like', '%' . $request->search . '%')
            ->orWhere('category', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orderBy('category')
            ->paginate(10);
        return view('products.index', [
            'oldSearch' => $request->search,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => $this->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            Product::create([
                'product_name' => $request->product_name,
                'slug' => $request->slug,
                'category' => $request->category,
                'description' => $request->description,
                'product_price' => $request->product_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            return back()->with([
                'status' => 'success',
                'message' => 'Product has been successfully Added!',
            ]);
        } catch (Exception $err) {
            return back()->with([
                'status' => 'error',
                'message' => 'An error has occured please try again!',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.edit', [
            'product' => $product,
            'categories' => $this->categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $slug)
    {
        try {
            $product = Product::where('slug', $slug)->first();

            if ($product->product_name !== $request->product_name) {
                $request->validate(['product_name' => 'distinct|unique:products']);
            }

            $product->update([
                'product_name' => $request->product_name,
                'slug' => $request->slug,
                'category' => $request->category,
                'description' => $request->description,
                'product_price' => $request->product_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            return redirect(route('products.edit', $request->slug))->with([
                'status' => 'success',
                'message' => 'Product has been successfully Updated!',
            ]);
        } catch (Exception $err) {
            return back()->with([
                'status' => 'error',
                'message' => 'An error has occured please try again!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        try {
            $product = Product::firstWhere('slug', $slug);
            $product->delete();
            return back()->with('status', 'success');
        } catch (Exception $err) {
            return back()->with('status', 'error');
        }
    }

    private function getCategories()
    {
        return [
            '☕ Mug',
            '🖼️ Photo paper',
            '🧲 Magnetic',
            '👪 Photo Insert',
            '⭐ Sticker',
            '👕 T-shirt',
            '🖥️ Mousepad',
            '⚪ Rubber Coaster',
        ];
    }
}
