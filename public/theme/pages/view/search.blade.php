@extends('app')

@section('content')
    <div class="read">
        <div class="shortcode">
            <h4>{{Input::get('s')}} : ({{$count}}) results found.</h4>
            <div id="gbtimes_news">
                @if(count($items) > 0)
                    <ul>
                        @foreach($items as $key=>$item)
                            <li>
                                <div class="image">
                                    <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">
                                        <img src="{{checkImage($item->img)}}"/>
                                    </a>
                                </div>
                                <div class="desc">
                                    <h4>
                                        <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordTitle($item->frontpage_title,$item->title)}}</a>
                                    </h4>
                                            <span>
                                                <a href="{{action('WelcomeController@showArticle',checkItem($item->translate_slug,$item->slug))}}">{{recordDesc($item->head,$item->body,20)}}</a>
                                            </span>
                                    <br>
                                    <div class="time-author">
                                        <span><a href="{{action('WelcomeController@newsAuthor',$item->author)}}">{{$item->author}}</a></span> <span>{{date('m.d.Y',strtotime($item->published_at))}}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="show_more">
                    <div class="gifLoader"></div>
                    <button onClick="loadItems('','','{{Input::get('s')}}',8,this)" data-route="{{action('WelcomeController@loadSearchArticles')}}" data-token="{{csrf_token()}}">Show more</button>
                </div>
            </div>
        </div>
    </div>
@stop