<!DOCTYPE html>
<html lang="en">
@include('vendors.components.header')
<style>
    .btn {
        margin-bottom: 10px;
    }
</style>
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
{{--                <div class="dropdown mb-2 ms-auto me-3">--}}
{{--                    <a href="{{ route('vendors.dishes.add') }}" class="btn btn-primary btn-rounded light">--}}
{{--                        <i class="las la-bolt scale5 me-1"></i>--}}
{{--                        Add Dishes--}}
{{--                        <i class="las la-angle-down ms-3"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <!-- <input class="d-inline-block form-control date-button btn btn-primary light btn-rounded" id="timepicker" placeholder="Today"> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive rounded card-table">
                        <table class="table border-no order-table mb-4 table-responsive-lg dataTablesCard" id="example5">
                            <thead class="thead-white">
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Order Number</th>
                                <th>Order Type</th>
                                <th>Restaurant Name</th>
                                <th>Dish Name</th>
                                <th>Quantity</th>
                                <th>Price (&#8360;)</th>
                                <th>Discount Price (&#8360;)</th>
                                <th>Total Price (&#8360;)</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Payment Mode</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($orders as $key => $order)
                                <tr class="alert alert-dismissible border-0" style="text-align: center;">
                                    <td>{{ $i }} </td>
                                    <td>{{ $order['order_number'] }}</td>
                                    <td>{{ ucfirst($order['order_type']) }}</td>
                                    <td>{{ $order['restaurant_name'] }}</td>
                                    <td>{{ $order['dish_name'] }}</td>
                                    <td>{{ $order['quantity'] }}</td>
                                    <td>{{ $order['price'] }} &#8360;</td>
                                    <td>{{ $order['discount_price'] == null ? 0 : $order['discount_price'] }} &#8360;</td>
                                    <td>{{ $order['total_price'] }} &#8360;</td>
                                    <td>{{ $order['address_line_1'] }}, {{ $order['address_line_2'] }}, {{ $order['landmark'] }}, {{ $order['city'] }}, {{ $order['state'] }} , {{ $order['pincode'] }}</td>
                                    <td>{{ $order['status'] == 'delivery' ? 'In Delivery' : ucfirst($order['status']) }}</td>
                                    <td>{{ strtoupper($order['payment_mode']) }}</td>
                                    <td>{{ ucfirst($order['payment_status']) }}</td>
                                    <td>
                                        @if(empty($order['delivered_at']))
                                            @if(!empty($order['dispatched_at']))
                                                <a class="btn btn-primary btn-rounded dark btn-sm">
                                                    <i class="las la-edit">Dispatched</i>
                                                </a>
                                            @endif
                                            @if(empty($order['dispatched_at']))
                                                @if(empty($order['rejected_at']))
                                                    <a  class="btn btn-primary btn-rounded dark btn-sm"
                                                        @if(empty($order['accepted_at']))
                                                            href="{{ route('vendors.orders.accept', ['id' => $order["id"]]) }}"
                                                        @endif
                                                    >
                                                        @if(empty($order['accepted_at']))
                                                            <i class="las la-edit">Accept</i>
                                                        @endif
                                                        @if(!empty($order['accepted_at']))
                                                            <i class="las la-edit">Accepted</i>
                                                        @endif
                                                    </a>
                                                @endif
                                                @if(empty($order['accepted_at']))
                                                    <a class="btn btn-danger btn-rounded dark btn-sm"
                                                        @if(empty($order['rejected_at']))
                                                            href="{{ route('vendors.orders.reject', ['id' => $order['id']]) }}"
                                                        @endif
                                                    >
                                                        @if(empty($order['rejected_at']))
                                                            <i class="las la-edit">Reject</i>
                                                        @endif
                                                        @if(!empty($order['rejected_at']))
                                                            <i class="las la-edit">Rejected</i>
                                                        @endif
                                                    </a>
                                                @endif
                                                @if(empty($order['rejected_at']))
                                                    <a class="btn btn-primary btn-rounded dark btn-sm" href="{{ route('vendors.orders.complete', ['id' => $order['id']]) }}">
                                                        <i class="las la-edit">Complete</i>
                                                    </a>
                                                @endif
                                            @endif
                                        @endif
                                        @if(!empty($order['delivered_at']))
                                            <a class="btn btn-primary btn-rounded dark btn-sm">
                                                <i class="las la-edit">Delivered</i>
                                            </a>
                                        @endif
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
