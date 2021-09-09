$(document).ready(function(){
    $("#contact_1").mouseover(function(){
        $("#contact_1").animate({
            width: '+=400px'
        })
         $("#c_info1").delay(500).fadeIn();
    })

    $("#contact_1").mouseout(function(){
        $("#c_info1").fadeOut();
        $("#contact_1").animate({
            width: '-=400px'
        })
    })
    $("#contact_2").mouseover(function(){
        $("#contact_2").animate({

            width: '+=400px'
        })
        $("#c_info2").delay(500).fadeIn();
    })
    $("#contact_2").mouseout(function(){
        $("#c_info2").fadeOut();
        $("#contact_2").animate({
            width: '-=400px'
        })

    })
    $("#contact_3").mouseover(function(){
        $("#c_info3").delay(500).fadeIn();
        $("#contact_3").animate({
            width: '+=400px'
        })
    })
    $("#contact_3").mouseout(function(){
        $("#c_info3").fadeOut();
        $("#contact_3").animate({
            width: '-=400px'
        })
    })
    $("#contact_4").mouseover(function(){
        $("#c_info4").delay(500).fadeIn();
        $("#contact_4").animate({
            width: '+=400px'
        })
    })
    $("#contact_4").mouseout(function(){
        $("#c_info4").fadeOut();
        $("#contact_4").animate({
          
            width: '-=400px'
        })
    })
})