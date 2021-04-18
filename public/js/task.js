$(".btn1").mouseover(function(){
    $(".btn2").show(250);
    $(".btn3").show(500)
});

$(".btns").mouseleave(function(){
    $(".btn3").hide(250);
    $(".btn2").hide(700);
});