<?php

namespace App\Http\Controllers\Client;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Order\OrderRepository;
use App\Extensions\Cart;
use App\Extensions\PaymentMethod\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller {
    private $productRepository;
    private $orderRepository;

    public function __construct(ProductRepository $productRepository, OrderRepository $orderRepository) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;

    }
    public function index() {
        $paymentMethods = PaymentMethod::getMethods();
        $cart = Cart::getCart();
        $totalPrice = Cart::getTotalPrice();
        $items = [];
        foreach ($cart as $productId => $quantity) {
            $product = $this->productRepository->find($productId);
            array_push($items, [
                'product' => $product,
                'quantity' => $quantity
            ]);
        }

        return view('client.checkout.index')->with([
            'cart' => $cart,
            'items' => $items,
            'totalPrice' => $totalPrice ,
            'paymentMethods' => $paymentMethods
        ]);
    }

    public function checkout(Request $request) {
        // $transaction = null;
        // Mail::send('mail.checkout', compact('cart'), function($email) {
        //     $email->subject('Boleto-cart');
        //     $email->to(Auth::user()->email);
        // });
        $this->orderRepository->create($request);
        // Session::put('cart', []);
        return redirect(route('home'))->with([
            'message' => 'đặt hàng thành công'
        ]);
    }
}
