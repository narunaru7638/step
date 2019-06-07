$(function() {

    var $toggleMsg = $('.js-toggle-msg');
    if($toggleMsg.length){
        $toggleMsg.slideDown();
        setTimeout(function(){ $toggleMsg.slideUp(); },3000);
    }
});