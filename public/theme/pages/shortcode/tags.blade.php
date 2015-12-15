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
                @if(count($items->getarticles(false,false,6,trans('front.'.$slug))) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,false,6,trans('front.'.$slug)) as $key=>$item)
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
                            <button onClick="loadItems('','','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,false,2,trans('front.'.$slug))) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,false,2,trans('front.'.$slug)) as $item)
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
                            <button onClick="loadItems('','','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles('','article',6,trans('front.'.$slug))) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles('','article',6,trans('front.'.$slug)) as $key=>$item)
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
                            <button onClick="loadItems('','article','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'article',2,trans('front.'.$slug))) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'article',2,trans('front.'.$slug)) as $item)
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
                            <button onClick="loadItems('','article','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'photogallery',6,trans('front.'.$slug))) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'photogallery',6,trans('front.'.$slug)) as $key=>$item)
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
                            <button onClick="loadItems('','photogallery','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'photogallery',2,trans('front.'.$slug))) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'photogallery',2,trans('front.'.$slug)) as $item)
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
                            <button onClick="loadItems('','photogallery','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab">
                @if(count($items->getarticles(false,'video',6,trans('front.'.$slug))) > 0)
                    <div id="gbtimes_news">
                        <h4>Gbtimes News</h4>
                        <ul>
                            @foreach($items->getarticles(false,'video',6,trans('front.'.$slug)) as $key=>$item)
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
                            <button onClick="loadItems('','video','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
                @if(count($items->getNewsFromPartners(false,'video',2,trans('front.'.$slug))) > 0)
                    <div id="partner_news">
                        <h4>News from our partners</h4>
                        <ul>
                            @foreach($items->getNewsFromPartners(false,'video',2,trans('front.'.$slug)) as $item)
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
                            <button onClick="loadItems('','video','{{trans('front.'.$slug)}}',4,this)" data-route="{{action('WelcomeController@loadPartnerArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>