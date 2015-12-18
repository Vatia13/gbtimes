@extends('theme.app')

@section('content')
    <div class="read">
        <h3>{{$item->title}}</h3>
        <div class="read_content">
            {!! do_shortcode($item->body) !!}
        </div>
    </div>
@stop