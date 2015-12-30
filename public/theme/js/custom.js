// search placeholder
var inputPlaceholder = function(e,name){
    if($(e).val() == name){
        $(e).val("");
    }
};

var setLanguage = function(e){
   $('.lang input[name="locale"]').val(e.data('lang'));
};

var clickSubmit = function(id){
    $("#"+id).click();
};

var dropDownOnHover = function(id,item,time){
    item.find('li').width(id.width() + 46);
    id.hover(
        function(){
            item.slideDown(time);
        },
        function(){
            item.slideUp(time);
        }
    );
};

var slideUpOnHover = function(id,item,time){
    id.hover(
        function(){
            $('.'+item,this).slideDown(time);
        },
        function(){
            $('.'+item,this).slideUp(time);
        }
    );
};


dropDownOnHover($('.active-language'),$('.lang ul'),200);

slideUpOnHover($('.horizontal-items-3-place ul li'),'horizontal-items-3-title',400);
slideUpOnHover($('.horizontal-items-4-place ul li'),'horizontal-items-4-title',400);
slideUpOnHover($('.read .news_side .main_image'),'image_title',200);
/*
var partners = $('.partners .partners-place div ul li').length;
if(partners > 0){
    var pc = 0;
    for(var i = 0; i < partners;i++){
       console.log($('.partners .partners-place div ul li:nth-child('+i+') a img').width());
    }
    console.log(pc+'-'+partners);
}
//$('.partners .partners-place ul').niceScroll({cursorcolor:"#e22219",cursorborder:'none'});*/
$('.slide-items ul').niceScroll({cursorcolor:"#e22219",cursorborder:'none'});




/* MENU DROPDOWN */

$('ul.menu-list > li').hover(
    function(){
        var height = ($('.slide-items').height()) ? $('.slide-items').height() + 15 : 490;
        $(this).find('ul.outside > li:first-child').addClass('active');
        $(this).find('ul.outside').css('height',height + 'px').stop(true,true).slideDown(100);
    },
    function(){
        $(this).find('ul.outside').stop(true,true).hide();
        $(this).find('ul.outside > li').removeClass('active');
    }
).stop();

$('ul.outside > li').hover(function(){
    if($(this).attr('class') != 'active'){
        $('ul.outside > li').removeClass('active');
        $(this).addClass('active');
    }
});


$('.frequencies .button').click(function(){
    $('.online-radios').toggle('slide',{direction:'down'},300);
});

/* CATEGORY TABS */
$('.cat_tabs .tabs div').click(function(){
    $('.cat_tabs .tabs div').removeClass('active');
    $(this).addClass('active');
    var tabNum = $(this).index();
    $('.tab_content div').removeClass('active');
    $('.tab_content > div:eq('+tabNum+')').addClass('active');
});


$('.video_player iframe').css({'width':'100%','height':'360px'});

function shareWindow(name,e){
    window.open(e.href, ''+name+'','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}

$('ul.menu-list > li.more').hover(
    function(){
        $('ul.menu-list > li.more ul').slideDown(200);
    },
    function(){
        $('ul.menu-list > li.more ul').slideUp(200);
    }
);

$('#datetimepicker1,#datetimepicker2,#datetimepicker3,#datetimepicker4,#datetimepicker5,#datetimepicker6').datetimepicker({
    format:'yyyy-MM-dd',
    inline: true,
    sideBySide: true
}).on('dp.change',function(e){
    var date = new Date(e.date._d);
    var dateFormat = moment(e.date._d).format('YYYY-MM-DD');
    window.location.href = '/'+$(this).data('slug')+'/date/'+dateFormat+'/';
});





