<li>
    <a href="{{action('WelcomeController@showArticle',checkItem($it->translate_slug,$it->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($it->translate_slug,$it->slug))}}','{{checkItem($it->translate_slug,$it->slug)}}')">
        <div class="image">
            <img src="{{checkImage($it->img)}}"/>
        </div>
        <div class="desc">
            <h4>{{recordTitle($it->frontpage_title,$it->title)}}</h4>
             <span>
               {{recordDesc($it->head,$it->body,20)}}
             </span>
            <br>
        </div>
        <div class="time-author">
            <span>{{$it->author}}</span> <span>{{date('m.d.Y',strtotime($it->published_at))}}</span>
        </div>
    </a>
</li>