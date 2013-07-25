//sets JavaScript code to run once the Document has completed loading
$(document)
    .ready(function () {
        
       //defines function that will handle the "mouseenter" event for thumbnails
        var thumbHover = function(e) {
            
            //sets a reference to currently "hovered" thumbnail image 
            var that = $(this);
            
            //alters the css properties for the "hovered" image to reflect the "hover" state
            that.css({"box-shadow":"0px 2px 2px 1px #2C2C2C",
                    "border":"solid 1px #FAFAFA"});
            
        }//end ThumbHover Function
        
        //defines function that will handle the "mouseleave" event for thumbnails
        var thumbNoHover = function(e) {
            
            //sets a reference to the thumbnail image that was just "left"
            var that = $(this);
            
            //alters the css properties for the "hovered" image to reflect the "normal" state
            that.css({"box-shadow":"0px 2px 2px 1px #909090",
                    "border":"solid 1px #2C2C2C"});
            
        }//end ThumbNoHover Function
        
        //defines function that will handle the "click" event for thumbnails
        var thumbClick = function(e) {
            
            //sets a reference to the thumbnail image that was clicked
            var that = $(this);
            
            //alters the css properties for the "clicked" image to reflect the "clicked" state
            that.css({"box-shadow":"0px 0px 0px 0px #DFF4F5"});
            
            //stores the "source" attribute value for the "clicked" thumbnail
            var selectedImageSource = that.attr("src");
            
            //selects the main image for the gallery (uses the class name)
            //and changes the main image's "source" value to the value of the selected thumb's
            //"source" value
            $(".selected_gallery_image").attr("src",selectedImageSource);
            
        }//end ThumbClick Function
        
        //binds mouseenter/mouseleave/click events to any images with a class of
        //"thumbnail_gallery_image" and calls the appropriate function
        $(".thumbnail_gallery_image")
            .bind("mouseenter", thumbHover)
            .bind("mouseleave", thumbNoHover)
            .bind("click", thumbClick);
        
});