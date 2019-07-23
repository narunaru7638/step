$(function() {
    let $toggleMsg = $('.js-toggle-msg');
    if($toggleMsg.length){
        $toggleMsg.slideDown();
        setTimeout(function(){ $toggleMsg.slideUp(); },3000);
    }
});



//STEP登録画面における子STEP追加時のフラッシュメッセージ
$(function() {
    let childstepCount = Number($('.js-count-of-childstep').val());
    let $childstepAdd = $('.js-add-childstep');
    let $msgToggleAddChildstep = $('.js-toggle-msg--add-childstep');
    let $msgToggleCannotAddChildstep = $('.js-toggle-msg--cannot-add-childstep');
    let $childstepReduce = $('.js-reduce-childstep');
    let $msgToggleReduceChildstep = $('.js-toggle-msg--reduce-childstep');
    let $msgToggleCannotReduceChildstep = $('.js-toggle-msg--cannot-reduce-childstep');

    $childstepAdd.on('click', function () {
        if(Number(childstepCount) < 10){
            if($msgToggleAddChildstep.length){
                $msgToggleAddChildstep.slideDown();
                childstepCount = childstepCount + 1;
                setTimeout(function(){ $msgToggleAddChildstep.slideUp(); },3000);
            }
        }else{
            if($msgToggleCannotAddChildstep.length){
                $msgToggleCannotAddChildstep.slideDown();
                setTimeout(function(){ $msgToggleCannotAddChildstep.slideUp(); },3000);
            }
        }
    });

    $childstepReduce.on('click', function () {
        if(Number(childstepCount) > 1){
            if($msgToggleReduceChildstep.length){
                $msgToggleReduceChildstep.slideDown();
                childstepCount = childstepCount - 1;
                setTimeout(function(){ $msgToggleReduceChildstep.slideUp(); },3000);
            }
        }else{
            if($msgToggleCannotReduceChildstep.length){
                $msgToggleCannotReduceChildstep.slideDown();
                setTimeout(function(){ $msgToggleCannotReduceChildstep.slideUp(); },3000);
            }
        }
    });
});