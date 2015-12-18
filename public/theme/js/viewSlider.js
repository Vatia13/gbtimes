var images = $('.read .other_images ul li');
var imageNum = images.length;
var start = 1;
function viewSlider(){
    if(start >= imageNum){
        start = 1;
        $('.read .other_images ul li.active').removeClass('active');
        $('.read .other_images ul li:first-child').addClass('active');
    }else if(start < 1){
        start = imageNum;
        $('.read .other_images ul li.active').removeClass('active');
        $('.read .other_images ul li:last-child').addClass('active');
    }else{
        $('.read .other_images ul li.active').removeClass('active').next('li').addClass('active');
        $('.read .other_images ul li.active a').attr('href');
    }

    start++;
}

var viewInterval = setInterval(viewSlider,3000);


