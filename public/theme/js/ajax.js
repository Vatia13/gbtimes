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


function ajaxRoute(url,hash,f){
    //console.log(url + ' - ' + window.location.href);
    if(url == window.location.href && !f || window.location.hash != ""){
       return false;
    }
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
                //var stateObj = { foo: hash};
                if(!f){
                    history.pushState(1, url, url);
                }
                window.onpopstate = function (evt) {
                    /** event.state contains the stored JS object, so we can pass it back **/
                    ajaxRoute(window.location.href,window.location.pathname,1);
                };
                $(window).scrollTop(0);
                $("#load_screen div").css('width','100%');
                $("#load_screen").fadeOut(100);
                $("#load_screen div").animate({width:'0%'},10);
            }
        });
    return false;
}


function ajaxCalendar(url,hash,f){
    if(url == window.location.href && !f || window.location.hash != ""){
        return false;
    }
    $.ajax({
        url:url,
        type:'GET',
        data:{_method:'get',_token:$("#token").text(),date:hash},
        beforeSend:function(){
            var totalTime = new Date().getMilliseconds();
            $("#load_screen").show();
            $("#load_screen div").animate({width:'100%'},(totalTime * 3));
        },
        success:function(response){
            $('<div>',{html:response}).find('.wrapper').each(function(){
                $(".wrapper").html($(this).html());
            });

            if(!f){
                history.pushState(1, url, url);
            }
            window.onpopstate = function (evt) {
                /** event.state contains the stored JS object, so we can pass it back **/
                ajaxCalendar(window.location.href,window.location.pathname,1);
            };

            $(window).scrollTop(0);
            $("#load_screen div").css('width','100%');
            $("#load_screen").fadeOut(100);
            $("#load_screen div").animate({width:'0%'},10);
        }
    });
    return false;
}


function formRoute(url,param,e,f){
    if(url == window.location.href && !f || window.location.hash != ""){
        return false;
    }
    var hash = $('input[name="'+param+'"]',e).val();
    $.ajax({
        url:url + '?'+param+'='+hash,
        type:'GET',
        data:{_method:'get',_token:$("#token").text()},
        beforeSend:function(){
            var totalTime = new Date().getMilliseconds();
            $("#load_screen").show();
            $("#load_screen div").animate({width:'100%'},(totalTime * 3));
        },
        success:function(response){
            $('<div>',{html:response}).find('.wrapper').each(function(){
                $(".wrapper").html($(this).html());
            });

            if(!f){
                history.pushState(1, url, url + '?'+param+'='+hash);
            }
            window.onpopstate = function (evt) {
                /** event.state contains the stored JS object, so we can pass it back **/
                formRoute(window.location.href,window.location.pathname,1);
            };

            $(window).scrollTop(0);
            $("#load_screen div").css('width','100%');
            $("#load_screen").fadeOut(100);
            $("#load_screen div").animate({width:'0%'},10);
        }
    });
    return false;
}



