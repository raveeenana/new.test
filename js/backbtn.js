$(document).ready(function(){
    $("#backimg").mouseover(function(){
        $("#backimg").animate({
            width: '+=20px',
            height: '+=10px',
        });
    });
    $("#backimg").mouseout(function(){
        $("#backimg").animate({
            width: '-=20px',
            height: '-=10px',
        });
    });
})