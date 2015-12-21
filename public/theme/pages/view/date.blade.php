@extends('app')

@section('content')
    <div class="read">
        <div class="shortcode">
            <h4>{{$date}} : ({{$count}}) results found.</h4>
            <div id="gbtimes_news">
                @if(count($items) > 0)
                    <ul>
                        @foreach($items as $key=>$item)
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
                @endif
                <div class="show_more">
                    <div class="gifLoader"></div>
                    <button onClick="loadItems('{{$cat}}','','{{$date}}',8,this)" data-route="{{action('WelcomeController@loadNewsDate')}}" data-token="{{csrf_token()}}">Show more</button>
                </div>
            </div>
        </div>
    </div>
@stop