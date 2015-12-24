@if(count($items->getNewsFromPartners($slug,$type,4)) > 0)
    <div id="partner_news">
        <h4>News from our partners</h4>
        <ul>
            @foreach($items->getNewsFromPartners($slug,$type,4) as $item)
                @include('theme.pages.inc.list')
            @endforeach
        </ul>
        @if(count($items->getNewsFromPartners($slug,$type,4)) > 3)
            <div class="show_more">
                <div class="gifLoader"></div>
                <button onClick="loadItems('{{$slug}}','{{$type}}','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
            </div>
        @endif
    </div>
@endif