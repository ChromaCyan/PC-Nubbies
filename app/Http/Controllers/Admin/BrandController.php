<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $brands = Brand::query();

        if ($query) {
            $brands->where('name', 'like', '%' . $query . '%')
                ->orWhere('slug', 'like', '%' . $query . '%');
        }

        $brands = $brands->get();

        return Inertia::render(
            'Admin/Brand/Index',
            [
                'brands' => $brands,
            ]
        );
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->update();

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->products()->exists()) {
            return redirect()->route('admin.brands.index')->with('error', 'Cannot delete brand because it is associated with products.');
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}
