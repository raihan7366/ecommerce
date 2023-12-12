@extends('frontend.layout.appHome')

@section('content')

    <!-- Checkout Area Starts Here -->
    <section class="section checkout-area">
        <div class="container">
            @if (request()->session()->get('customerLogin'))

                <div class="row">
                    <div class="col-lg-6 checkout-area-checkout">
                        <h6 class="checkout-area__label">Checkout</h6>
                        <div class="checkout-tab">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-checkout" role="tabpanel"
                                    aria-labelledby="pills-checkout-tab">
                                    <form action="{{ route('payment.ssl.submit') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="form-check d-flex align-items-center ps-0">
                                                <label class="form-check-label ms-2 mb-0" for="flexCheckIndeterminate-one">
                                                    Please check your product before payment
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="button button-lg button--primary w-100">Confirm
                                            Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="checkout-area-summery">
                            <h6 class="checkout-area__label">Summery</h6>

                            <div class="cart">
                                <div class="cart__includes-info cart__includes-info--bordertop-0">
                                    <div class="productContent__wrapper">
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                <div class="productContent">
                                                    <div class="productContent-item__img productContent-item">
                                                        <img src="{{ asset('public/uploads/courses/' . $details['image']) }}"
                                                            alt="checkout" />
                                                    </div>
                                                    <div class="productContent-item__info productContent-item">
                                                        <h6 class="font-para--lg">
                                                            <a
                                                                href="{{ route('courseDetails', encryptor('encrypt', $id)) }}">{{ $details['title_en'] }}</a>
                                                        </h6>
                                                        <p>by {{ $details['instructor'] }}</p>
                                                        <div class="price">
                                                            <h6 class="font-para--md">
                                                                {{ $details['price'] ? '$' . $details['price'] : 'Free' }}
                                                            </h6>
                                                            <p><del>{{ $details['old_price'] ? '$' . $details['old_price'] : '' }}</del>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div class="cart__checkout-process">
                                    <ul>
                                        <li>
                                            <p>Subtotal</p>
                                            <p>{{ '$' . number_format((float) session('cart_details')['cart_total'], 2) }}
                                            </p>
                                        </li>
                                        <li>
                                            <p>Coupon Discount ({{ session('cart_details')['discount'] ?? 0.0 }}%)</p>
                                            <p>{{ '$' . number_format((float) isset(session('cart_details')['discount_amount']) ? session('cart_details')['discount_amount'] : 0.0, 2) }}
                                            </p>
                                        </li>
                                        <li>
                                            <p>taxes</p>
                                            <p>{{ '$' . number_format((float) session('cart_details')['tax'], 2) }}</p>
                                        </li>
                                        <li>
                                            <p class="font-title--card">Total:</p>
                                            <p class="total-price font-title--card">
                                                {{ '$' . number_format((float) session('cart_details')['total_amount'], 2) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- SignIn Area Starts Here -->

                <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
                    style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
                    <div class="container">
                        <div class="form-box">
                            <div class="form-tab">
                                <ul class="nav nav-pills nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2"
                                            role="tab" aria-controls="signin-2" aria-selected="false">Sign In
                                            Required</a>
                                    </li>
                                </ul>
                                <div class="tab-content">

                                    <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                                        aria-labelledby="register-tab-2">
                                        <form action="{{ route('customerLogin.check') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Your email address *</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            @if ($errors->has('email'))
                                                <small class="d-block text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                            <!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="password">Password *</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            @if ($errors->has('password'))
                                                <small class="d-block text-danger">{{ $errors->first('password') }}</small>
                                            @endif
                                            <!-- End .form-group -->

                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>LOG IN</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <!-- End .form-footer -->
                                        </form>
                                        <div class="form-choice">
                                            <p class="text-center">Click <a
                                                    href="{{ route('customerRegister.store') }}">here</a>
                                                to
                                                Register</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-login btn-g">
                                                        <i class="icon-google"></i>
                                                        Login With Google
                                                    </a>
                                                </div><!-- End .col-6 -->
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-login  btn-f">
                                                        <i class="icon-facebook-f"></i>
                                                        Login With Facebook
                                                    </a>
                                                </div><!-- End .col-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .form-choice -->
                                    </div><!-- .End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .form-tab -->
                        </div><!-- End .form-box -->
                    </div><!-- End .container -->
                </div><!-- End .login-page section-bg -->

                <!-- SignIn Area Ends Here -->

                <!-- SignUp Area Starts Here -->

                {{-- <section class="signup" style="display:none">
                    <div class="container">
                        <div class="row align-items-center justify-content-md-center">
                            <div class="col-lg-5 order-2 order-lg-0">
                                <div class="signup-area-textwrapper">
                                    <h2 class="font-title--md mb-0">Sign Up Before Checkout</h2>
                                    <p class="mt-2 mb-lg-4 mb-3">Already have account? <a href="#"
                                            onclick="hide_signin()" class="text-black-50">Sign In</a></p>
                                    <form action="{{ route('customerRegister.store', 'checkout') }}" method="POST">
                                        @csrf
                                        <div class="form-element">
                                            <label for="name">Full Name</label>
                                            <input type="text" placeholder="Enter Your Name" id="name"
                                                value="{{ old('name') }}" name="name" />
                                            @if ($errors->has('name'))
                                                <small class="d-block text-danger">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-element">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="example@email.com" id="email"
                                                value="{{ old('email') }}" name="email" />
                                            @if ($errors->has('email'))
                                                <small class="d-block text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-element">
                                            <label for="password" class="w-100"
                                                style="text-align: left;">password</label>
                                            <div class="form-alert-input">
                                                <input type="password" placeholder="Type here..." id="password"
                                                    name="password" />
                                                <div class="form-alert-icon" onclick="showPassword('password',this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <small
                                                        class="d-block text-danger">{{ $errors->first('password') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-element">
                                            <label for="password_confirmation" class="w-100"
                                                style="text-align: left;">Confirm
                                                password</label>
                                            <div class="form-alert-input">
                                                <input type="password" placeholder="Type here..."
                                                    name="password_confirmation" id="password_confirmation" />
                                                <div class="form-alert-icon"
                                                    onclick="showPassword('password_confirmation',this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-element d-flex align-items-center terms">
                                            <input class="checkbox-primary me-1" type="checkbox" id="agree" />
                                            <label for="agree" class="text-secondary mb-0">Accept the <a
                                                    href="#" style="text-decoration: underline;">Terms</a> and <a
                                                    href="#" style="text-decoration: underline;">Privacy
                                                    Policy</a></label>
                                        </div>
                                        <div class="form-element">
                                            <button type="submit" class="button button-lg button--primary w-100">Sign
                                                UP</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-7 order-1 order-lg-0">
                                <div class="signup-area-image">
                                    <img src="{{ asset('public/frontend/dist/images/signup/Illustration.png') }}"
                                        alt="Illustration Image" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- SignUp Area Ends Here -->

            @endif
        </div>
    </section>
    <!-- Checkout Area Ends Here -->

    @push('scripts')
        <script>
            function hide_signin() {
                $('.signin').toggle();
                $('.signup').toggle();
            }
        </script>
    @endpush

    {{-- <main class="main">
    @if (request()->session()->get('customerLogin'))
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form action="#">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><a href="#">Beige knitted elastic runner shoes</a></td>
                                            <td>$84.00</td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Blue utility pinafore denimdress</a></td>
                                            <td>$76,00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Direct bank transfer
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Check payments
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="assets/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main --> --}}

@endsection
