var $dropArea = $('.js-area-drop');
var $fileInput = $('.js-input-file');
var $imgPrev = $('.prev-img');
$(document).on('dragover','.js-area-drop', function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '3px #ccc dashed');
});
$(document).on('dragleave', '.js-area-drop', function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', 'none');
});
$(document).on('change', '.js-input-file',  function(e){
    e.stopPropagation();
    e.preventDefault();
    $dropArea.css('border', 'none');
    $(this).closest('.js-area-drop').css('border', 'none');
    var file = this.files[0],
        $img = $(this).siblings('.prev-img'),
        // console.log('test');
        fileReader = new FileReader();
    fileReader.onload = function(event){
        $img.attr('src', event.target.result).show();
    };
    fileReader.readAsDataURL(file);
    $imgPrev.css('max-height', '100%');
    $imgPrev.css('max-width', '100%');


});
