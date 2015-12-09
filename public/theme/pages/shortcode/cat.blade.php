<div class="shortcode">

    <div class="pick_of_the_day">
        <div class="image">
            <img src="{{checkImage($items->getPickOfDay($slug)->img)}}" height="100%"/>
        </div>
        <div class="info">
            <div class="title"><h4>{{recordTitle($items->getPickOfDay($slug)->frontpage_title,$items->getPickOfDay($slug)->title)}}</h4></div>
            <div class="details">{{recordDesc($items->getPickOfDay($slug)->body,$items->getPickOfDay($slug)->head,150)}}</div>
            <div class="time-author">
                <span>{{$items->getPickOfDay($slug)->author}}</span> <span>{{date('m.d.Y',strtotime($items->getPickOfDay($slug)->published_at))}}</span>
            </div>
        </div>
    </div>
    <div class="fix"></div>

    <ul>
        @if(count($items->getarticles($slug,false,6)) > 0)
            @foreach($items->getarticles($slug,false,6) as $key=>$item)
                @if($key < 4)
                    <li>
                        <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                            <div class="image">
                                <img src="{{checkImage($item->img)}}"/>
                            </div>
                            <div class="desc">
                                <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                                            <span>
                                                {{recordDesc($item->head,$item->body,20)}}
                                            </span>
                                <br>
                            </div>
                            <div class="time-author">
                                <span>{{$item->author}}</span> <span>{{date('m.d.Y',strtotime($item->published_at))}}</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>