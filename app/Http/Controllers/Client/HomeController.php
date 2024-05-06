<?php

namespace App\Http\Controllers\Client;

use App\Extensions\Cart;
use App\Extensions\PaymentMethod\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller {
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index() {
        $banners = getBanners();
        // dd($banners);
        // Cart::clean();
        $products = $this->productRepository->paginate();
        return view('client.home.index')->with([
            'products' => $products,
            'banners' => $banners
        ]);
    }

    public function productDetail($id) {
        $product = $this->productRepository->find($id);
        $ratings = Rating::where('product_id', $id)->orderByDesc('created_at')->paginate(5);
        $suggests = $this->productRepository->getsuggestProducts($id);

        return view('client.product.detail')->with([
            'product' => $product,
            'ratings' => $ratings,
            'suggests' => $suggests
        ]);
    }

    public function category($id) {
        $category = $this->categoryRepository->find($id);
        $products = $this->productRepository->getProductsByCategory($id);
        // dd($product);
        // dd($category->products[0]->images);
        return view('client.category.index')->with([
            'category' => $category,
            'products' => $products
        ]);
    }

    public function search(Request $request) {
        // $categories = $this->categoryRepository->searchPrivate($request->keyword);
        $products = $this->productRepository->search($request->keyword);
        
        return view('client.home.result')->with([
            // 'categories' => $categories,
            'products' => $products
        ]);
    }

    public function filter(Request $request) {

    }
}
