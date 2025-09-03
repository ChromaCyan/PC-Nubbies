<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Brand;
<<<<<<< HEAD
=======
use App\Models\CartItem;
use App\Models\OrderItem;
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Category::get();

=======
    public function index(Request $request)
    {
        $query = $request->query('query');

        $products = Product::with('category', 'brand', 'product_images');

        if ($query) {
            $products = $products->where('title', 'like', '%' . $query . '%')
                ->orWhereHas('category', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('brand', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
        }

        $products = $products->get();

        $brands = Brand::get();
        $categories = Category::get();

>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
        return Inertia::render(
            'Admin/Product/Index',
            [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]
        );
<<<<<<< HEAD
    }



    public function store(Request $request)
    {

        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //check if product has images upload 

        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);
                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    //update 
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        // dd($product);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        // Check if product images were uploaded
        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            // Loop through each uploaded image
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);

                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        $product->update();
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::where('id', $id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Image deleted successfully.');
    }

    public function destory($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
=======
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
    }




    public function store(Request $request)
    {

        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //check if product has images upload 

        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);
                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

        public function search(Request $request)
    {
        $query = $request->get('query');

        $products = Product::with('category', 'brand', 'product_images')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('brand', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();

        return Inertia::render(
            'Admin/Product/Index',
            [
                'products' => $products,
                'brands' => Brand::get(),
                'categories' => Category::get()
            ]    
        );
    }


   public function update(Request $request, $id)
{

        $product = Product::findOrFail($id);

        // dd($product);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        // Check if product images were uploaded
        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            // Loop through each uploaded image
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);

                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        $product->update();
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::where('id', $id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Image deleted successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Check if the product is in any cart or order
        $inCart = CartItem::where('product_id', $product->id)->exists();
        $inOrder = OrderItem::where('product_id', $product->id)->exists();
    
        if ($inCart || $inOrder) {
            // If the product is in use, redirect back with an error message
            return redirect()->route('admin.products.index')->with('error', 'Product cannot be deleted     because it exist in customer cart or order');
        }

        // If not in use, proceed to delete the product
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}