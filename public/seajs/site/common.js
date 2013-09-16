define(function(require, exports, module){
    var $ = require('jquery');

    $(document).ready(function(){
        $('body').on('mouseover', '.dropdown', function(e){
            $(this).find('.dropdown-menu').show();
        }).on('mouseout', '.dropdown', function(e){
                $(this).find('.dropdown-menu').hide();
            });
    });
});