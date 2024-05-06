@extends('client.layouts._masterLayout')

@section('content')

<div class="container mt-4">
    <div class="row">
        <!--Sidebar-->
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
            <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
            <div class="sidebar_tags">
                <!--Categories-->
                <div class="sidebar_widget categories filter-widget">
                    <div class="widget-title"><h2>Categories</h2></div>
                    <div class="widget-content">
                        <ul class="sidebar_categories">
                            <li class="level1 sub-level"><a href="#;" class="site-nav">Clothing</a>
                                <ul class="sublinks">
                                    <li class="level2"><a href="#;" class="site-nav">Men</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">Women</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">Child</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">View All Clothing</a></li>
                                </ul>
                            </li>
                            <li class="level1 sub-level"><a href="#;" class="site-nav">Jewellery</a>
                                <ul class="sublinks">
                                    <li class="level2"><a href="#;" class="site-nav">Ring</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">Neckalses</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">Eaarings</a></li>
                                    <li class="level2"><a href="#;" class="site-nav">View All Jewellery</a></li>
                                </ul>
                            </li>
                            <li class="lvl-1"><a href="#;" class="site-nav">Shoes</a></li>
                            <li class="lvl-1"><a href="#;" class="site-nav">Accessories</a></li>
                            <li class="lvl-1"><a href="#;" class="site-nav">Collections</a></li>
                            <li class="lvl-1"><a href="#;" class="site-nav">Sale</a></li>
                            <li class="lvl-1"><a href="#;" class="site-nav">Page</a></li>
                        </ul>
                    </div>
                </div>
                <!--Categories-->
                <!--Price Filter-->
                <div class="sidebar_widget filterBox filter-widget">
                    <div class="widget-title">
                        <h2>Price</h2>
                    </div>
                    <form action="#" method="post" class="price-filter">
                        <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="no-margin"><input id="amount" type="text"></p>
                            </div>
                            <div class="col-6 text-right margin-25px-top">
                                <button class="btn btn-secondary btn--small">filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--End Price Filter-->
              
                <!--Brand-->
                <div class="sidebar_widget filterBox filter-widget">
                    <div class="widget-title"><h2>Brands</h2></div>
                    <ul>
                        <li>
                          <input type="checkbox" value="allen-vela" id="check1">
                          <label for="check1"><span><span></span></span>Allen Vela</label>
                        </li>
                        <li>
                          <input type="checkbox" value="oxymat" id="check3">
                          <label for="check3"><span><span></span></span>Oxymat</label>
                        </li>
                        <li>
                          <input type="checkbox" value="vanelas" id="check4">
                          <label for="check4"><span><span></span></span>Vanelas</label>
                        </li>
                        <li>
                          <input type="checkbox" value="pagini" id="check5">
                          <label for="check5"><span><span></span></span>Pagini</label>
                        </li>
                        <li>
                          <input type="checkbox" value="monark" id="check6">
                          <label for="check6"><span><span></span></span>Monark</label>
                        </li>
                    </ul>
                </div>
                <!--End Brand-->
               
                <!--Banner-->
                <div class="sidebar_widget static-banner">
                    <img src="assets/images/side-banner-2.jpg" alt="" />
                </div>
                <!--Banner-->
                <!--Information-->
                <div class="sidebar_widget">
                    <div class="widget-title"><h2>Information</h2></div>
                    <div class="widget-content"><p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p></div>
                </div>
                <!--end Information-->
            </div>
        </div>
        <!--End Sidebar-->
        <!--Main Content-->
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
            <div class="productList">
                <!--Toolbar-->
                <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                <div class="toolbar">
                    <div class="filters-toolbar-wrapper">
                        <div class="row">
                            <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                <a href="shop-left-sidebar.html" title="Grid View" class="change-view change-view--active">
                                    <img src="{{asset('assets/client/images/grid.jpg')}}" alt="Grid" />
                                </a>
                                <a href="shop-listview.html" title="List View" class="change-view">
                                    <img src="{{asset('assets/client/images/list.jpg')}}" alt="List" />
                                </a>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                <span class="filters-toolbar__product-count">Showing: {{count($products)}}</span>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-right">
                                <div class="filters-toolbar__item">
                                      <label for="SortBy" class="hidden">Sort</label>
                                      <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                        <option value="title-ascending" selected="selected">Sort</option>
                                        <option>Best Selling</option>
                                        <option>Alphabetically, A-Z</option>
                                        <option>Alphabetically, Z-A</option>
                                        <option>Price, low to high</option>
                                        <option>Price, high to low</option>
                                        <option>Date, new to old</option>
                                        <option>Date, old to new</option>
                                      </select>
                                      <input class="collection-header__default-sort" type="hidden" value="manual">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--End Toolbar-->
                <div class="grid-products grid--view-items">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="{{route('home.product.detail', $product->id)}}">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('uploads/product/' . $product->images[0]->name)}}" src="{{asset('uploads/product/' . $product->images[0]->name)}}" alt="image" title="product" />
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{asset('uploads/product/' . $product->images[count($product->images) - 1]->name )}}" src="{{asset('uploads/product/' . $product->images[count($product->images) - 1]->name )}}" alt="image" title="product" />
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" method="post">
                                        <button class="btn btn-addto-cart" data-id="{{$product->id}}" type="button">Add To Cart</button>
                                    </form>
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">{{$product->name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="old-price">$900.00</span>
                                        <span class="price">{{$product->price}}</span>
                                    </div>
                                    <!-- End product price -->
                                    
                                    <div class="product-review">
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                    </div>
                                    <!-- Variant -->
                                    <ul class="swatches">
                                        @foreach ($product->images as $image)
                                            <li class="swatch medium rounded"><img src="{{asset('uploads/product/' . $image->name )}}" alt="image" /></li>
                                        @endforeach
                                        
                                    </ul>
                                    <!-- End Variant -->
                                </div>
                                <!-- End product details -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="infinitpaginOuter d-flex flex-column align-items-center">
                {{$products->render('client.layouts._paginate') }}
            </div>
        </div>
        <!--End Main Content-->
    </div>
</div>

@endsection