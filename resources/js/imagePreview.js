//画像登録
var $dropArea = $('.js-area-drop');
var $fileInput = $('.js-input-file');
var $imgPrev = $('.prev-img');
$dropArea.on('dragover', function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '3px #ccc dashed');
});
$dropArea.on('dragleave', function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', 'none');
});
$fileInput.on('change', function(e){
    e.stopPropagation();
    e.preventDefault();
    $dropArea.css('border', 'none');
    // $dropArea.css('border', 'dotted');


    //$(this).attr('src', )
    var file = this.files[0],
        $img = $(this).siblings('.prev-img'),
        fileReader = new FileReader();
    // var fileHeight = file.height();

    // $dropArea.css('height', $fileHeight);


    fileReader.onload = function(event){
        $img.attr('src', event.target.result).show();
    };
    fileReader.readAsDataURL(file);

    // var $imgPrev = $('.prev-img');
    // var fileHeight = $imgPrev.height();
    // console.log(fileHeight);
    // $dropArea.css('height', fileHeight);
    // $dropArea.css('z-index', '2');
    //
    // $dropArea.css('height', 'auto');
    // $fileInput.css('height', 'auto');
    $imgPrev.css('max-height', '100%');
    $imgPrev.css('max-width', '100%');


    // $imgPrev.css('max-width', 'auto');


    // $dropArea.css('min-height', 'auto');
    // $dropArea.css('height', '');




    // $imgPrev.css('max-height', '100%');


});