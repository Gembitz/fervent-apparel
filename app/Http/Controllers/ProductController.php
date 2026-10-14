<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getDummyProducts()
    {
        return [
            ['id' => 1, 'name' => 'Structured Azure Wrap Blazer', 'slug' => 'structured-azure-wrap-blazer', 'brand' => 'FERVENT ATELIER', 'price' => 489000, 'originalPrice' => 699000, 'discount' => 30, 'rating' => 4.9, 'reviews' => 128, 'colors' => ['#1B2A4A', '#2563EB'], 'badge' => 'TRENDING', 'category' => 'Dresses', 'sizes' => ['S', 'M', 'L'], 'image' => 'https://images.unsplash.com/photo-1584273143981-41c073dfe8f8?auto=format&fit=crop&w=800&q=80', 'description' => 'A beautifully structured blazer in azure blue with wrap-front detailing. Perfect for office-to-evening transitions.'],
            ['id' => 2, 'name' => 'Draped Poplin Midi Dress', 'slug' => 'draped-poplin-midi-dress', 'brand' => 'STUDIO 94', 'price' => 349000, 'originalPrice' => null, 'discount' => null, 'rating' => 4.8, 'reviews' => 94, 'colors' => ['#1B2A4A'], 'badge' => 'NEW', 'category' => 'Dresses', 'sizes' => ['XS', 'S', 'M', 'L', 'XL'], 'image' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&w=800&q=80', 'description' => 'Effortlessly elegant midi dress in crisp poplin fabric with draped front detail.'],
            ['id' => 3, 'name' => 'Bias-Cut Terracotta Silk Skirt', 'slug' => 'bias-cut-terracotta-silk-skirt', 'brand' => 'FERVENT ATELIER', 'price' => 545000, 'originalPrice' => 780000, 'discount' => 30, 'rating' => 5.0, 'reviews' => 62, 'colors' => ['#1B2A4A', '#DC2626'], 'badge' => 'SALE', 'category' => 'Skirts', 'sizes' => ['S', 'M'], 'image' => 'https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?auto=format&fit=crop&w=800&q=80', 'description' => 'Luxurious silk skirt with a flattering bias cut in warm terracotta.'],
            ['id' => 4, 'name' => 'Sage Relaxed Linen Jumpsuit', 'slug' => 'sage-relaxed-linen-jumpsuit', 'brand' => 'FERVENT BASICS', 'price' => 299000, 'originalPrice' => null, 'discount' => null, 'rating' => 4.7, 'reviews' => 215, 'colors' => ['#1B2A4A', '#6B7280'], 'badge' => null, 'category' => 'Tops & Blouses', 'sizes' => ['M', 'L', 'XL'], 'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80', 'description' => 'Relaxed-fit linen jumpsuit in calming sage green. Weekend-ready comfort.'],
            ['id' => 5, 'name' => 'Midnight Velvet Evening Gown', 'slug' => 'midnight-velvet-evening-gown', 'brand' => 'FERVENT ATELIER', 'price' => 1250000, 'originalPrice' => null, 'discount' => null, 'rating' => 4.9, 'reviews' => 43, 'colors' => ['#111827'], 'badge' => 'NEW', 'category' => 'Dresses', 'sizes' => ['XS', 'S', 'M'], 'image' => 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?auto=format&fit=crop&w=800&q=80', 'description' => 'Show-stopping velvet gown in deepest midnight. Floor-length with subtle train.'],
            ['id' => 6, 'name' => 'Coastal Breeze Knit Top', 'slug' => 'coastal-breeze-knit-top', 'brand' => 'FERVENT BASICS', 'price' => 199000, 'originalPrice' => 299000, 'discount' => 33, 'rating' => 4.5, 'reviews' => 189, 'colors' => ['#FFFFFF', '#F3F4F6', '#BFDBFE'], 'badge' => 'SALE', 'category' => 'Tops & Blouses', 'sizes' => ['S', 'M', 'L', 'XL'], 'image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?auto=format&fit=crop&w=800&q=80', 'description' => 'Lightweight knit top in soft cotton blend. Perfect for coastal getaways.'],
            ['id' => 7, 'name' => 'Tailored Wool Trench Coat', 'slug' => 'tailored-wool-trench-coat', 'brand' => 'STUDIO 94', 'price' => 899000, 'originalPrice' => null, 'discount' => null, 'rating' => 4.8, 'reviews' => 56, 'colors' => ['#78716C', '#1B2A4A'], 'badge' => 'TRENDING', 'category' => 'Outerwear', 'sizes' => ['S', 'M', 'L'], 'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=800&q=80', 'description' => 'Impeccably tailored trench coat in premium wool blend.'],
            ['id' => 8, 'name' => 'Wide Leg Palazzo Pants', 'slug' => 'wide-leg-palazzo-pants', 'brand' => 'FERVENT BASICS', 'price' => 329000, 'originalPrice' => null, 'discount' => null, 'rating' => 4.6, 'reviews' => 134, 'colors' => ['#1B2A4A', '#F5F5DC'], 'badge' => 'FAST DELIVERY', 'category' => 'Pants & Trousers', 'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL'], 'image' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=800&q=80', 'description' => 'Flowy palazzo pants with a flattering wide-leg silhouette.'],
        ];
    }

    public function index(Request $request)
    {
        $products = $this->getDummyProducts();
        
        $categories = [
            ['name' => 'Dresses', 'count' => 540],
            ['name' => 'Tops & Blouses', 'count' => 420],
            ['name' => 'Outerwear', 'count' => 112],
            ['name' => 'Pants & Trousers', 'count' => 88],
            ['name' => 'Skirts', 'count' => 64],
            ['name' => 'Loungewear', 'count' => 24],
        ];

        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        
        $colorPalette = [
            ['name' => 'Black', 'hex' => '#111827'],
            ['name' => 'Navy', 'hex' => '#1B2A4A'],
            ['name' => 'Gray', 'hex' => '#6B7280'],
            ['name' => 'White', 'hex' => '#F9FAFB'],
            ['name' => 'Red', 'hex' => '#DC2626'],
            ['name' => 'Pink', 'hex' => '#EC4899'],
            ['name' => 'Blue', 'hex' => '#2563EB'],
            ['name' => 'Teal', 'hex' => '#0D9488'],
        ];

        return view('products.index', compact('products', 'categories', 'sizes', 'colorPalette'));
    }

    public function show($slug)
    {
        $products = $this->getDummyProducts();
        $product = collect($products)->firstWhere('slug', $slug) ?? $products[0];
        
        // Related products (exclude current)
        $relatedProducts = collect($products)->where('id', '!=', $product['id'])->take(4)->values()->all();
        
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
