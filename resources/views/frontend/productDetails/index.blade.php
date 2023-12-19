@extends('frontend.layout.appHome')

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-xl-10">
                                <div class="product-details-top">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-7">
                                            <div class="product-gallery">
                                                <figure class="product-main-image">
                                                    <span class="product-label label-sale">Sale</span>
                                                    <img src="{{ asset('public/uploads/products/' . $product->image) }}"
                                                        alt="Product image" class="product-image">

                                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                        <i class="icon-arrows"></i>
                                                    </a>
                                                </figure><!-- End .product-main-image -->


                                            </div><!-- End .product-gallery -->
                                        </div><!-- End .col-lg-7 -->

                                        <div class="col-md-6 col-lg-5">
                                            <div class="product-details">
                                                <h1 class="product-title">{{ $product->name_en }}</h1>
                                                <!-- End .product-title -->

                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <a class="ratings-text" href="#product-accordion" id="review-link">( 0
                                                        Reviews )</a>
                                                </div><!-- End .rating-container -->

                                                <div class="product-price">
                                                    <span class="new-price">${{ $product->price }}</span>
                                                    {{-- <span class="old-price">$110.00</span> --}}
                                                </div><!-- End .product-price -->

                                                <div class="product-content">
                                                    <p>{{ $product->short_description }}
                                                    </p>
                                                </div><!-- End .Short-description -->

                                                <div class="details-filter-row details-row-size">
                                                    <label>Category:</label>

                                                    <div class="product-nav product-nav-thumbs ml-3">
                                                        {{ $product->subcategory?->subcatname_en }}
                                                        {{-- <a href="#" class="active me-2">
                                                    <img src="{{asset('public/frontend/assets/images/products/single/fullwidth/1-thumb.jpg')}}"
                                                        alt="product desc">
                                                </a> --}}
                                                    </div>
                                                    <!-- End .product-nav -->
                                                </div>
                                                <!-- End .details-filter-row -->

                                                {{-- <div class="details-filter-row details-row-size">
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control">
                                                    <option value="#" selected="selected">Select a size</option>
                                                    <option value="s">Small</option>
                                                    <option value="m">Medium</option>
                                                    <option value="l">Large</option>
                                                    <option value="xl">Extra Large</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div> --}}
                                                <!-- End .details-filter-row -->

                                                <div class="details-filter-row details-row-size">
                                                    <label for="qty">Qty:</label>
                                                    <div class="product-details-quantity">
                                                        <input type="number" id="qty" class="form-control"
                                                            value="1" min="1" max="10" step="1"
                                                            data-decimals="0" required>
                                                    </div><!-- End .product-details-quantity -->
                                                </div><!-- End .details-filter-row -->

                                                <div class="product-details-action btn-sm">
                                                    <a href="{{ route('add.to.cart', $product->id) }}"
                                                        class="btn-product btn-cart"><span>add to cart</span></a>

                                                    <div class="btn-lg">
                                                        <a href="#" class="btn-product btn-wishlist"
                                                            title="Wishlist"><span>Add
                                                                to
                                                                Wishlist</span></a>
                                                    </div><!-- End .details-action-wrapper -->
                                                </div><!-- End .product-details-action -->


                                                <div class="accordion accordion-plus product-details-accordion"
                                                    id="product-accordion">
                                                    <div class="card card-box card-sm">
                                                        <div class="card-header" id="product-desc-heading">
                                                            <h2 class="card-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                                    href="#product-accordion-desc" aria-expanded="false"
                                                                    aria-controls="product-accordion-desc">
                                                                    Product Details
                                                                </a>
                                                            </h2>
                                                        </div><!-- End .card-header -->
                                                        <div id="product-accordion-desc" class="collapse"
                                                            aria-labelledby="product-desc-heading"
                                                            data-parent="#product-accordion">
                                                            <div class="card-body">
                                                                <div class="product-desc-content">
                                                                    <p>{{ $product->description }}</p>
                                                                    <ul>
                                                                        <li>Nunc nec porttitor turpis. In eu risus enim. In
                                                                            vitae mollis
                                                                            elit. </li>
                                                                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                                                                        <li>Nullam a magna porttitor, dictum risus nec,
                                                                            faucibus
                                                                            sapien.
                                                                        </li>
                                                                    </ul>

                                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                                        elit.
                                                                        Donec
                                                                        odio. Quisque volutpat mattis eros. Nullam malesuada
                                                                        erat ut
                                                                        turpis. Suspendisse urna viverra non, semper
                                                                        suscipit,
                                                                        posuere
                                                                        a, pede.</p>
                                                                </div><!-- End .product-desc-content -->
                                                            </div><!-- End .card-body -->
                                                        </div><!-- End .collapse -->
                                                    </div><!-- End .card -->

                                                    <div class="card card-box card-sm">
                                                        <div class="card-header" id="product-info-heading">
                                                            <h2 class="card-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                                    href="#product-accordion-info" aria-expanded="false"
                                                                    aria-controls="product-accordion-info">
                                                                    Additional Information
                                                                </a>
                                                            </h2>
                                                        </div><!-- End .card-header -->
                                                        <div id="product-accordion-info" class="collapse"
                                                            aria-labelledby="product-info-heading"
                                                            data-parent="#product-accordion">
                                                            <div class="card-body">
                                                                <div class="product-desc-content">
                                                                    <p>{{ $product->short_description }}</p>

                                                                    <h3>Fabric & care</h3>
                                                                    <ul>
                                                                        <li>100% Polyester</li>
                                                                        <li>Do not iron</li>
                                                                        <li>Do not wash</li>
                                                                        <li>Do not bleach</li>
                                                                        <li>Do not tumble dry</li>
                                                                        <li>Professional dry clean only</li>
                                                                    </ul>

                                                                    <h3>Size</h3>
                                                                    <p>S, M, L, XL</p>
                                                                </div><!-- End .product-desc-content -->
                                                            </div><!-- End .card-body -->
                                                        </div><!-- End .collapse -->
                                                    </div><!-- End .card -->

                                                    <div class="card card-box card-sm">
                                                        <div class="card-header" id="product-review-heading">
                                                            <h2 class="card-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                                    href="#product-accordion-review" aria-expanded="false"
                                                                    aria-controls="product-accordion-review">
                                                                    Reviews (2)
                                                                </a>
                                                            </h2>
                                                        </div><!-- End .card-header -->
                                                        <div id="product-accordion-review" class="collapse"
                                                            aria-labelledby="product-review-heading"
                                                            data-parent="#product-accordion">
                                                            <div class="card-body">
                                                                <div class="reviews">
                                                                    <div class="review">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <h4><a href="#">Samanta J.</a></h4>
                                                                                <div class="ratings-container">
                                                                                    <div class="ratings">
                                                                                        <div class="ratings-val"
                                                                                            style="width: 80%;">
                                                                                        </div><!-- End .ratings-val -->
                                                                                    </div><!-- End .ratings -->
                                                                                </div><!-- End .rating-container -->
                                                                                <span class="review-date">6 days ago</span>
                                                                            </div><!-- End .col -->
                                                                            <div class="col">
                                                                                <h4>Good, perfect size</h4>

                                                                                <div class="review-content">
                                                                                    <p>Lorem ipsum dolor sit amet,
                                                                                        consectetur
                                                                                        adipisicing elit. Ducimus cum
                                                                                        dolores
                                                                                        assumenda
                                                                                        asperiores facilis porro
                                                                                        reprehenderit
                                                                                        animi
                                                                                        culpa atque blanditiis commodi
                                                                                        perspiciatis
                                                                                        doloremque, possimus, explicabo,
                                                                                        autem
                                                                                        fugit
                                                                                        beatae quae voluptas!</p>
                                                                                </div><!-- End .review-content -->

                                                                                <div class="review-action">
                                                                                    <a href="#"><i
                                                                                            class="icon-thumbs-up"></i>Helpful
                                                                                        (2)
                                                                                    </a>
                                                                                    <a href="#"><i
                                                                                            class="icon-thumbs-down"></i>Unhelpful
                                                                                        (0)</a>
                                                                                </div><!-- End .review-action -->
                                                                            </div><!-- End .col-auto -->
                                                                        </div><!-- End .row -->
                                                                    </div><!-- End .review -->

                                                                    <div class="review">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <h4><a href="#">John Doe</a></h4>
                                                                                <div class="ratings-container">
                                                                                    <div class="ratings">
                                                                                        <div class="ratings-val"
                                                                                            style="width: 100%;">
                                                                                        </div><!-- End .ratings-val -->
                                                                                    </div><!-- End .ratings -->
                                                                                </div><!-- End .rating-container -->
                                                                                <span class="review-date">5 days ago</span>
                                                                            </div><!-- End .col -->
                                                                            <div class="col">
                                                                                <h4>Very good</h4>

                                                                                <div class="review-content">
                                                                                    <p>Sed, molestias, tempore? Ex dolor
                                                                                        esse
                                                                                        iure hic
                                                                                        veniam laborum blanditiis laudantium
                                                                                        iste amet.
                                                                                        Cum non voluptate eos enim, ab
                                                                                        cumque
                                                                                        nam, modi,
                                                                                        quas iure illum repellendus,
                                                                                        blanditiis
                                                                                        perspiciatis beatae!</p>
                                                                                </div><!-- End .review-content -->

                                                                                <div class="review-action">
                                                                                    <a href="#"><i
                                                                                            class="icon-thumbs-up"></i>Helpful
                                                                                        (0)</a>
                                                                                    <a href="#"><i
                                                                                            class="icon-thumbs-down"></i>Unhelpful
                                                                                        (0)</a>
                                                                                </div><!-- End .review-action -->
                                                                            </div><!-- End .col-auto -->
                                                                        </div><!-- End .row -->
                                                                    </div><!-- End .review -->
                                                                </div><!-- End .reviews -->
                                                            </div><!-- End .card-body -->
                                                        </div><!-- End .collapse -->
                                                    </div><!-- End .card -->
                                                </div><!-- End .accordion -->

                                            </div><!-- End .product-details -->
                                        </div><!-- End .col-lg-5 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-details-top -->
                            </div><!-- End .col-xl-10 -->
                        @endforeach
                        {{-- <aside class="col-xl-2 d-md-none d-xl-block">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">Related Product</h4><!-- End .widget-title -->

                                <div class="products">
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{asset('public/frontend/assets/images/products/single/sidebar/1.jpg')}}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Light brown studded
                                                    <br>Wide fit
                                                    wedges</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$110.00</span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/2.jpg"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Yellow button front tea
                                                    top</a>
                                            </h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $56.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/3.jpg"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Beige metal hoop tote
                                                    bag</a></h5>
                                            <!-- End .product-title -->
                                            <div class="product-price">
                                                $50.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/4.jpg"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Black soft RI weekend
                                                    <br>travel
                                                    bag</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $75.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->
                                </div>
                                <!-- End .products -->

                                <a href="category.html" class="btn btn-outline-dark-3"><span>View More Products</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .widget widget-products -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-product -->
                    </aside><!-- End .col-xl-2 --> --}}
                    </div><!-- End .row -->

                </div><!-- End .container-fluid -->
            </div>
    </main>
@endsection
