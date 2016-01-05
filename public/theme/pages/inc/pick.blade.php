<div class="pick_of_the_day">
    <div class="image">
        <a href="{{action('WelcomeController@showArticle',checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug))}}','{{checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug)}}')">
            <img src="{{checkImage($items->getPickOfDay($slug,$type)->img)}}" width="100%"/>
        </a>
    </div>
    <div class="info">
        <div class="title"><h4>{{recordTitle($items->getPickOfDay($slug,$type)->frontpage_title,$items->getPickOfDay($slug,$type)->title)}}</h4></div>
        <div class="details">
            <a href="{{action('WelcomeController@showArticle',checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug))}}','{{checkItem($items->getPickOfDay($slug,$type)->translate_slug,$items->getPickOfDay($slug,$type)->slug)}}')">{{ str_replace('&nbsp;','',recordDesc('',$items->getPickOfDay($slug,$type)->body,1020,recordTitle($items->getPickOfDay($slug,$type)->frontpage_title,$items->getPickOfDay($slug,$type)->title),170)) }}</a>
        </div>
        <div class="time-author">
            @if($items->getPickOfDay($slug,$type)->author)
                <span><a href="{{action('WelcomeController@newsAuthor',$items->getPickOfDay($slug,$type)->author)}}" onClick="return ajaxRoute('{{action('WelcomeController@newsAuthor',$items->getPickOfDay($slug,$type)->author)}}','{{$items->getPickOfDay($slug,$type)->author}}')">{{$items->getPickOfDay($slug,$type)->author}}</a></span>
            @endif
            <span>{{date('m.d.Y',strtotime($items->getPickOfDay($slug,$type)->published_at))}}</span>
        </div>
    </div>
</div>