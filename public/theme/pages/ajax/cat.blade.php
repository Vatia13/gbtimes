@if(count($items) > 0)
    @foreach($items as $key=>$item)
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