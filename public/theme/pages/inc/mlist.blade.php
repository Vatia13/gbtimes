<li>
    <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}" onClick="return ajaxRoute('{{action("WelcomeController@showArticle",checkItem($item->translate_slug,$item->slug))}}','{{checkItem($item->translate_slug,$item->slug)}}')">
        <div class="inside-image">
            <img src="{{checkImage($item->img)}}"/>
        </div>
        <div class="inside-desc">
            <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
            <span>
                {{recordDesc($item->head,$item->body)}}
            </span>
        </div>
    </a>
</li>