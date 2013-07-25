$(document).
    ready(function () {
        
        var buttonClick = function (e) {
            
            var that = $(this);
            
            that.css({"box-shadow":"0px 0px 0px 0px #000000"});
            
        }//end ButtonClick Function
        
        $(".ssbw_button").bind("click", buttonClick);
                
});