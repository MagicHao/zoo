define(function(require, exports, module){
    var $ = require('jquery');
    require('masonry/masonry')($);

    var $container = $('#J-post-box');

    $container.find('.J-post-box-item').css('width', 460);

    $container.masonry({
        columnWidth: 460,
        itemSelector: '.J-post-box-item',
        gutter: 20
    });
});