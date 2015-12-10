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
                $(e).parent('div').find('.gifLoader').html('<img src="theme/images/140x40.GIF"/>').show();
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