$(document).ready(function(){
    $('.slide_header').owlCarousel({
    margin:0,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:false,
    autoplaySpeed:1000,
    navSpeed:1000,
    navigation:true,
    pagination:false,
    loop:true,
    responsive:{
        0:{
            items:1
        },
    }
})
});

$(document).ready(function(){
    $('.home_content ').owlCarousel({
    margin:20,
    nav:false,
    dots:false,
    autoplay:false,
    autoplayTimeout:8000,
    autoplayHoverPause:false,
    autoplaySpeed:1000,
    navSpeed:1000,
    navigation:true,
    pagination:false,
    loop:true,
    responsive:{
        0:{
            items:1
        },
        1000:{
            item:3
        }
    }
})
});

$(document).ready(function(){
    $('.product_slide_show').owlCarousel({
    margin:10,
    nav:true,
    dots:false,
    autoplay:false,
    autoplayTimeout:8000,
    autoplayHoverPause:false,
    autoplaySpeed:1000,
    navSpeed:1000,
    navigation:true,
    pagination:false,
    loop:false,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:4
        }
    }
})
});

$(document).ready(function(){
    $('.customer_opinion_slide').owlCarousel({
    margin:0,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:false,
    autoplaySpeed:1000,
    navSpeed:1000,
    navigation:true,
    pagination:false,
    loop:true,
    responsive:{
        0:{
            items:1
        },
    }
})
});

$(document).ready(function(){
    $('.product_slide').owlCarousel({
    margin:15,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:false,
    autoplaySpeed:1000,
    navSpeed:1000,
    navigation:true,
    pagination:false,
    loop:false,
    responsive:{
        0:{
            items:1,
            loop: true
        },
        1000:{
            items:3
        }
    }
})
});

$(document).ready(function(){

    // thay hình ảnh trong trang quản trị
    function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#dangtintucpic').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }

    $('.quantripic input').on('change', function(){
        readURL(this);
    });
    // end
    
    
     $('.quanliqc .quantridanhsach tbody tr td select').on('change', function(){
        var status = $(this).val();
        var id = $(this).attr("data-id");
        console.log(status);
        var data = {
            data_status : status,
            data_id     : id,
            datafn      : 'updateStatusQc'
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

});

// autoComplete function
$(document).ready(function(){
    $("#search_box").keyup(function(){
        var keyword1 = $(this).val();
        var data = {
            keyword     : keyword1,
            datafn      : 'autoComplete'
        };
        if (keyword1 != '') {
            $.ajax({
            method: "POST",
            url: "http://localhost:81/quantri/xuly.php",
            data: data,
            // beforeSend: function(){
            //  $("#search_box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            // },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                // $("#search_box").css("background","#FFF");
            }
            });
        }else{
            $("#suggesstion-box").hide();
        }
    });
});
    
    //To select country name
// function selectNameProducts(val) {
// $("#search-box").val(val);
// $("#suggesstion-box").hide();
// }
// $('#suggesstion-box li').on('click',function(){
// console.log("ngu");
// var namesearch = $(this).val();
// console.log(namesearch);
// $("#search_box").innerHTML(namesearch);
// });


jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
 });


// delete products and create products
$(document).ready(function(){
    var a = false;
    var b = false;
    $('.quantriupdate .quantridelete .delete').on('click', function(event){
        if (!confirm("Bạn có chắc muốn xóa")) {
            event.preventDefault();
        }
    });
    // $('.quantriupdate .quantridelete .update').on('click', function(){
    //     if (confirm("Bạn có chắc đồng bộ")) {
    //         // $("form").submit(function(event){
    //             alert("Submitted");
    //         // });
    //     } else {
    //         txt = "You pressed Cancel!";
    //     }
    // });  
});

$(document).ready(function(){
    $('.thanhtoanphuongthucitem .thanhtoanphuongthucitemname').on('click', function(){
        var p = $(this).attr('data');
        var o = document.getElementsByClassName('checkboxx');
        if ($(this).find('.checkboxx').html() != '<i class="fa fa-check-square-o" aria-hidden="true"></i>') {
            for (i = 0; i <4; i++) {
                o[i].innerHTML='<i class="fa fa-square-o" aria-hidden="true"></i>';
            }
            $('.thanhtoanbackground .thanhtoanshow .thanhtoanphuongthuc .thanhtoanphuongthucitem .thanhtoanphuongthucitemname').removeClass('active');
            document.getElementById(p).innerHTML='<i class="fa fa-check-square-o" aria-hidden="true"></i>';
            $(this).addClass('active');
        }    
        else{
            $('.thanhtoanbackground .thanhtoanshow .thanhtoanphuongthuc .thanhtoanphuongthucitem .thanhtoanphuongthucitemname').removeClass('active');
            document.getElementById(p).innerHTML='<i class="fa fa-square-o" aria-hidden="true"></i>';
        }
    });
});

