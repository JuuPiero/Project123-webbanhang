<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
    <ul id="siteNav" class="site-nav medium center hidearrow">
        {{-- <li class="lvl1 parent megamenu"><a href="#">Home <i class="anm anm-angle-down-l"></i></a>
            <div class="megamenu style1">
                <ul class="grid mmWrapper">
                    <li class="grid__item large-up--one-whole">
                        <ul class="grid">
                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Home Group 1</a>
                                <ul class="subLinks">
                                  <li class="lvl-2"><a href="index.html" class="site-nav lvl-2">Home 1 - Classic</a></li>
                                  <li class="lvl-2"><a href="home2-default.html" class="site-nav lvl-2">Home 2 - Default</a></li>
                                  <li class="lvl-2"><a href="home15-funiture.html" class="site-nav lvl-2">Home 15 - Furniture <span class="lbl nm_label1">New</span></a></li>
                                  <li class="lvl-2"><a href="home3-boxed.html" class="site-nav lvl-2">Home 3 - Boxed</a></li>
                                  <li class="lvl-2"><a href="home4-fullwidth.html" class="site-nav lvl-2">Home 4 - Fullwidth</a></li>
                                  <li class="lvl-2"><a href="home5-cosmetic.html" class="site-nav lvl-2">Home 5 - Cosmetic</a></li>
                                  <li class="lvl-2"><a href="home6-modern.html" class="site-nav lvl-2">Home 6 - Modern</a></li>
                                  <li class="lvl-2"><a href="home7-shoes.html" class="site-nav lvl-2">Home 7 - Shoes</a></li>
                                </ul>
                              </li>
                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Home Group 2</a>
                                <ul class="subLinks">
                                    <li class="lvl-2"><a href="home8-jewellery.html" class="site-nav lvl-2">Home 8 - Jewellery</a></li>
                                    <li class="lvl-2"><a href="home9-parallax.html" class="site-nav lvl-2">Home 9 - Parallax</a></li>
                                    <li class="lvl-2"><a href="home10-minimal.html" class="site-nav lvl-2">Home 10 - Minimal</a></li>
                                    <li class="lvl-2"><a href="home11-grid.html" class="site-nav lvl-2">Home 11 - Grid</a></li>
                                    <li class="lvl-2"><a href="home12-category.html" class="site-nav lvl-2">Home 12 - Category</a></li>
                                    <li class="lvl-2"><a href="home13-auto-parts.html" class="site-nav lvl-2">Home 13 - Auto Parts</a></li>
                                    <li class="lvl-2"><a href="home14-bags.html" class="site-nav lvl-2">Home 14 - Bags <span class="lbl nm_label1">New</span></a></li>
                                </ul>
                            </li>
                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">New Sections</a>
                                <ul class="subLinks">
                                    <li class="lvl-2"><a href="home11-grid.html" class="site-nav lvl-2">Image Gallery</a></li>
                                    <li class="lvl-2"><a href="home5-cosmetic.html" class="site-nav lvl-2">Featured Product</a></li>
                                    <li class="lvl-2"><a href="home7-shoes.html" class="site-nav lvl-2">Columns with Items</a></li>
                                    <li class="lvl-2"><a href="home6-modern.html" class="site-nav lvl-2">Text columns with images</a></li>
                                    <li class="lvl-2"><a href="home2-default.html" class="site-nav lvl-2">Products Carousel</a></li>
                                    <li class="lvl-2"><a href="home9-parallax.html" class="site-nav lvl-2">Parallax Banner</a></li>
                                </ul>
                            </li>
                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">New Features</a>
                                <ul class="subLinks">
                                    <li class="lvl-2"><a href="home13-auto-parts.html" class="site-nav lvl-2">Top Information Bar <span class="lbl nm_label1">New</span></a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Age Varification <span class="lbl nm_label1">New</span></a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Footer Blocks</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">2 New Megamenu style</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Show Total Savings <span class="lbl nm_label3">Hot</span></a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">New Custom Icons</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Auto Currency</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </li> --}}
        <li class="lvl1"><a href="{{route('home')}}"><b>Home</b> <i class="anm anm-angle-down-l"></i></a></li>
       
        @foreach ($categories as $category)
            @if ($category->parent_id == 0)
                <li class="lvl1 parent dropdown"><a href="{{route('home.category', $category->id)}}">{{$category->name}} <i class="anm anm-angle-down-l"></i></a>
                    @if (count($category->children) > 0)
                        <ul class="dropdown">
                            @foreach ($category->children as $child)
                                <li><a href="{{route('home.category', $child->id)}}" class="site-nav">{{$child->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    
                </li>
            @endif    

        @endforeach


        {{-- <li class="lvl1 parent dropdown"><a href="#">Blog <i class="anm anm-angle-down-l"></i></a>
            <ul class="dropdown">
                <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                <li><a href="blog-article.html" class="site-nav">Article</a></li>
            </ul>
        </li> --}}
        <li class="lvl1"><a href="#"><b>Contact</b> <i class="anm anm-angle-down-l"></i></a></li>

        {{-- <li class="lvl1"><a href="#"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a></li> --}}
    </ul>
</nav>