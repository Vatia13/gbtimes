@if(count($items) > 0)
    @foreach($items as $key=>$item)
        <li>
            <div class="image">
                <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($item->translate_slug,$item->slug))}}','{{checkItem($item->translate_slug,$item->slug)}}')">
                    <img src="{{checkImage($item->img)}}"/>
                </a>
            </div>
            <div class="desc">
                <h4>
                    <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}"onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($item->translate_slug,$item->slug))}}','{{checkItem($item->translate_slug,$item->slug)}}')">{{recordTitle($item->frontpage_title,$item->title)}}</a>
                </h4>
                                            <span>
                                                <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($item->translate_slug,$item->slug))}}','{{checkItem($item->translate_slug,$item->slug)}}')">{{recordDesc($item->head,$item->body,20)}}</a>
                                            </span>
                <br>
                <div class="time-author">
                    <span><a href="{{action('WelcomeController@newsAuthor',$item->author)}}" onClick="return ajaxRoute('{{action("WelcomeController@newsAuthor",$item->author)}}','{{$item->author}}')">{{$item->author}}</a></span> <span>{{date('m.d.Y',strtotime($item->published_at))}}</span>
                </div>
            </div>
        </li>
    @endforeach
@endif