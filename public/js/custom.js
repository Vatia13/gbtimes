/**
 * Created by IT-SOlutions on 6/7/15.
 */
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}

function delCookie(name) {
    document.cookie = name + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
}

$('div.alert').not('.alert-important').delay(3000).slideUp(300);

$('.remove-modal').click(function(){
     $('.remove-item').attr('data-route',$(this).data('url'));
     var data = $('.remove-item').attr('data-remove',$(this).parent('td').parent('tr').index());
});

var i = 1;

function addField(id,input,trans){
    var num = $("#"+id).find('.row').length;
    i = num + 1;
    if(id != '' && input != ''){
        var html = '<div class="row"><div class="col-sm-8"><div class="form-group"><label for="'+ input + i +'">'+ trans + ' '+ i +'</label><input type="text" name="'+ input +'['+i+']" class="form-control"/></div></div></div>';
        $("#"+id).append(html);
    }


}

function remField(id){
    var num = $("#"+id).find('.row').length;
    i = num - 1;
    if(i <= 0){
        i = 0;
    }
    $("#"+id).find('.row:last-child').remove();
}


function addImageField(id,title,image){
    var num = $("#"+id).find('.row').length;

    i = num + 1;
    if(id != ''){
        var html = '<div class="form-group"><div class="row"><div class="col-sm-5"><input type="text" name="img_title[]" placeholder="'+title+'" class="form-control" /></div>' +
            '<div class="col-sm-4"><input type="text" name="images[]" placeholder="'+image+'" class="form-control" id="image'+i+'"/></div>' +
            '<div class="col-sm-2"><a class="btn btn-warning iframe-btn" href="/filemanager/dialog.php?type=1&descending=false&akey=baa950b9ec364447b677a1fa7cda724b&wm=true&field_id=image'+i+'">'+image+'</a></div><div class="col-sm-1 right"><a onClick="remImageField(this)" class="remove"><i class="fa fa-times"></i></a></div></div></div>';
        $("#"+id).append(html);
        $(document).ready(function () {
            $('.iframe-btn').fancybox({
                'width'		: 900,
                'height'	: 600,
                'type'		: 'iframe',
                'autoScale'    	: false
            });
        });
        return false;
    }


}

function remImageField(e){
    $(e).parent('div').parent('.row').parent('.form-group').remove();
}

/*
function setCat(e){
    var id = $(e).data('id');
    $('.article-sections ul li a').removeClass('active');
    $(e).addClass('active');
    $("#rubrics input[type='checkbox']").attr('checked',false);
    $("#rubrics input[value='"+id+"']").attr('checked',true);
    if(id > 0){
        $(".rubrics").hide();
    }else{
        $(".rubrics").show();
    }
}
*/

function selectInput(e,input){
    $('input[name='+input+']').val($(e).val());
}

if($("#rubrics input:checked").val() == 7){
    $('.article-sections ul li a').removeClass('active');
    $('.article-sections ul li:nth-child(2) a').addClass('active');
    $(".rubrics").hide();
}else if($("#rubrics input:checked").val() == 5){
    $('.article-sections ul li a').removeClass('active');
    $('.article-sections ul li:nth-child(3) a').addClass('active');
    $(".rubrics").hide();
}else if($("#rubrics input:checked").val() == 6){
    $('.article-sections ul li a').removeClass('active');
    $('.article-sections ul li:nth-child(4) a').addClass('active');
    $(".rubrics").hide();
}



$('.leftSide .block-list').css({position:'relative',height:($(document).height() + 68)+'px'});
$('input[name="active_top_slide"]').click(function(){
    if(this.checked){
        $('.leftSide').toggle('slide',{direction:'left'},500,function(){
            $(this).addClass('topSide').removeClass('leftSide');
            $('.rightSide').addClass('middleSide').removeClass('rightSide');
            $('.topSide .block-list').css({position:'relative',height:'auto'});
            $('.topSide').slideDown(500);
            $('.nav_bars > i').addClass('fa-arrow-circle-up').removeClass('fa-arrow-circle-left');
        });
        setCookie("nav_bar", 1, 360);
    }else{
        $('.topSide').slideUp(500,function(){
            $('.topSide .block-list').css({position:'relative',height:($(document).height() + 68)+'px'});
            $(this).addClass('leftSide').removeClass('topSide');
            $('.middleSide').addClass('rightSide').removeClass('middleSide');
            $('.leftSide').toggle('slide',{direction:'left'},500,function(){
                $('.nav_bars > i').addClass('fa-arrow-circle-left').removeClass('fa-arrow-circle-up');
            });
        });
        delCookie("nav_bar");
    }
});

$('.count_field').on('keyup',function(){
    var name = $(this).attr('name');
    $('.'+name+'_count').text($(this).val().length);
});

$('.title_count').text($('input[name="title"]').val().length);
$('.frontpage_title_count').text($('input[name="frontpage_title"]').val().length);
$('.social_media_title_count').text($('input[name="social_media_title"]').val().length);
$('.meta_key_count').text($('input[name="meta_key"]').val().length);


var removeImage = function(e){
    //$(e).parent('span').html("");
    $(".UploadImage0").html("");
    $("#ImageEditModal0 input").val("");
};

var removeImageMore = function(e){
    var id = $(e).parent('span').parent('div').parent('div').index();
    $(e).parent('span').parent('div').parent('div').remove();
    $(".image_gallery li:eq("+id+")").remove();
    ul.find('li:eq(0) img').attr('style','max-width:600px;max-height:360px;');
};

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

//$('.video_type').bind('input',function(){
//    if($(this).val() != ""){
//        $('input[name="type"]').val("video");
//    }else{
//        $('input[name="type"]').val("article");
//    }
//});


