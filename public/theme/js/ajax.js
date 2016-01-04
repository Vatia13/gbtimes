/**
 * Created by Vati Child on 10/7/2015.
 */


function loadItems(cat,type,tag,num,e){
    var e = $(e);
    var start = $(e).parent('div').parent('div').find('ul li').length;
    var token = $(e).data('token');
    var route = $(e).data('route');
    if(token && route){
        $.ajax({
            url:route,
            type:'POST',
            data:{_method:'POST',_token:token,cat:cat,type:type,tag:tag,num:num,start:start},
            beforeSend:function(){
                $(e).attr('disabled',true);
                $(e).parent('div').find('.gifLoader').html('<img src="/theme/images/140x40.GIF"/>').show();
            },
            success:function(response){
                if(response != 0){
                    $(e).parent('div').parent('div').find('ul').append(response);
                }else{
                    $(e).parent('div').find('.gifLoader').remove();
                    $(e).remove();
                }
            },
            complete:function(){
                $(e).attr('disabled',false);
                $(e).parent('div').find('.gifLoader').hide();
            }
        });
    }

}


function ajaxRoute(url,hash){
    $.ajax({
        url:url,
        type:'GET',
        data:{_method:'get',_token:$("#token").text(),slug:hash},
        beforeSend:function(){
            var totalTime = new Date().getMilliseconds();
            $("#load_screen").show();
            $("#load_screen div").animate({width:'100%'},(totalTime * 3));
        },
        success:function(response){
            $('<div>',{html:response}).find('.wrapper').each(function(){
                $(".wrapper").html($(this).html());
            });
            //console.log(html);
            //$(".wrapper").html(response);
            history.pushState(1, url, hash);
            $(window).scrollTop(0);
            $("#load_screen div").css('width','100%');
            $("#load_screen").fadeOut(100);
            $("#load_screen div").animate({width:'0%'},10);
        }
    });
    return false;
}
