define(function(require, exports, module){
    var $ = require('jquery');
    require('masonry/masonry')($);

    var $container = $('#J_post_box');
    $container.masonry({
        columnWidth: 300,
        itemSelector: '.J_post_item',
        gutter: 20
    });
});