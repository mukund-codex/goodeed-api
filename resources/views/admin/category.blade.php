<!DOCTYPE html>
<html lang="en">
@include('admin.components.header')
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
    @include('admin.components.navbar')
    @include('admin.components.sidebar')


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
                    <a href="{{ route('admin.category.add') }}" class="btn btn-primary btn-rounded light">
                        <i class="las la-bolt scale5 me-1"></i>
                        Add Category
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
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="alert alert-dismissible border-0">
                                <td>#5552375</td>
                                <td>26 March 2020, 02:12 AM</td>
                                <td>Emilia Johanson</td>
                                <td>67 St. John’s Road London</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success me-3 scale5"></i>Accept Order</a>
                                            <a href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger me-3 scale5"></i>Reject Order</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

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
    @include('admin.components.footer')
        <!-- ****** footer start ****** -->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
</html>
