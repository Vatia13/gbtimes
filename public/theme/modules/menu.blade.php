 <!-- NAVIGATION MENU -->
    <div class="main-menu">
        <div class="menu-place">
            <ul class="menu-list">
                <li @if(Request::path() == '/')class="active"@endif><a href="/">Home</a></li>
                <li @if(Request::path() == 'china')class="active"@endif>
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
                        <li id="datetimepicker1" class="gbtimesDatePicker" data-slug="china">

                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'study-chinese')class="active"@endif>
                    <a href="{{action('WelcomeController@showPage','study-chinese')}}">Study Chinese</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('study-chinese',false,6)) > 0)
                                    @foreach($article->getarticles('study-chinese',false,6) as $item)
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
                                @if(count($article->getarticles('study-chinese','article',6)) > 0)
                                @foreach($article->getarticles('study-chinese','article',6) as $item)
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
                                @if(count($article->getarticles('study-chinese','photogallery',6)) > 0)
                                    @foreach($article->getarticles('study-chinese','photogallery',6) as $item)
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
                                @if(count($article->getarticles('study-chinese','video',6)) > 0)
                                    @foreach($article->getarticles('study-chinese','video',6) as $item)
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
                            <ul class="inside">
                                @if(count($article->getarticles('study-chinese','audio',6)) > 0)
                                    @foreach($article->getarticles('study-chinese','audio',6) as $item)
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
                            <span>Study Online</span>
                            <ul class="inside">
                                @if(count($article->getarticles('study-chinese','study-online',6)) > 0)
                                    @foreach($article->getarticles('study-chinese','study-online',6) as $item)
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
                        <li id="datetimepicker2" class="gbtimesDatePicker"  data-slug="study-chinese">

                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'travel')class="active"@endif><a href="{{action('WelcomeController@showPage','travel')}}">All around China</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('travel',false,6)) > 0)
                                    @foreach($article->getarticles('travel',false,6) as $item)
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
                                @if(count($article->getarticles('travel','article',6)) > 0)
                                    @foreach($article->getarticles('travel','article',6) as $item)
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
                                @if(count($article->getarticles('travel','photogallery',6)) > 0)
                                    @foreach($article->getarticles('travel','photogallery',6) as $item)
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
                                @if(count($article->getarticles('travel','video',6)) > 0)
                                    @foreach($article->getarticles('travel','video',6) as $item)
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
                            <ul class="inside">
                                @if(count($article->getarticles('travel','audio',6)) > 0)
                                    @foreach($article->getarticles('travel','audio',6) as $item)
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
                        <li id="datetimepicker3" class="gbtimesDatePicker"  data-slug="travel">

                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'chinese-healthcare')class="active"@endif><a href="{{action('WelcomeController@showPage','chinese-healthcare')}}">Chinese healthcare</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('chinese-healthcare',false,6)) > 0)
                                    @foreach($article->getarticles('chinese-healthcare',false,6) as $item)
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
                                @if(count($article->getarticles('chinese-healthcare','article',6)) > 0)
                                    @foreach($article->getarticles('chinese-healthcare','article',6) as $item)
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
                                @if(count($article->getarticles('chinese-healthcare','photogallery',6)) > 0)
                                    @foreach($article->getarticles('chinese-healthcare','photogallery',6) as $item)
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
                                @if(count($article->getarticles('chinese-healthcare','video',6)) > 0)
                                    @foreach($article->getarticles('chinese-healthcare','video',6) as $item)
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
                            <ul class="inside">
                                @if(count($article->getarticles('chinese-healthcare','audio',6)) > 0)
                                    @foreach($article->getarticles('chinese-healthcare','audio',6) as $item)
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
                        <li id="datetimepicker4" class="gbtimesDatePicker"  data-slug="chinese-healthcare">

                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'easy-china')class="active"@endif><a href="{{action('WelcomeController@showPage','easy-china')}}">Easy China</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('easy-china',false,6)) > 0)
                                    @foreach($article->getarticles('easy-china',false,6) as $item)
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
                                @if(count($article->getarticles('easy-china','article',6)) > 0)
                                    @foreach($article->getarticles('easy-china','article',6) as $item)
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
                                @if(count($article->getarticles('easy-china','photogallery',6)) > 0)
                                    @foreach($article->getarticles('easy-china','photogallery',6) as $item)
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
                                @if(count($article->getarticles('easy-china','video',6)) > 0)
                                    @foreach($article->getarticles('easy-china','video',6) as $item)
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
                            <ul class="inside">
                                @if(count($article->getarticles('easy-china','audio',6)) > 0)
                                    @foreach($article->getarticles('easy-china','audio',6) as $item)
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
                        <li id="datetimepicker5" class="gbtimesDatePicker"  data-slug="easy-china">

                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'china-sensation')class="active"@endif>
                    <a href="{{action('WelcomeController@showPage','china-sensation')}}">China sensation</a>
                    <ul class="outside">
                        <li>
                            <span>All Results</span>
                            <ul class="inside">
                                @if(count($article->getarticles('china-sensation',false,6)) > 0)
                                    @foreach($article->getarticles('china-sensation',false,6) as $item)
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
                                @if(count($article->getarticles('china-sensation','article',6)) > 0)
                                    @foreach($article->getarticles('china-sensation','article',6) as $item)
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
                                @if(count($article->getarticles('china-sensation','photogallery',6)) > 0)
                                    @foreach($article->getarticles('china-sensation','photogallery',6) as $item)
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
                                @if(count($article->getarticles('china-sensation','video',6)) > 0)
                                    @foreach($article->getarticles('china-sensation','video',6) as $item)
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
                            <ul class="inside">
                                @if(count($article->getarticles('china-sensation','audio',6)) > 0)
                                    @foreach($article->getarticles('china-sensation','audio',6) as $item)
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
                        <li id="datetimepicker6" class="gbtimesDatePicker"  data-slug="china-sensation">

                        </li>
                    </ul>
                </li>
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