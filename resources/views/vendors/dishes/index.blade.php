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
                    <a href="{{ route('vendors.dishes.add') }}" class="btn btn-primary btn-rounded light">
                        <i class="las la-bolt scale5 me-1"></i>
                        Add Dishes
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
                                <th>Restaurant</th>
                                <th>Category</th>
                                <th>Sub Category</th>
{{--                                <th>Image</th>--}}
                                <th>Name</th>
                                <th>Description</th>
                                <th>Veg/Non Veg</th>
                                <th>Price (&#8360;)</th>
                                <th>Discount (%)</th>
                                <th>Discounted Price (&#8360;)</th>
                                <th>Active Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($dishes as $key => $dish)
                                <tr class="alert alert-dismissible border-0" style="text-align: center;">
                                    <td>{{ $i }} {{ $dish['dishes'] }}</td>
                                    <td>{{ $dish['restaurant']['name'] }}</td>
                                    <td>{{ $dish['category']['name'] }}</td>
                                    <td>{{ $dish['subcategory']['name'] }}</td>
{{--                                    <td>{{ $dish['image'] }}</td>--}}
                                    <td>{{ $dish['name'] }}</td>
                                    <td>{{ $dish['description'] }}</td>
                                    <td>{{ $dish['is_veg'] ? 'Veg' : 'Non Veg' }}</td>
                                    <td>{{ $dish['price'] }}</td>
                                    <td>{{ $dish['discount_percentage'] }}</td>
                                    <td>{{ $dish['discount_price'] }}</td>
                                    <td>
                                        {{ $dish['is_active'] ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td>
                                        <a href="{{ route('vendors.dishes.edit', ['id' => $dish['id']]) }}" class="btn btn-primary btn-rounded dark btn-sm">
                                            <i class="las la-edit">Edit</i>
                                        </a>
                                        <a href="{{ route('vendors.dishes.delete', ['id' => $dish['id']]) }}" class="btn btn-danger btn-rounded dark btn-sm">
                                            <i class="las la-trash-alt">Delete</i>
                                        </a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
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
