$(document).ready(function(){
	$('.quantri .quantrilogin .option div label input').on('click',function(){
		var id_this = $(this).attr('id');
		var id_son_class = ".oppclass" + $(this).attr('value');
		var id_father_find_son = ".oppclass" + $(this).attr('data-parent');
		// console.log(id_father_find_son);
		var parent_id = $(this).attr('data-parent');
		var parent_location = "opp" + parent_id;
		var check = document.getElementById(parent_location);
		var checkparent = document.getElementById(id_this);
		var oppchild = $('.quantri .quantrilogin .option div label').find(id_son_class);     //khi bấm vào list cha thì sẽ tìm list con của thằng cha
		var listchild = $('.quantri .quantrilogin .option div label').find(id_father_find_son);    //khi bấm vào list con thì sẽ kiểm tra xem có list con nào đang check hay ko nếu còn thì father để check nếu ko thì father.check=false

		
		if (parent_location != "opp0") {
			result = false;
			for (var i = 0; i < listchild.length; i++) {
				var elem = $(listchild[i]).attr('class');
				// console.log(elem);
				elem_check = document.getElementsByClassName(elem);
				if (elem_check[i].checked==true) {
					result = true;
				}
			}
			if (result == false) {
				// console.log(parent_location);
				document.getElementById(parent_location).checked==false;
				check.checked = false;
			}else{
				document.getElementById(parent_location).checked==true;
				check.checked = true;
			}
		}else{
			if (checkparent.checked == true) {
				for (var i = 0; i < oppchild.length; i++) {
					var elem = $(oppchild[i]).attr('id');
					document.getElementById(elem).checked=true;
				}
				// console.log(id);
			}else{
				for (var i = 0; i < oppchild.length; i++) {
					var elem = $(oppchild[i]).attr('id');
					document.getElementById(elem).checked=false;
				}
			}
		}
	});
});

//      var flag=$(this).attr('data');
//      var name=$("#"+flag).find('h3').text();
//      var price=$("#"+flag).find('div.price p:first-child').text(); 
//      var img=$("#"+flag).find('a img').attr("src"); 
//      var link=$("#"+flag).find('a').attr("href"); 
//      var number=parseInt($("#"+flag).find('div.price p').attr("value"));