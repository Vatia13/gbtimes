<div class="shortcode">
    <div class="cat_tabs">
        <div class="tabs">
            <div class="active">All Results</div>
            <div>Article</div>
            <div>Photo Gallery</div>
            <div>Video</div>
            <div>Audio</div>
            @if(Request::path() == 'study-chinese')
                <div>Study Online</div>
            @endif
        </div>

        <div class="fix"></div>

        <div class="tab_content">
            <div class="tab active">
                @if($items->getPickOfDay($slug,false))
                    @include('theme.pages.inc.pick',['type'=>false])
                @endif
                <div class="fix"></div>
                @if(count($items->getarticles($slug,false,6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,false,6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,false,6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,false,4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,false,4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        @if(count($items->getNewsFromPartners($slug,false,4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'article'))
                    @include('theme.pages.inc.pick',['type'=>'article'])
                @endif
                    <div class="fix"></div>
                @if(count($items->getarticles($slug,'article',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'article',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,'article',6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','article','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'article',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'article',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        @if(count($items->getNewsFromPartners($slug,'article',4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','article','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'photogallery'))
                    @include('theme.pages.inc.pick',['type'=>'photogallery'])
                @endif
                <div class="fix"></div>
                @if(count($items->getarticles($slug,'photogallery',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'photogallery',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,'photogallery',6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','photogallery','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'photogallery',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'photogallery',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        @if(count($items->getNewsFromPartners($slug,'photogallery',4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','photogallery','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'video'))
                    @include('theme.pages.inc.pick',['type'=>'video'])
                @endif
                <div class="fix"></div>
                @if(count($items->getarticles($slug,'video',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'video',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,'video',6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','video','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'video',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'video',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        @if(count($items->getNewsFromPartners($slug,'video',4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','video','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'audio'))
                    @include('theme.pages.inc.pick',['type'=>'audio'])
                @endif
                <div class="fix"></div>
                @if(count($items->getarticles($slug,'audio',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'audio',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,'audio',6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','audio','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'audio',4)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'audio',4) as $item)
                                @include('theme.pages.inc.list')
                            @endforeach
                        </ul>
                        @if(count($items->getNewsFromPartners($slug,'audio',4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','audio','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'study-online'))
                    @include('theme.pages.inc.pick',['type'=>'study-online'])
                @endif
                <div class="fix"></div>
                @if(count($items->getarticles($slug,'study-online',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'study-online',6) as $key=>$item)
                                @if($key < 4)
                                    @include('theme.pages.inc.list')
                                @endif
                            @endforeach
                        </ul>
                        @if(count($items->getarticles($slug,'study-online',6)) > 5)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','study-online','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        @endif
                    </div>
                @endif
                @if(Request::path() == 'study-chinese')
                    @if(count($items->getNewsFromPartners($slug,'study-online',4)) > 0)
                        <div id="partner_news">
                            <h4>News from our partners</h4>
                            <ul>
                                @foreach($items->getNewsFromPartners($slug,'study-online',4) as $item)
                                    @include('theme.pages.inc.list')
                                @endforeach
                            </ul>
                            @if(count($items->getNewsFromPartners($slug,'study-online',4)) > 3)
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','study-online','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>