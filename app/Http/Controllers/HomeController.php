<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ShopSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $shop = ShopSetting::first(); 
        $categories = Category::all();
        
        $featuredProducts = Product::where('is_active', true)
                            ->where('stock', '>', 0)
                            ->where('is_featured', true)
                            ->latest()
                            ->take(8)
                            ->get();

        $latestProducts = Product::where('is_active', true)
                            ->where('stock', '>', 0)
                            ->latest()
                            ->take(8)
                            ->get();

        // Sesuaikan dengan view baru
        return view('home.index', compact('shop', 'categories', 'featuredProducts', 'latestProducts'));
    }

    public function show($slug)
    {
        $shop = ShopSetting::first();
        $product = Product::where('slug', $slug)
                    ->where('is_active', true)
                    ->where('stock', '>', 0)
                    ->firstOrFail();

        $phone = $shop->whatsapp_number ?? '628000000'; 

        if (substr($phone, 0, 1) == '0') {
            $phone = '62' . substr($phone, 1);
        }

        $message = "Halo Admin, saya tertarik dengan produk ini:\n\n" .
                   "Nama: *" . $product->name . "*\n" .
                   "Harga: Rp " . number_format($product->price, 0, ',', '.') . "\n" .
                   "Apakah stoknya masih tersedia?";

        $waUrl = "https://wa.me/{$phone}?text=" . urlencode($message);

        // Sesuaikan dengan view baru
        return view('shop.detail', compact('product', 'shop', 'waUrl'));
    }

    public function shop(Request $request)
    {
        $shop = ShopSetting::first();
        $categories = Category::all();

        $query = Product::where('is_active', true)
                        ->where('stock', '>', 0);

        if ($request->has('kategori')) {
            $slug = $request->get('kategori');
            $query->whereHas('category', function($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $products = $query->latest()->paginate(12);

        // Sesuaikan dengan view baru
        return view('shop.index', compact('shop', 'categories', 'products'));
    }
}
