@extends('app')

@section('content')
    <div class="read">
        <div class="shortcode">
            <h4>{{$date}} : ({{$count}}) results found.</h4>
            <div id="gbtimes_news">
                @if(count($items) > 0)
                    <ul>
                        @foreach($items as $key=>$item)
                            @include('theme.pages.inc.list')
                        @endforeach
                    </ul>
                @endif
                    @if(count($items) > get_setting('pagination_num'))
                        <div class="show_more">
                            <div class="gifLoader"></div>
                            <button onClick="loadItems('{{$cat}}','','{{$date}}',8,this)" data-route="{{action('WelcomeController@loadNewsDate')}}" data-token="{{csrf_token()}}">Show more</button>
                        </div>
                    @endif
            </div>
        </div>
    </div>
@stop