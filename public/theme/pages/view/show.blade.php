@extends('app')

@section('content')
    <div class="content">
        <div class="read">
            @if($item)
                <h1>{{$item->title}}</h1>
                <div class="read_content">
                    {!! do_shortcode($item->body,$article,$item->slug) !!}
                </div>
            @else
                {{trans('front.not_found')}}
            @endif
        </div>
    </div>
@stop