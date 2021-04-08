$(".btn1").mouseover(function(){
    $(".btn_add_category").show(250);
    $(".btn_add_task").show(500)
});

$(".btns").mouseleave(function(){
    $(".btn_add_task").hide(250);
    $(".btn_add_category").hide(700);
});