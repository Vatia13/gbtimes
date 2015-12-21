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

        @if($items->getPickOfDay($slug))
            <div class="pick_of_the_day">
                <a href="{{action('WelcomeController@showArticle',checkItem($items->getPickOfDay($slug)->translate_slug,$items->getPickOfDay($slug)->slug))}}">
                    <div class="image">
                        <img src="{{checkImage($items->getPickOfDay($slug)->img)}}" height="100%"/>
                    </div>
                    <div class="info">
                        <div class="title"><h4>{{recordTitle($items->getPickOfDay($slug)->frontpage_title,$items->getPickOfDay($slug)->title)}}</h4></div>
                        <div class="details">{{recordDesc($items->getPickOfDay($slug)->body,$items->getPickOfDay($slug)->head,100)}}</div>
                        <div class="time-author">
                            <span>{{$items->getPickOfDay($slug)->author}}</span> <span>{{date('m.d.Y',strtotime($items->getPickOfDay($slug)->published_at))}}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        <div class="fix"></div>

        <div class="tab_content">
            <div class="tab active">
                @if(count($items->getarticles($slug,false,6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,false,6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,false,2)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,false,2) as $item)
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
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'article',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'article',6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','article','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'article',2)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'article',2) as $item)
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
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','article','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'photogallery',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'photogallery',6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','photogallery','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'photogallery',2)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'photogallery',2) as $item)
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
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','photogallery','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'video',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'video',6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','video','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'video',2)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'video',2) as $item)
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
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','video','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'audio',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'audio',6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','audio','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners($slug,'audio',2)) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners($slug,'audio',2) as $item)
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
                            @endforeach
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','audio','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles($slug,'study-online',6)) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles($slug,'study-online',6) as $key=>$item)
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
                        </ul>
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$slug}}','study-online','',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(Request::path() == 'study-chinese')
                    @if(count($items->getNewsFromPartners($slug,'study-online',2)) > 0)
                        <div id="partner_news">
                            <h4>News from our partners</h4>
                            <ul>
                                @foreach($items->getNewsFromPartners($slug,'study-online',2) as $item)
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
                                @endforeach
                            </ul>
                            <div class="show_more">
                                <div class="gifLoader"></div>
                                <button onClick="loadItems('{{$slug}}','study-online','',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>