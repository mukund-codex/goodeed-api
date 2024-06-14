<!DOCTYPE html>
<html lang="en">

<!-- Header -->
@include('vendors.components.header')

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

{{--    @include('vendors.components.navbar')--}}
{{--    @include('vendors.components.sidebar')--}}

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="authincation">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    <div class="authincation-content">
                        <div class="row no-gutters bg-#F6EADF">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="{{ asset('images/Group 9.png') }}" alt="/"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Login to your Partner Account</h4>
                                    <form method="POST" action="{{ route('vendors.login-handler') }}">
                                        @csrf
                                        @include('common.form-alert')
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger ml-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-la bel">Password</label>
                                            <div class="position-relative">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                                <span class="show-pass eye">
													<i class="fa fa-eye-slash"></i>
													<i class="fa fa-eye"></i>
												</span>
                                                @error('password')
                                                <span class="text-danger ml-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class>
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-4">
                                        <p class="" style="text-align: center;">Don't have an account? <a class="text-primary" href="{{ route('vendors.register') }}">Sign Up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!-- ****** footer start ****** -->
    @include('vendors.components.footer')
    <!-- ****** footer start ****** -->

</div>
<!--**********************************
    Main wrapper end
***********************************-->


</body>
</html>
