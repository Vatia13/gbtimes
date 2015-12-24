@if(count($items->getarticles($slug,$type,6)) > 0)
    <div id="gbtimes_news">
        <h4>Gbtimes News</h4>
        <ul>
            @foreach($items->getarticles($slug,$type,6) as $key=>$item)
                @if($key < 4)
                    @include('theme.pages.inc.list')
                @endif
            @endforeach
        </ul>
        @if(count($items->getarticles($slug,$type,6)) > 5)
            <div class="show_more">
                <div class="gifLoader"></div>
                <button onClick="loadItems('{{$slug}}','{{$type}}','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
            </div>
        @endif
    </div>
@endif