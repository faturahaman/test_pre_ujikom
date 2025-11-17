<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camera;
use App\Models\Category; 

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Camera::query()->latest(); 

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12)->withQueryString(); 

        $categories = Category::all();

        return view('pages.ProductPages', [
            'products' => $products,
            'categories' => $categories, 
            'activeCategory' => $request->category_id 
        ]);
    }
}