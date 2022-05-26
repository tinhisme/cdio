$(document).ready(function () {

    $('.addToCart').click(function (e) { 
        e.preventDefault();
        var productID = $(this).closest('.productData').find('.productID').val();
        var productQuantity = $(this).closest('.productData').find('.quantity').val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method :"post" ,
            url: "/add-to-cart",
            data: {
                'productID' : productID,
                'productQuantity' : productQuantity,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    });

    $('.delete-cart-item').click(function (e) { 
        e.preventDefault();
        var productID = $(this).closest('.productData').find('.productID').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "post",
            url: "/delete-cart-item",
            data: {
                'productID' : productID,
            },
            success: function (response) {
            }
        });
    });
    
    $('.increment').click(function (e) { 
       e.preventDefault();

       var incrementValue = $(this).closest('.productData').find('.quantity').val();
       var value = parseInt(incrementValue,10);
       value = isNaN(value) ? 0 : value;
       if (value < 5) {
           value++;
           $(this).closest('.productData').find('.quantity').val(value);
       }
    }); 

    $('.decrement').click(function (e) { 
       e.preventDefault();

       var decrementValue = $(this).closest('.productData').find('.quantity').val();
       var value = parseInt(decrementValue,10);
       value = isNaN(value) ? 0 : value;
       if (value > 1) {
           value--;
           $(this).closest('.productData').find('.quantity').val(value);
       }
    }); 

   

    $('.changeQuantity').click(function (e) { 
        e.preventDefault();
        var productID = $(this).closest('.productData').find('.productID').val();
        var productQuantity = $(this).closest('.productData').find('.quantity').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        data = {
            'productID' : productID,
            'productQuantity' : productQuantity,
        }

        $.ajax({
            method : "post",
            url: "/update-cart",
            data: data,
            success: function (response) {
                swal(response.status);
            }
        });
    });
});