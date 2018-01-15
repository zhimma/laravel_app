define(function (require, exports, module) {
    module.exports = {
        init:function(){
            $(".j_logout").click(function(){
                $(this).find('form').submit();
            });

        }
    }

})
