

$.fn.mainSlider = function(options){
    var settings = $.extend({
        changeTime: 4000,
        auto: true,
        class: 'slide-image',
        effect: 'fade',//fade,carousel
        effectTime: 800
    }, options);

    var slider = this, effect, items = 0, activeNum = 0, activeImage, slideInterval;


    items = slider.find('.slide-image ul li').length; // count slide images
    //change image slider fade effect
    slider.fade = function(){
        activeNum++;
        if(activeNum >= items) activeNum = 0; // set active image to first image if num >= images length
        activeImage = slider.find('.slide-image ul li.active'); //active image place
        slider.find('.slide-image ul li:eq('+activeNum+')').fadeIn(settings.effectTime,function(){ //fade in next image
            $(this).addClass('active'); //add class active to next image
        });
        activeImage.fadeOut(settings.effectTime,function(){ //fade Out active image
            $(this).removeClass('active'); //remove class active from active image
        });
    };

    //change image slider carousel effect
    slider.carousel = function(){
        console.log('no effect yet');
    };

    // setting effects
    switch(settings.effect){
        case 'fade':
            effect = slider.fade;
            break;
        case 'carousel':
            effect = slider.carousel;
            break;
        default:
            effect = slider.fade;
            break;
    }

    //pause on hover
    slider.hover(
        function(){
            clearInterval(slideInterval);
        },
        function(){
            slider.interval();
        }
    );


    // change image slider automatically
    slider.interval = function(){
        if(settings.auto == true && items > 1)
            slideInterval = setInterval(effect,settings.changeTime);
    };
    slider.interval();

    // next
    slider.find('a.next').click(function(){
        effect();
    });

    //previous
    slider.find('a.previous').click(function(){
        effect();
    });

    //spots
    slider.find('div.slider-dots ul li').click(function(){
        console.log($(this).index()+'-'+activeNum);
        if(activeNum != $(this).index()){
            activeNum = $(this).index() - 1;
            effect();
        }
    });
};

$("#slider").mainSlider({auto:true,effectTime:600});


