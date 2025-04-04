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

        @include('vendors.components.navbar')
        @include('vendors.components.sidebar')

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Order -->
            <div class="modal fade" id="addOrderModalside">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Menus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">Food Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Order Date</label>
                                    <input class="form-control" type="text" id="datepicker">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Food Price</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card grd-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-2">
                                    <h2 class="text-white font-w600">{{ $dashboard['total_menus'] }}</h2>
                                    <span class="text-white">Total Menus</span>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>6/8</span>
                                    <small class="text-primary">
                                        <svg width="30" height="30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M30 7.03697H21.4497V1.75781H27.7137V0H19.6918V7.03697H11.1417V12.3132H12.9572L13.1193 14.7549H8.50227C5.03494 14.7549 2.17072 17.3859 1.80038 20.7561C0.75531 21.1073 0 22.0953 0 23.2571C0 24.4244 0.762405 25.4164 1.81526 25.7632C2.1769 28.1582 4.24873 30 6.74286 30H27.0115L28.1845 12.3132H30V7.03697ZM8.50227 16.5127H16.2202C18.669 16.5127 20.7097 18.2881 21.1263 20.6188H3.59619C4.01276 18.2881 6.05324 16.5127 8.50227 16.5127ZM2.63809 22.3766H22.0841C22.5696 22.3766 22.9646 22.7717 22.9646 23.2569C22.9646 23.7424 22.5696 24.1372 22.0841 24.1372H2.63809C2.15263 24.1372 1.75781 23.7424 1.75781 23.2569C1.75781 22.7717 2.15263 22.3766 2.63809 22.3766ZM6.74286 28.2422C5.26886 28.2422 4.02351 27.2479 3.63968 25.8952H21.0825C20.6989 27.2479 19.4536 28.2422 17.9794 28.2422H6.74286ZM25.3665 28.2422H21.7738C22.3618 27.5517 22.7655 26.7002 22.907 25.7632C23.9598 25.4164 24.7224 24.4244 24.7224 23.2571C24.7224 22.0953 23.9671 21.1073 22.9221 20.7561C22.5517 17.3859 19.6877 14.7549 16.2202 14.7549H14.881L14.7189 12.3132H26.4228L25.3665 28.2422ZM28.2422 10.5553H12.8996V8.79478H28.2422V10.5553Z" fill="#EA7A9A"></path>
                                            </g>
                                        </svg>
                                    </small>
                                    <span class="circle bg-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card grd-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-2">
                                    <h2 class="text-white font-w600">&#8377; {{ $dashboard['total_revenue'] }}</h2>
                                    <span class="text-white">Total Revenue</span>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span>
                                    <small class="text-primary">
                                        <span style="font-size: 35px;">&#8377; </span>
                                    </small>
                                    <span class="circle bg-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card grd-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-2">
                                    <h2 class="text-white font-w600">{{ $dashboard['total_orders'] }}</h2>
                                    <span class="text-white">Total Orders</span>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>4/8</span>
                                    <small class="text-primary">
                                        <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 32.5H28.75C29.7442 32.4989 30.6974 32.1035 31.4004 31.4004C32.1035 30.6974 32.4989 29.7442 32.5 28.75V18.75C32.5 18.4185 32.3683 18.1005 32.1339 17.8661C31.8995 17.6317 31.5815 17.5 31.25 17.5C30.9185 17.5 30.6005 17.6317 30.3661 17.8661C30.1317 18.1005 30 18.4185 30 18.75V28.75C29.9997 29.0814 29.8679 29.3992 29.6336 29.6336C29.3992 29.8679 29.0814 29.9997 28.75 30H10C9.66857 29.9997 9.3508 29.8679 9.11645 29.6336C8.88209 29.3992 8.7503 29.0814 8.75 28.75V11.25C8.7503 10.9186 8.88209 10.6008 9.11645 10.3664C9.3508 10.1321 9.66857 10.0003 10 10H21.25C21.5815 10 21.8995 9.8683 22.1339 9.63388C22.3683 9.39946 22.5 9.08152 22.5 8.75C22.5 8.41848 22.3683 8.10054 22.1339 7.86612C21.8995 7.6317 21.5815 7.5 21.25 7.5H10C9.00577 7.50109 8.05258 7.89653 7.34956 8.59956C6.64653 9.30258 6.25109 10.2558 6.25 11.25V28.75C6.25109 29.7442 6.64653 30.6974 7.34956 31.4004C8.05258 32.1035 9.00577 32.4989 10 32.5Z" fill="#EA7A9A"></path>
                                            <path d="M31.25 2.5C30.0138 2.5 28.8055 2.86656 27.7777 3.55331C26.7498 4.24007 25.9488 5.21619 25.4757 6.35823C25.0027 7.50027 24.8789 8.75693 25.1201 9.96931C25.3612 11.1817 25.9565 12.2953 26.8306 13.1694C27.7046 14.0435 28.8183 14.6388 30.0307 14.8799C31.243 15.1211 32.4997 14.9973 33.6417 14.5242C34.7838 14.0512 35.7599 13.2501 36.4466 12.2223C37.1334 11.1945 37.5 9.98613 37.5 8.75C37.498 7.093 36.8389 5.50442 35.6672 4.33274C34.4955 3.16106 32.907 2.50195 31.25 2.5ZM31.25 12.5C30.5083 12.5 29.7833 12.2801 29.1666 11.868C28.5499 11.456 28.0692 10.8703 27.7854 10.1851C27.5016 9.49984 27.4273 8.74584 27.572 8.01841C27.7167 7.29098 28.0739 6.6228 28.5983 6.09835C29.1228 5.5739 29.7909 5.21675 30.5184 5.07206C31.2458 4.92736 31.9998 5.00162 32.685 5.28545C33.3702 5.56928 33.9559 6.04993 34.368 6.66661C34.78 7.2833 35 8.00832 35 8.75C34.9989 9.74423 34.6034 10.6974 33.9004 11.4004C33.1974 12.1035 32.2442 12.4989 31.25 12.5Z" fill="#EA7A9A"></path>
                                            <path d="M12.5 15H18.75C19.0815 15 19.3995 14.8683 19.6339 14.6339C19.8683 14.3995 20 14.0815 20 13.75C20 13.4185 19.8683 13.1005 19.6339 12.8661C19.3995 12.6317 19.0815 12.5 18.75 12.5H12.5C12.1685 12.5 11.8505 12.6317 11.6161 12.8661C11.3817 13.1005 11.25 13.4185 11.25 13.75C11.25 14.0815 11.3817 14.3995 11.6161 14.6339C11.8505 14.8683 12.1685 15 12.5 15Z" fill="#EA7A9A"></path>
                                            <path d="M11.25 18.75C11.25 19.0815 11.3817 19.3995 11.6161 19.6339C11.8505 19.8683 12.1685 20 12.5 20H23.75C24.0815 20 24.3995 19.8683 24.6339 19.6339C24.8683 19.3995 25 19.0815 25 18.75C25 18.4185 24.8683 18.1005 24.6339 17.8661C24.3995 17.6317 24.0815 17.5 23.75 17.5H12.5C12.1685 17.5 11.8505 17.6317 11.6161 17.8661C11.3817 18.1005 11.25 18.4185 11.25 18.75Z" fill="#EA7A9A"></path>
                                        </svg>
                                    </small>
                                    <span class="circle bg-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-sm-6">
                    <div class="card grd-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-2">
                                    <h2 class="text-white font-w600">{{ $dashboard['total_customers'] }}</h2>
                                    <span class="text-white">Total Customers</span>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>7/8</span>
                                    <small class="text-primary">
                                        <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2501 21.25C17.239 21.25 18.2057 20.9568 19.0279 20.4074C19.8502 19.8579 20.491 19.0771 20.8695 18.1634C21.2479 17.2498 21.3469 16.2445 21.154 15.2746C20.9611 14.3046 20.4849 13.4137 19.7856 12.7145C19.0863 12.0152 18.1954 11.539 17.2255 11.3461C16.2556 11.1531 15.2503 11.2522 14.3366 11.6306C13.423 12.009 12.6421 12.6499 12.0927 13.4722C11.5433 14.2944 11.2501 15.2611 11.2501 16.25C11.2514 17.5757 11.7786 18.8467 12.716 19.7841C13.6534 20.7215 14.9244 21.2487 16.2501 21.25ZM16.2501 13.75C16.7445 13.75 17.2279 13.8966 17.639 14.1713C18.0501 14.446 18.3705 14.8365 18.5598 15.2933C18.749 15.7501 18.7985 16.2528 18.702 16.7377C18.6056 17.2227 18.3675 17.6681 18.0178 18.0178C17.6682 18.3674 17.2227 18.6055 16.7378 18.702C16.2528 18.7984 15.7502 18.7489 15.2934 18.5597C14.8365 18.3705 14.4461 18.0501 14.1714 17.6389C13.8967 17.2278 13.7501 16.7445 13.7501 16.25C13.751 15.5872 14.0146 14.9519 14.4833 14.4832C14.9519 14.0146 15.5873 13.7509 16.2501 13.75Z" fill="#EA7A9A"></path>
                                            <path d="M35.78 24.4625C36.1927 23.9099 36.4684 23.2672 36.5844 22.5873C36.7005 21.9074 36.6537 21.2097 36.4478 20.5514L35.6543 17.9697C35.2817 16.7452 34.5244 15.6734 33.4946 14.9133C32.4648 14.1532 31.2174 13.7453 29.9375 13.75H24.3287C23.9971 13.75 23.6792 13.8817 23.4448 14.1162C23.2103 14.3506 23.0787 14.6685 23.0787 15C23.0787 15.3316 23.2103 15.6495 23.4448 15.8839C23.6792 16.1183 23.9971 16.25 24.3287 16.25H29.9375C30.6823 16.2475 31.4081 16.485 32.0073 16.9274C32.6064 17.3698 33.0471 17.9935 33.2639 18.706L34.0574 21.2867C34.145 21.5713 34.1645 21.8725 34.1145 22.1661C34.0645 22.4597 33.9463 22.7375 33.7694 22.977C33.5925 23.2166 33.3619 23.4114 33.0961 23.5456C32.8302 23.6799 32.5366 23.7499 32.2388 23.75H20.7777C20.7423 23.75 20.7127 23.7672 20.6777 23.7702C20.5937 23.7669 20.5125 23.75 20.4273 23.75H12.5898C11.2007 23.745 9.84705 24.188 8.72972 25.0132C7.61239 25.8385 6.79097 27.0021 6.3874 28.3313L5.45415 31.3625C5.23616 32.0719 5.18764 32.8225 5.31248 33.5541C5.43732 34.2856 5.73204 34.9777 6.17296 35.5746C6.61388 36.1715 7.18869 36.6567 7.85119 36.9911C8.51369 37.3255 9.24541 37.4998 9.98753 37.5H23.0287C23.7708 37.4999 24.5026 37.3256 25.1652 36.9913C25.8277 36.6569 26.4026 36.1717 26.8436 35.5748C27.2845 34.9778 27.5793 34.2858 27.7042 33.5542C27.829 32.8226 27.7805 32.0719 27.5625 31.3625L26.6299 28.3315C26.3936 27.5767 26.0217 26.8713 25.5323 26.25H32.2388C32.9283 26.2532 33.6088 26.0929 34.2244 25.7821C34.8399 25.4714 35.3731 25.0192 35.78 24.4625ZM24.8328 34.089C24.6255 34.3727 24.3539 34.6031 24.0403 34.7615C23.7267 34.9198 23.38 35.0016 23.0287 35H9.98753C9.63653 35 9.29043 34.9176 8.97708 34.7594C8.66373 34.6012 8.39187 34.3718 8.18337 34.0894C7.97487 33.807 7.83555 33.4797 7.77661 33.1337C7.71767 32.7876 7.74077 32.4326 7.84403 32.0971L8.77665 29.0661C9.02442 28.249 9.52925 27.5335 10.2161 27.0262C10.903 26.5188 11.7352 26.2466 12.5892 26.25H20.4267C21.2806 26.2466 22.1128 26.5188 22.7997 27.0262C23.4865 27.5335 23.9914 28.249 24.2392 29.0661L25.1718 32.0971C25.2769 32.4324 25.301 32.7877 25.2421 33.1341C25.1832 33.4804 25.0429 33.8078 24.8328 34.0894V34.089Z" fill="#EA7A9A"></path>
                                            <path d="M26.8751 11.25C27.7403 11.25 28.5862 10.9934 29.3057 10.5127C30.0251 10.0319 30.5859 9.34866 30.917 8.54923C31.2482 7.74981 31.3348 6.87014 31.166 6.02148C30.9972 5.17281 30.5805 4.39326 29.9686 3.78141C29.3568 3.16955 28.5772 2.75288 27.7286 2.58407C26.8799 2.41526 26.0002 2.5019 25.2008 2.83303C24.4014 3.16416 23.7181 3.72492 23.2374 4.44438C22.7567 5.16384 22.5001 6.0097 22.5001 6.875C22.5015 8.03489 22.9628 9.14688 23.783 9.96705C24.6032 10.7872 25.7152 11.2486 26.8751 11.25ZM26.8751 5C27.2459 5 27.6084 5.10997 27.9167 5.31599C28.2251 5.52202 28.4654 5.81485 28.6073 6.15747C28.7492 6.50008 28.7864 6.87708 28.714 7.24079C28.6417 7.6045 28.4631 7.9386 28.2009 8.20082C27.9387 8.46304 27.6046 8.64162 27.2408 8.71397C26.8771 8.78631 26.5001 8.74918 26.1575 8.60727C25.8149 8.46535 25.5221 8.22503 25.3161 7.91669C25.11 7.60835 25.0001 7.24584 25.0001 6.875C25.0006 6.37789 25.1983 5.9013 25.5499 5.54979C25.9014 5.19829 26.3779 5.00056 26.8751 5Z" fill="#EA7A9A"></path>
                                        </svg>
                                    </small>
                                    <span class="circle bg-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="card">
                        <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                            <div class="me-auto pe-3">
                                <h4 class="text-black fs-20">Orders Summary</h4>
                                <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                            <div class="card-action card-tabs mt-3 mt-sm-0 mt-3 mb-sm-0 mb-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Monthly" role="tab" aria-selected="true">
                                            Monthly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab" aria-selected="false">
                                            Weekly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab" aria-selected="false">
                                            Today
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Monthly">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div id="radialBar" class="orderChart"></div>
                                        </div>
                                        <div class="col-sm-6 mb-sm-0 mb-3 text-center">
                                            <h3 class="fs-28 text-black font-w600">$456,005.56</h3>
                                            <span class="mb-3 d-block">from $500,000.00</span>
                                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
                                            <a href="post-details.html" class="btn btn-primary light btn-rounded">More Details</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">25</h3>
                                                <span class="fs-18 text-primary">On Delivery</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">60</h3>
                                                <span class="fs-18 text-primary">Delivered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">7</h3>
                                                <span class="fs-18 text-primary">Canceled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Weekly">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div id="radialBar2" class="orderChart"></div>
                                        </div>
                                        <div class="col-sm-6 mb-sm-0 mb-3 text-center">
                                            <h3 class="fs-28 text-black font-w600">$150,002.00</h3>
                                            <span class="mb-3 d-block">from $400,000.00</span>
                                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
                                            <a href="post-details.html" class="btn btn-primary light btn-rounded">More Details</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">30</h3>
                                                <span class="fs-18 text-primary">On Delivery</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">55</h3>
                                                <span class="fs-18 text-primary">Delivered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">9</h3>
                                                <span class="fs-18 text-primary">Canceled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Today">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div id="radialBar3" class="orderChart"></div>
                                        </div>
                                        <div class="col-sm-6 mb-sm-0 mb-3 text-center">
                                            <h3 class="fs-28 text-black font-w600">$856,005.56</h3>
                                            <span class="mb-3 d-block">from $800,000.00</span>
                                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
                                            <a href="post-details.html" class="btn btn-primary light btn-rounded">More Details</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">45</h3>
                                                <span class="fs-18 text-primary">On Delivery</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-md-0 mb-3">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">90</h3>
                                                <span class="fs-18 text-primary">Delivered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="p-3 border rounded">
                                                <h3 class="fs-32 text-black font-w600 mb-1">3</h3>
                                                <span class="fs-18 text-primary">Canceled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card trending-menus">
                                <div class="card-header d-sm-flex d-block pb-0 border-0">
                                    <div>
                                        <h4 class="text-black fs-20">Trending Menus</h4>
                                        <p class="fs-13 mb-0 text-black">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
                                        <span class="num">#1</span>
                                        <div class="me-auto pe-3">
                                            <a href="post-details.html"><h2 class="text-black fs-14">Medium Spicy Spagethi Italiano</h2></a>
                                            <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                        </div>
                                        <img src="images/menus/9.png" alt="/" width="60" class="rounded">
                                    </div>
                                    <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
                                        <span class="num">#2</span>
                                        <div class="me-auto pe-3">
                                            <a href="post-details.html"><h2 class="text-black fs-14">Watermelon juice with ice</h2></a>
                                            <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                        </div>
                                        <img src="images/menus/10.png" alt="/" width="60" class="rounded">
                                    </div>
                                    <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
                                        <span class="num">#3</span>
                                        <div class="me-auto pe-3">
                                            <a href="post-details.html"><h2 class="text-black fs-14">Chicken curry special with cucumber</h2></a>
                                            <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                        </div>
                                        <img src="images/menus/11.png" alt="/" width="60" class="rounded">
                                    </div>
                                    <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
                                        <span class="num">#4</span>
                                        <div class="me-auto pe-3">
                                            <a href="post-details.html"><h2 class="text-black fs-14">Italiano Pizza With Garlic</h2></a>
                                            <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                        </div>
                                        <img src="images/menus/12.png" alt="/" width="60" class="rounded">
                                    </div>
                                    <div class="d-flex tr-row align-items-center">
                                        <span class="num">#5</span>
                                        <div class="me-auto pe-3">
                                            <a href="post-details.html"><h2 class="text-black fs-14">Tuna Soup spinach with himalaya salt</h2></a>
                                            <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                        </div>
                                        <img src="images/menus/9.png" alt="/" width="60" class="rounded">
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
