@extends('app')

@section('content')
    <div class="content">
        <div class="read">
            <div class="news_content">
                @if($item)
                    <h1>{{$item->title}}</h1>
                    @if(count($item->images) > 0)
                    <div class="view_slider">
                        <div class="main_image">
                                @foreach($item->images as $key=>$img)
                                    @if($key <= 0)
                                        <img src="{{checkImage($img->img)}}"/>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="other_images">
                        </div>
                    </div>
                    @endif
                    <div class="read_content">
                        {!! do_shortcode($item->body,$article,$item->slug) !!}
                    </div>
                @else
                    {{trans('front.not_found')}}
                @endif
            </div>
            <div class="news_relations">
                Hello
            </div>
        </div>

        <div class="comments">

        </div>
    </div>
@stop