<li>
    <div class="image">
        <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
            <img src="{{checkImage($item->img)}}"/>
        </a>
    </div>
    <div class="desc">
        <h4>
            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordTitle($item->frontpage_title,$item->title)}}</a>
        </h4>
        <span>
            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordDesc($item->head,$item->body,122,recordTitle($item->frontpage_title,$item->title),60)}}...</a>
        </span>
        <br>
        <div class="time-author">
            @if($item->author)<span><a href="{{action('WelcomeController@newsAuthor',$item->author)}}">{{$item->author}}</a></span>@endif<span>{{date('m.d.Y',strtotime($item->published_at))}}</span>
        </div>
    </div>
</li>