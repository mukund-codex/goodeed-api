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
            <div class="col-xl-12">
                <!-- Add Category Form -->
                <form method="POST" action="{{ route('admin.category_handler') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Name</label>
                        <input type="text" class="form-control" name="name" id="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option> Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
    @include('admin.components.footer')
        <!-- ****** footer start ****** -->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
</html>
