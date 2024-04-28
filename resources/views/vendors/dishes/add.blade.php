
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
                <form method="POST" action="{{ route('vendors.dishes.create') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="restaurant_id">Restaurant</label>
                        <select class="form-control" name="restaurant_id" id="restaurant_id">
                            <option value="">Select Restaurant</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        @error('restaurant_id')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="subcategory_id">Sub Category</label>
                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                            <option>Select Sub Category</option>
                        </select>
                        @error('subcategory_id')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Dish Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Dish's Name" id="text" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Dish's Description" value="{{ old('description') }}">
                        @error('description')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="is_veg">Is Veg or Non Veg?</label>
                        <select class="form-control" name="is_veg" id="is_veg">
                            <option value="">Select Veg/Non-Veg</option>
                            <option value="1">Veg</option>
                            <option value="0">Non-Veg</option>
                        </select>
                        @error('is_veg')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="price">Price (in &#8360;)</label>
                        <input type="text" class="form-control" name="price" placeholder="Dish's Price" id="price" value="{{ old('price') }}" onchange="calculateDiscountedPrice()">
                        @error('price')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="discount_percentage">Discount Percentage (in %)</label>
                        <input type="text" class="form-control" name="discount_percentage" placeholder="Dish's Discount %" id="discount_percentage" value="{{ old('discount_percentage') }}" onchange="calculateDiscountedPrice()">
                        @error('discount_percentage')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-black font-w500" for="discount_price">Discounted Price (in &#8360;)</label>
                        <input type="text" class="form-control" name="discount_price" placeholder="Dish's Discounted Price (in &#8360;)" id="discount_price" value="{{ old('discount_price') }}" readonly>
                        @error('discount_price')
                        <span class="text-danger ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label  class="text-black font-w500" for="is_active">Active Status</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="">Select Status</option>
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
    @include('vendors.components.footer')
    <!-- ****** footer start ****** -->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!-- Script to get SUb category based on select category -->
<script>
    $(document).ready(function(){
        $('#category_id').on('change', function(){
            var category_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route("vendors.get-subcategories") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'category_id': category_id
                },
                success: function(data) {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append('<option>Select Sub Category</option>');
                    $.each(data, function(index, subcategory) {
                        $('#subcategory_id').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                    });
                }
            });
        });
    });

    function calculateDiscountedPrice() {
        var price = parseFloat(document.getElementById("price").value);
        var discount = parseFloat(document.getElementById("discount_percentage").value);

        if (!isNaN(price) && !isNaN(discount)) {
            var discountedPrice = price - (price * (discount / 100));
            document.getElementById("discount_price").value = discountedPrice.toFixed(2);
        } else {
            document.getElementById("discount_price").value = "";
        }
    }
</script>

</body>
</html>
