
<!DOCTYPE html>
<html lang="en">
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
    @include('vendors.components.navbar')
    @include('vendors.components.sidebar')


    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12">
                <!-- Add Category Form -->
                <form method="POST" action="{{ route('vendors.restaurants.update', ['id' => $restaurant['id']]) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="text">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Restaurant's Name" id="text" value="{{ $restaurant['name'] }}">
                        @error('name')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Email</label>
                        <input type="email" class="form-control" name="email" id="text" placeholder="Restaurant's Email" value="{{ $restaurant['email'] }}">
                        @error('email')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Restaurant's Number" id="text" value="{{ $restaurant['phone'] }}">
                        @error('phone')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Restaurant's Address" id="text" value="{{ $restaurant['address'] }}">
                        @error('address')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label  class="text-black font-w500" for="is_active">Active Status</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="">Select Status</option>
                            <option value="1" {{ $restaurant['active_status'] == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $restaurant['active_status'] == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mb-3" style="display: none;">
                        <label class="text-black font-w500">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
