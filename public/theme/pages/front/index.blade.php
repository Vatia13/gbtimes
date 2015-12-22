<!-- Template Name: Home Page -->
@extends('app')

@section('content')
        <!-- SLIDER -->
<div class="slider">
    <div class="slider-place">
        <div class="active-item"  id="slider">
            <div class="slide-image">
                <ul>
                    @if(count($slider) > 0)
                        @foreach($slider as $key=>$item)
                            <li @if($key == 0)class="active"@endif>
                                <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                    <div class="slide-title">
                                        {{recordTitle($item->frontpage_title,$item->title)}}
                                    </div>
                                    <img src="{{checkImage($item->img)}}"/>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <a class="next"></a>
            <a class="previous"></a>
            <div class="slider-dots">
                <ul>
                    @if(count($slider) > 0)
                        @foreach($slider as $item)
                            <li><a href="javascript:void('')" alt="{{$item->img}}"></a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="slide-items">
            <div><a href="{{action('WelcomeController@showPage','news-from-china')}}">Latest news</a></div>
            @if(count($lastRecords) > 0)
                <ul>
                    @foreach($lastRecords as $item)
                        <li>
                                <div class="slide-image-small">
                                    <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                        <img src="{{checkImage($item->img)}}"/>
                                    </a>
                                </div>

                            <div class="slide-text-small">
                                <h4><a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordTitle($item->frontpage_title,$item->title)}}</a></h4>
                                <div>
                                    <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordDesc($item->head,$item->meta_desc)}}</a>
                                </div>
                                <br>
                                <div class="author-date">
                                    <span><a href="{{action('WelcomeController@newsAuthor',$item->author)}}">{{$item->author}}</a></span><span>{{date('m.d.Y',strtotime($item->published_at))}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
<div class="fix"></div>
<!-- 3 ITEMS HORIZONTAL -->
<div class="horizontal-items-3">
    <div class="horizontal-items-3-place">
        <h4><a href="{{action('WelcomeController@showPage','china')}}">All about China</a></h4>
        <ul>
            @if(count($article->getarticles('china',false,6)) > 0)
                @foreach($article->getarticles('china',false,6) as $key=>$item)
                    @if($key < 3)
                    <li>
                        <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                            <div class="horizontal-items-3-image"><img src="{{checkImage($item->img)}}"/></div>
                            <div class="horizontal-items-3-title">
                                <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                        <span>
                           {{recordDesc($item->head,$item->body)}}
                        </span>
                            </div>
                        </a>
                    </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>

<!-- 3 ITEMS HORIZONTAL -->
<div class="horizontal-items-3">
    <div class="horizontal-items-3-place">
        <h4><a href="{{action('WelcomeController@showPage','travel')}}">All around China</a></h4>
        <ul>
            @if(count($article->getarticles('travel',false,6)) > 0)
                @foreach($article->getarticles('travel',false,6) as $key=>$item)
                    @if($key < 3)
                        <li>
                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                <div class="horizontal-items-3-image"><img src="{{checkImage($item->img)}}"/></div>
                                <div class="horizontal-items-3-title">
                                    <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                        <span>
                           {{recordDesc($item->head,$item->body)}}
                        </span>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>


<!-- 4 ITEMS HORIZONTAL -->
<div class="horizontal-items-4">
    <div class="horizontal-items-4-place">
        <ul>
            <li>
                <h4><a href="{{action('WelcomeController@showPage','education')}}">Study Chinese</a></h4>
                @if(count($article->getarticles(false,false,6,trans('front.education'))) > 0)
                    @foreach($article->getarticles(false,false,6,trans('front.education')) as $key=>$item)
                        @if($key < 1)
                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                <div class="horizontal-items-4-image"><img src="{{checkImage($item->img)}}"/></div>
                                <div class="horizontal-items-4-title">
                                    <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                        <span>
                            {{recordDesc($item->head,$item->body)}}
                        </span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endif
            </li>
            <li>
                <h4><a href="{{action('WelcomeController@showPage','healthcare')}}">Chinese healthcare</a></h4>
                @if(count($article->getarticles(false,false,6,trans('front.health'))) > 0)
                    @foreach($article->getarticles(false,false,6,trans('front.health')) as $key=>$item)
                        @if($key < 1)
                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                <div class="horizontal-items-4-image"><img src="{{checkImage($item->img)}}"/></div>
                                <div class="horizontal-items-4-title">
                                    <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                        <span>
                            {{recordDesc($item->head,$item->body)}}
                        </span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endif
            </li>
            <li>
                <h4><a href="{{action('WelcomeController@showPage','china-sport')}}">Easy China</a></h4>
                @if(count($article->getarticles(false,false,6,trans('front.sport'))) > 0)
                    @foreach($article->getarticles(false,false,6,trans('front.sport')) as $key=>$item)
                        @if($key < 1)
                            <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                <div class="horizontal-items-4-image"><img src="{{checkImage($item->img)}}"/></div>
                                <div class="horizontal-items-4-title">
                                    <h4>{{recordTitle($item->frontpage_title,$item->title)}}</h4>
                        <span>
                            {{recordDesc($item->head,$item->body)}}
                        </span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endif
            </li>
            <li>
                <h4><a href="{{action('WelcomeController@showPage','china-sensation')}}">China sensation</a></h4>
                <a href="#">
                    <div class="horizontal-items-4-image"><img src="{{asset('theme/images/6.png')}}"/></div>
                    <div class="horizontal-items-4-title">
                        <h4>Test Title 2</h4>
                        <span>
                            is nisl reformidans ei. Harum possit platonem nam ad, pri impedit voluptatibus ad, dico sapientem ne pri. Per ea diam offendit, ridens prompta moderatius mel cu.
                        </span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- BANNER 1150px -->
<div class="banner">
    <div class="banner-place">
        <span>ADS</span>
    </div>
</div>

<!-- PARTNERS -->
<div class="partners">
    <div class="partners-place">
        <h4><a href="#">Our partners</a></h4>
        <div>
            <ul>
                @if(count($article->getParents()) > 0)
                    @foreach($article->getParents() as $item)
                        <li>
                            <a href="#">
                                <img src="{{$item->img}}" title="1">
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="fix"></div>
@stop