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
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('vendors.create') }}">
                                        @csrf
                                        @include('common.form-alert')
                                        <div class="form-group mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger ml-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger ml-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Mobile Number" value="{{ old('mobile_number') }}">
                                            @error('mobile_number')
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
                                        <div class="text-center mt-4">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Create an Account</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-4">
                                        <p class="" style="text-align: center;">Already have an account? <a class="text-primary" href="{{ route('vendors.login') }}">Sign in</a></p>
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