var num = 100;  
$(window).bind('scroll', function () {
  if ($(window).scrollTop() > num) {   
      $('.header_menu').removeClass('hidden1').addClass('fixed');
      $('body').removeClass('hidden1').addClass('fixed');
  }
  else
  {
      $('.header_menu').removeClass('fixed').addClass('hidden1');
      $('body').removeClass('fixed').addClass('hidden1');
  }
});

// $(document).ready(function(){
//     if($('#txt_name').error()){
//         $('name_erro').addClass('v1')
//     }
//     else
//     {
//         $('name_erro').removeClass('v1')
//     }
// });

$(document).ready(function(){
    $("#zoom_01").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
    //pass the images to Fancybox
    $("#zoom_01").bind("click", function(e) {  
      var ez =   $('#zoom_01').data('elevateZoom'); 
        $.fancybox(ez.getGalleryList());
      return false;
    });
    $("#zoom_01").elevateZoom({
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            scrollZoom : true
    });
});




// $(document).ready(function(){
//     var clicks = 0;
//     $('.tang').on('click', function(){
//         clicks += 1;
//         document.getElementById("clicks").innerHTML = clicks;
//         document.getElementById("clicks").value = clicks;
//     });
//     $('.giam').on('click', function(){
//      if(clicks.valueOf()!=0)
//         {
//            clicks -= 1;
//            document.getElementById("clicks").innerHTML = clicks;
//            document.getElementById("clicks").value = clicks;
//         } 
//     });
// });

$(document).ready(function(){
    $('.color span').on('click', function(){
        $('.color span').removeClass('active');
        $(this).addClass('active');
    });
    $('header .header_menu .header_social .header_social_item li .header_search_button').on('click', function(){
        var check = $(this).find('i').attr('class');
        // console.log(check);
        $('header .header_menu .header_social .header_social_item li .header_search_area').toggleClass('active');
        if (check == "fa fa-search") {
            $(this).find('i').attr('class', 'fa fa-times');
        }else{
            $(this).find('i').attr('class', 'fa fa-search');
        }
    });
});

$(document).ready(function(){
    document.getElementById("my-menu").style.width = "87%"
});

// $(document).ready(function(){
//     var money=0;
//     var x=0;
//   $('button#add-cart, .cart_mobile button').on('click', function(){
//      var html=''; 
//      var flag=$(this).attr('data');
//      var name=$("#"+flag).find('h3').text();
//      var price=$("#"+flag).find('div.price p:first-child').text(); 
//      var img=$("#"+flag).find('a img').attr("src"); 
//      var link=$("#"+flag).find('a').attr("href"); 
//      var number=parseInt($("#"+flag).find('div.price p').attr("value"));
//      $("#cart_top").empty();
     
//         html+='<li id="' + flag +'">'
//             html+='<img src='+img+' style="width: 15%; float: left">' 
//             html+='<div style="width:70%; float: left">'    
//                 html+='<div style="padding: 0;"><b>'+ name +'</b></div>'
//                 html+='<p>SL: 1 x '+ price + '</div>'
//             html+='</div>'
//             html+='<div style="width: 15%; float: left">'
//                 html+='<i class="fa fa-trash-o" aria-hidden="true" data="' + flag +'"></i>'
//             html+='</div>' 
//         html+='</li>' 
//         $(".giatien, .sanpham, button").addClass("active");
//         $(".header_social_cart .sanpham ").append(html);
//         money = money + number;
//         x = x+1;
//         console.log(x);  
//         document.getElementById('giatien').innerHTML=money + " đ";
//         document.getElementById('number_item').innerHTML = x ;
//   });
//     $('.header_social_cart .sanpham ').delegate('li i','click', function(){
//         var data = $(this).attr('data');
//         $("#"+data).remove();
//         var number=parseInt($("."+data).find('div.price p').attr("value"));
//         money = money - number;
//         x = x-1;
//         document.getElementById('number_item').innerHTML = x;


//         document.getElementById('giatien').innerHTML=money + " đ";
//         if($(".sanpham").text()==''){
//             $("#cart_top").append("Hiện chưa có sản phẩm nào trong giỏ hàng của bạn");
//             $(".giatien, .sanpham, button").removeClass("active");
//         }
//     });
// });    

$(window).ready(function(){
    // var win=$(window).width();
    // if (win >= 991) {
    //     $('button#add-cart').on('click', function(){
    //         $('.header_social_cart').addClass('show');
    //     })
    //     console.log("ngu" + win)
    // }
});
 
