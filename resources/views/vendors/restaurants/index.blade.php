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
            <!-- Add Order -->
            @include('common.form-alert')
            <div class="d-sm-flex mb-lg-4 mb-2">
                <div class="dropdown mb-2 ms-auto me-3">
                    <a href="{{ route('vendors.restaurant.add') }}" class="btn btn-primary btn-rounded light">
                        <i class="las la-bolt scale5 me-1"></i>
                        Add Restaurant
                        <i class="las la-angle-down ms-3"></i>
                    </a>
                </div>

                <!-- <input class="d-inline-block form-control date-button btn btn-primary light btn-rounded" id="timepicker" placeholder="Today"> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive rounded card-table">
                        <table class="table border-no order-table mb-4 table-responsive-lg dataTablesCard" id="example5">
                            <thead class="thead-white">
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Active Status</th>
                                <th>Verification Status</th>
                                <th>Verified Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurants as $key => $restaurant)

                                <tr class="alert alert-dismissible border-0" style="text-align: center;">
                                    <td>{{ $restaurant['id'] }}</td>
                                    <td>{{ $restaurant['name'] }}</td>
                                    <td>{{ $restaurant['email'] }}</td>
                                    <td>{{ $restaurant['phone'] }}</td>
                                    <td>{{ $restaurant['address'] }}</td>
                                    <td>
                                        {{ $restaurant['is_active'] ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td>
                                        {{ $restaurant['is_verified'] ? 'Verified' : 'Not Verified'}}
                                    </td>
                                    <td>{{ $restaurant['verified_at'] }}</td>
                                    <td>
                                        <a href="{{ route('vendors.restaurants.edit', ['id' => $restaurant['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                            <i class="las la-edit">Edit</i>
                                        </a>
                                        <a href="{{ route('vendors.restaurants.delete', ['id' => $restaurant['id']]) }}" class="btn btn-danger btn-rounded dark btn-sm">
                                            <i class="las la-trash-alt">Delete</i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
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
