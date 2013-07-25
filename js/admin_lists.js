$(document).
    ready(function () {
        
        var memberHover = function (e) {
            
            var that = $(this);
            
            var button = that.children(".delete_button");
            
            button.css({"display":"block"});
            
        }//end MemberHover Function
        
        var memberNoHover = function (e) {
            
            var that = $(this);
            
            var button = that.children(".delete_button");
            
            button.css({"display":"none"});
            
        }//end MemberNoHover Function
        
        $(".admin_list_item")
            .bind("mouseenter", memberHover)
            .bind("mouseleave", memberNoHover)
        ;
                
});