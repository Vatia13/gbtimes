 <!-- NAVIGATION MENU -->
    <div class="main-menu">
        <div class="menu-place">
            <ul class="menu-list">
                <li class="active"><a href="/">Home</a></li>
                <li>
                    <a href="{{action('WelcomeController@showPage','china')}}">
                        All about China
                    </a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('china',false,6)) > 0)
                                    @foreach($article->getarticles('china',false,6) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Article</span>
                            <ul class="inside">
                                @if(count($article->getarticles('china','article',6)) > 0)
                                    @foreach($article->getarticles('china','article',6) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Photo Gallery</span>
                            <ul class="inside">
                                @if(count($article->getarticles('china','photogallery',6)) > 0)
                                    @foreach($article->getarticles('china','photogallery',6) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Video</span>
                            <ul class="inside">
                                @if(count($article->getarticles('china','video',6)) > 0)
                                    @foreach($article->getarticles('china','video',6) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Audio</span>
                        </li>
                        <li id="datetimepicker1">

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{action('WelcomeController@showTags','education')}}">Study Chinese</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,false,6,trans('front.education'))) > 0)
                                    @foreach($article->getarticles(false,false,6,trans('front.education')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Article</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'article',6,trans('front.education'))) > 0)
                                    @foreach($article->getarticles(false,'article',6,trans('front.education')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Photo Gallery</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'photogallery',6,trans('front.education'))) > 0)
                                    @foreach($article->getarticles(false,'photogallery',6,trans('front.education')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Video</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'video',6,trans('front.education'))) > 0)
                                    @foreach($article->getarticles(false,'video',6,trans('front.education')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{action('WelcomeController@showTags','travel')}}">All around China</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('travel',false,6)) > 0)
                                    @foreach($article->getarticles('travel',false,6) as $item)
                                        <li>
                                            <a href="#">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Article</span>
                            <ul class="inside">
                                @if(count($article->getarticles('travel','article',6)) > 0)
                                    @foreach($article->getarticles('travel','article',6) as $item)
                                        <li>
                                            <a href="#">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Photo Gallery</span>
                            <ul class="inside">
                                @if(count($article->getarticles('travel','photogallery',6)) > 0)
                                    @foreach($article->getarticles('travel','photogallery',6) as $item)
                                        <li>
                                            <a href="#">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Video</span>
                            <ul class="inside">
                                @if(count($article->getarticles('travel','video',6)) > 0)
                                    @foreach($article->getarticles('travel','video',6) as $item)
                                        <li>
                                            <a href="#">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{action('WelcomeController@showTags','health')}}">Chinese healthcare</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,false,6,trans('front.health'))) > 0)
                                    @foreach($article->getarticles(false,false,6,trans('front.health')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Article</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'article',6,trans('front.health'))) > 0)
                                    @foreach($article->getarticles(false,'article',6,trans('front.health')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Photo Gallery</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'photogallery',6,trans('front.health'))) > 0)
                                    @foreach($article->getarticles(false,'photogallery',6,trans('front.health')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Video</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'video',6,trans('front.health'))) > 0)
                                    @foreach($article->getarticles(false,'video',6,trans('front.health')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{action('WelcomeController@showTags','sport')}}">Easy China</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,false,6,trans('front.sport'))) > 0)
                                    @foreach($article->getarticles(false,false,6,trans('front.sport')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Article</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'article',6,trans('front.sport'))) > 0)
                                    @foreach($article->getarticles(false,'article',6,trans('front.sport')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Photo Gallery</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'photogallery',6,trans('front.sport'))) > 0)
                                    @foreach($article->getarticles(false,'photogallery',6,trans('front.sport')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li>
                            <span>Video</span>
                            <ul class="inside">
                                @if(count($article->getarticles(false,'video',6,trans('front.sport'))) > 0)
                                    @foreach($article->getarticles(false,'video',6,trans('front.sport')) as $item)
                                        <li>
                                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
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
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{action('WelcomeController@showPage','china-sensation')}}">China sensation</a></li>
                <li class="more">
                    <a href="#" class="arrow_down">More</a>
                    <ul>
                        <li><a href="/world">World</a></li>
                        <li><a href="/opinion">Oponion</a></li>
                        <li><a href="/business">Business</a></li>
                        <li><a href="/life">Life</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/chinema">Chinema</a></li>
                        <li><a href="/horoscope">Horoscope</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="social-icons">
                <li><a  class="facebook" href="https://www.facebook.com/gbtimes" target="_blank"></a></li>
                <li><a  class="twitter" href="https://twitter.com/gbtimesCom" target="_blank"></a></li>
                <li><a  class="google-plus" href="https://plus.google.com/+Gbtimes/posts" target="_blank"></a></li>
                {{--<li class="vk"><a href="#" target="_blank"></a></li>--}}
                {{--<li class="linked-in"><a href="#" target="_blank"></a></li>--}}
                {{--<li class="youtube"><a href="#" target="_blank"></a></li>--}}
            </ul>
        </div>
        <div class="fix"></div>
    </div>