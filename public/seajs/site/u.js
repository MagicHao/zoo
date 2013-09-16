define(function(require, exports, module){
    var $ = require('jquery');
    require('masonry/masonry')($);

    var $container = $('#J-post-box');
    $container.masonry({
        columnWidth: 470,
        itemSelector: '.J-post-box-item',
        gutter: 10
    });
});