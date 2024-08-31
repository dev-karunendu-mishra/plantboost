<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Str;


class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        // Get the full URL with query parameters
        $fullUrl = $request->fullUrl();
        
        // Store it in the session
        $request->session()->put('ad_url', $fullUrl);
        $products = Product::first();
        if ($products) {
            $seo = [
                'title' => $products->seo_title ?: $products->name,
                'description' => $products->seo_description ?: Str::limit($products->seo_description, 160),
                'keywords' => $products->seo_keywords ?: 'default, keywords',
            ];
            return view('default.home-new', compact('products', 'seo'));
        } else {
            return view('default.error'); // Adjust 'index' to your specific route name
        }
    }

    public function getProduct(Request $request, $productURL)
    {
        // Get the full URL with query parameters
        $fullUrl = $request->fullUrl();
        // Store it in the session
        $request->session()->put('ad_url', $fullUrl);
        $products = Product::where('product_url', $productURL)->with(['images'])->first();
        if ($products) {
            $seo = [
                'title' => $products->seo_title ?: $products->name,
                'description' => $products->seo_description ?: Str::limit($products->description, 160),
                'keywords' => $products->seo_keywords ?: 'default, keywords',
            ];
            return view('default.home-new', compact('products', 'seo'));
        } else {
            return view('default.error'); // Adjust 'index' to your specific route name
        }
    }

    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255', // Minimum 3 characters
            'mobile' => ['required', 'regex:/^[6-9]\d{9}$/'], // Validation for mobile field
            'address_line_one' => 'required|string|min:4|max:255', // Minimum 4 characters
            'address_line_two' => 'nullable|string|min:5|max:255', // Minimum 5 characters if provided
            'pin' => 'required|string|size:6', // Assuming pin code is 6 digits
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'product_id' => 'required|exists:products,id', // Ensures that the Order exists
            'source' => 'nullable|string',
        ]);
        // Check if an order exists with the same mobile number in the last 30 days
        $existingOrder = Order::where('mobile', $validatedData['mobile'])
            ->where('created_at', '>=', now()->subDays(7))
            ->exists();

        if ($existingOrder) {
            return redirect()->back()->withErrors(['mobile' => "There's technical glitch going on at our end. Don't worry we have received your order. Or you might had already placed an order with us within the past few days. Kindly wait we'll deliver your order soon!!!!"])->withInput();
        }
        // Capture the client IP
        $validatedData['client_ip'] = $request->ip();
        $validatedData['source'] = $request->session()->get('ad_url');

        // Store the order
        $order = Order::create($validatedData);

        // Fetch the related product details
        $product = Product::find($validatedData['product_id']);

        // Flash success message
        $request->session()->flash('status', 'Your order has been placed successfully!');

        // Redirect to the thank you page with the order and product details
        return redirect()->route('thankyou')->with([
            'order' => $order,
            'product' => $product
        ]);
    }
}
