
<div class="shortcode">
    <div class="cat_tabs">
        <div class="tabs">
            <div class="active">All Results</div>
            <div>Article</div>
            <div>Photo Gallery</div>
            <div>Video</div>
        </div>
        <div class="fix"></div>
        @if($items->getPickOfDay($slug))
            @include('theme.pages.inc.pick')
        @endif
        <div class="fix"></div>

        <div class="tab_content">
            <div class="tab active">
                @if(count($items->getarticles(false,false,6,$slug)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,false,6,$slug) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,false,4,$slug)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,false,4,$slug) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles('','article',6,$slug)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles('','article',6,$slug) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','article','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'article',4,$slug)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'article',4,$slug) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','article','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'photogallery',6,$slug)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'photogallery',6,$slug) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','photogallery','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'photogallery',4,$slug)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'photogallery',4,$slug) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','photogallery','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'video',6,$slug)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'video',6,$slug) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','video','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'video',4,$slug)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'video',4,$slug) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','video','{{$slug}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
