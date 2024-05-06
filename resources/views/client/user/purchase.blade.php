@extends('client.layouts._masterLayout')

@section('content')
<!--Page Title-->
<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Đơn mua</h1></div>
      </div>
</div>
<!--End Page Title-->

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
            <form action="#">
                <div class="wishlist-table table-content table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th class="product-price text-center alt-font">Images</th> --}}
                                <th class="product-name alt-font"></th>
                                <th class="product-name alt-font">Product(s)</th>
                                <th class="product-price text-center alt-font">Total Amount</th>
                                <th class="stock-status text-center alt-font">Status</th>
                                {{-- <th class="product-subtotal text-center alt-font">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td class="product-name">
                                    <h4 class="no-margin">
                                        <a href="#">
                                            @foreach ($order->order_items as $orderItem)
                                                {{$orderItem->product_name . ', '}}
                                            @endforeach
                                        </a>
                                    </h4>
                                </td>
                                <td class="product-price text-center"><span class="amount">$ {{$order->total_amount}}</span></td>
                                <td class="stock text-center">
                                    {{$order->status}}
                                    {{-- <span class="in-stock">in stock</span> --}}
                                </td>
                                {{-- <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Add To Cart</button></td> --}}
                            </tr>
                            @endforeach
                           
                            
                        </tbody>
                    </table>
                </div>
            </form>                   
           </div>
    </div>
</div>


@endsection