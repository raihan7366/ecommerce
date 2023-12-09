@extends('frontend.layout.appHome')

@section('content')
<div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
    style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                            aria-controls="signin-2" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                        aria-labelledby="register-tab-2">
                        <form action="{{route('customerRegister.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name_en">Full Name *</label>
                                <input type="text" class="form-control" name="name_en">
                            </div>
                            @if($errors->has('name_en'))
                            <small class="d-block text-danger">{{$errors->first('name_en')}}</small>
                            @endif
                            <!-- End .form-group -->

                            <div class="form-group">
                                <label for="email">Your email address *</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            @if($errors->has('email'))
                            <small class="d-block text-danger">{{$errors->first('email')}}</small>
                            @endif
                            <!-- End .form-group -->

                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            @if($errors->has('password'))
                            <small class="d-block text-danger">{{$errors->first('password')}}</small>
                            @endif
                            <!-- End .form-group -->

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password *</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            @if($errors->has('password_confirmation'))
                            <small class="d-block text-danger">{{$errors->first('password_confirmation')}}</small>
                            @endif
                            <!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>REGISTER</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                    <label class="custom-control-label" for="register-policy-2">I agree to the <a
                                            href="#">privacy policy</a> *</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-footer -->
                        </form>
                        <div class="form-choice">
                            <p class="text-center">Click <a href="{{route('login')}}">here to </a>Login</p>
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
@endsection