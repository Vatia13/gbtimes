@extends('app')

@section('content')
    <div class="read">
        <div class="shortcode">
            <h4>Similar : ({{$count}}) results found.</h4>
            <div id="gbtimes_news">
                @if(count($items) > 0)
                    <ul>
                        @foreach($items as $key=>$item)
                            @include('theme.pages.inc.list')
                        @endforeach
                    </ul>
                @endif
                <div class="show_more">
                    <div class="gifLoader"></div>
                    <button onClick="loadItems('','','{{$cats}}',8,this)" data-route="{{action('WelcomeController@loadSimilarNews')}}" data-token="{{csrf_token()}}">Show more</button>
                </div>
            </div>
        </div>
    </div>
@stop