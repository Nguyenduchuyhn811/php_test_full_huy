$(document).ready(function(){
    $('.header_social_item li.header_cart_show_area').delegate('i','click', function(){
        $('.header_social_cart').toggleClass('show')
    });
    var a = $('.quantrishowoff').height();
    $('.quantri .quantrimenu').attr('height', a+'px');


    // xóa sản phẩm trong giỏ hàng
    $('.tongtien_page').delegate('.tienleft_item button.delete','click', function(){ //vì sau khi chèn vào thì hàm .on('click' ,function) ko chạy đc nên phải dùng hàm delegate để chạy đoạn thêm vào
        var id = $(this).attr("data-id");
        // target = $(this).data("target");
        console.log(id); 

        var data = {
            data_id     : id
        };
        str_cart_product ='http://localhost:81/cart/remove/'+id; 
        str_header_cart = 'http://localhost:81/cart_header/remove';
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str_cart_product,
            data : data,
            success : function(data){
                // if (data.success == 'true') {
                    alert("Sản phẩm đc xóa khỏi giỏ hàng");
                    $('.tongtien_page .tienleft').html(data);   

                    $.ajax({
                        method : "POST",
                        url  : str_header_cart,
                        data : data,
                        success : function(result){
                            $('.header_social_item .header_cart_show_area').html(result);
                        }
                    })
                // }else{
                //     alert("Server lỗi");
                // }
            }
        })  
    });


    // update status cho phần quản trị
    $('.quantridanhsachmgg .quantridanhsach tbody tr td select').on('change', function(){
        var status = $(this).val();
        var id = $(this).attr("data-id");
        // var email = $("#email_km").val();
        // var nguon = $("#nguon_km").val();
        console.log(id);
        var data = {
            data_status : status,
            data_id     : id,
            datafn      : 'updateDiscount'
        };
        str='http://localhost:81/quantri/xuly.php';  
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str,
            data : data,
            // success : function(result){

            // }
        })  
    });

    $('.quantridanhsachsp .quantridanhsach tbody tr td select').on('change', function(){
        var val_status = $(this).val();
        var val_id = $(this).attr("data-id");
        console.log(status);
        var data = {
            status : val_status,
            id     : val_id
            // datafn      : 'updateStatusProductList'
        };
        str='http://localhost:81/quantri/statusproduct/update';  
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str,
            data : data,
            success : function(result){
                if(result.success == true){
                    alert("success");
                }else{
                    alert("failed");
                }
            }
        })  
    });

    $('.quantridanhmucsp .quantridanhsach tbody tr td select').on('change', function(){
        var status = $(this).val();
        var id = $(this).attr("data-id");
        console.log(status);
        var data = {
            data_status : status,
            data_id     : id,
            // datafn      : 'updateStatusProduct'
        };
        str='http://localhost:81/quantri/quantrisuasanpham';  
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str,
            data : data,
            // success : function(result){

            // }
        })  
    });

    $('.danhsachtintuc .quantridanhsach tbody tr td select').on('change', function(){
        var status = $(this).val();
        var id = $(this).attr("data-id");
        console.log(status);
        var data = {
            data_status : status,
            data_id     : id,
            datafn      : 'updateStatusNews'
        };
        str='http://localhost:81/quantri/xuly.php';  
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str,
            data : data,
            // success : function(result){

            // }
        })  
    });

    $('.quanlivideo .quantridanhsach tbody tr td select').on('change', function(){
        var status = $(this).val();
        var id = $(this).attr("data-id");
        console.log(status);
        var data = {
            data_status : status,
            data_id     : id,
            datafn      : 'updateStatusNews'
        };
        str='http://localhost:81/quantri/xuly.php';  
        // console.log(str);
        $.ajax({
            method : "POST",
            url  : str,
            data : data,
            // success : function(result){

            // }
        })  
    });


    //trang thanh toán đơn hàng
    $('.thanhtoanbackground .thanhtoandiachi select#thanhpho').on('change', function(data){
        var city = $(this).val();
        // var id = $(this).attr("data-id");
        if (city != ''|| city != 0) {
            var data = {
                // data_city   : city,
                // data_distric: distric,
                // data_id     : id,
                // datafn      : 'showDistric'
            };
            var str='http://localhost:81/quantri/distric/'+city;  
            // console.log(data);
            $.ajax({
                method : "POST",
                url  : str,
                data : data,
                // dataType:'json',
                success : function(result){
                    $('#quan').html(result);
                },
            });
        }   
    });

    $('.thanhtoanbackground .thanhtoandiachi select#quan').on('change', function(data){
        var distric = $(this).val();
        // var id = $(this).attr("data-id");
        // console.log(city);
        if (distric != '') {
            var data = {
                data_distric   : distric,
                // data_id     : id,
            };
            str='http://localhost:81/quantri/commune/'+distric;  
            // console.log(str);die();
            // console.log(str);
            $.ajax({
                method : "POST",
                url  : str,
                data : data,
                success : function(result){
                    $('#phuong').html(result);
                }
            })  
        }   
    });
});