$('document')
    .ready(function () {
        
        //creates objects that represent slides
        
        //references all slides
        var allSlides = $('.slide');
        //references slide with "class" set to "active"
        var activeSlide = $('.active');
        
        //shows the "active" slide
        activeSlide.show();
        
        //references the next array index after the "active"-class slide
        var nextSlide = activeSlide.next();
        
        //sets a timer to run the slideshow
        var timer = setInterval(
            
            //defines function to execute slideshow code on set time interval
            function() {
                
                //shows the next slide
                nextSlide.show();
                
                //hides the current "active" slide
                activeSlide.hide();
                
                //sets the new "shown" slide as the new "active" slide
                activeSlide = nextSlide;
                
                //uses conditional to check if the new "active" slide is the last slide selected
                if(allSlides.last().index() == allSlides.index(activeSlide)) {
                    
                    //if the current slide occupies the last index of the "allSlides" array
                   
                    //set the next slide to the first array index
                    //this allows the slideshow to restart
                    nextSlide = allSlides.eq(0);
                    
                }else{
                    
                    //if the current slide is not the final slide in the "allSlides" array
                    
                    //sets the next array index as the "nextSlide" so it can be shown
                    nextSlide = activeSlide.next();
                }
                
            },
            
            //sets time interval at which the function will be executed
            6000
            
        );
});