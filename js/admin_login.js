$(document).ready(function(){
    $("#buttons_at_first").click(function(){
        $(this).animate({height:"250px",width:"400px"});
        $(this).children("p").animate({fontSize:"25px"});

        $("#form_editing").delay(500).fadeIn();

    })
})