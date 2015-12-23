<div class="pick_of_the_day">
    <div class="image">
        <a href="{{action('WelcomeController@showArticle',checkItem($items->getPickOfDay($slug)->translate_slug,$items->getPickOfDay($slug)->slug))}}">
            <img src="{{checkImage($items->getPickOfDay($slug)->img)}}" width="100%"/>
        </a>
    </div>
    <div class="info">
        <div class="title"><h4>{{recordTitle($items->getPickOfDay($slug)->frontpage_title,$items->getPickOfDay($slug)->title)}}</h4></div>
        <div class="details">
            <a href="{{action('WelcomeController@showArticle',checkItem($items->getPickOfDay($slug)->translate_slug,$items->getPickOfDay($slug)->slug))}}">{!! recordDesc('',$items->getPickOfDay($slug)->body,1000,recordTitle($items->getPickOfDay($slug)->frontpage_title,$items->getPickOfDay($slug)->title),170) !!}...</a>
        </div>
        <div class="time-author">
            @if($items->getPickOfDay($slug)->author)
                <span><a href="{{action('WelcomeController@newsAuthor',$items->getPickOfDay($slug)->author)}}">{{$items->getPickOfDay($slug)->author}}</a></span>
            @endif
            <span>{{date('m.d.Y',strtotime($items->getPickOfDay($slug)->published_at))}}</span>
        </div>
    </div>
</div>