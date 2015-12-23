<div class="shortcode">
    <div class="cat_tabs">
        <div class="tabs">
            <div class="active">All Results</div>
            <div>Article</div>
            <div>Photo Gallery</div>
            <div>Video</div>
        </div>
        <div class="fix"></div>
        @if($items->getPickOfDay(false))
            @include('theme.pages.inc.pick')
        @endif
        <div class="fix"></div>

        <div class="tab_content">
            <div class="tab active">
                @if(count($items->getarticles(false,false,6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,false,6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,false,4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,false,4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'article',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'article',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','article','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'article',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'article',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','article','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'photogallery',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'photogallery',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','photogallery','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'photogallery',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'photogallery',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','photogallery','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'video',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'video',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','video','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'video',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'video',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('','video','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>