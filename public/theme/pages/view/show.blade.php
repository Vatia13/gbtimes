@extends('app')

@section('content')
    <div class="content">
        @if($item)
            <div class="read">
                <?php $string_tags = '';?>
                @if($item->categories[0]->id == 1)
                    <h1>{{$item->title}}</h1>
                    <div class="read_content">
                        {!! do_shortcode($item->body,$article,$item->slug) !!}
                    </div>
                @else
                    <div class="news_side">
                        <h1>{{$item->title}}</h1>
                        @if(count($item->images) > 0)
                            <div class="view_slider">
                                @foreach($item->images as $key=>$img)
                                    @if($key <= 0)
                                        <div class="main_image">
                                            <a href="{{checkImage($img->img)}}" rel="prettyPhoto[view]"><img src="{{checkImage($img->img)}}"  title="{{checkItem($img->title,$img->alt)}}" alt="{{checkItem($img->alt,$img->title)}}"/></a>
                                            @if(isset($img->title))
                                                <div class="image_title"><span>{{$img->title}}</span></div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                                @if(count($item->images) > 1)
                                    <div class="other_images">
                                        <ul>
                                            @foreach($item->images as $key=>$img)
                                                <li><a href="{{checkImage($img->img)}}" rel="prettyPhoto[view]"><img src="{{checkImage($img->img)}}"  title="{{checkItem($img->title,$img->alt)}}" alt="{{checkItem($img->alt,$img->title)}}"/></a></li>
                                                <?php  $string_tags .= ','.$img->meta_key; ?>
                                            @endforeach
                                        </ul>
                                        <div class="fix"></div>
                                    </div>

                                    <link rel="Stylesheet" href="{{asset('/prettyPhoto/prettyPhoto.css')}}"/>
                                    <script src="{{asset('/prettyPhoto/jquery.prettyPhoto.js')}}"></script>
                                        <script>
                                            $(document).ready(function(){
                                                $('a[rel="prettyPhoto[view]"]').prettyPhoto({
                                                    social_tools:false
                                                });
                                            });
                                        </script>
                                @endif
                            </div>
                        @endif
                        <div class="read_content">
                            {!! do_shortcode($item->body,$article,$item->slug) !!}
                        </div>
                        <div class="fix"></div>
                        <div class="social-tags">
                            @if(!empty($item->meta_key))
                                <?php $string_tags .= $item->meta_key;?>
                                <?php $tags = array_unique(array_filter(array_map('trim',explode(',',$string_tags)))); ?>
                                @if(count($tags))
                                        <div class="tags">
                                            <h2>Tags:</h2>
                                            <ul>
                                                @foreach($tags as $tag)
                                                    <li rel="dc:subject">
                                                        <a href="{{url('tags/'.Illuminate\Support\Str::slug_utf8($tag))}}" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype>{{$tag}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                @endif
                            @endif
                            <div class="social-network">
                                <h2>Share</h2>
                                <ul>
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="google-plus"></a></li>
                                    {{--<li><a href="mailto:?to=subject=&amp;body={{Route::getCurrentRoute()->getPath()}}" class="email">email</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="similar_side">
                        Hello
                    </div>
                    <div class="comments">
                    </div>
                @endif
            </div>
        @else
            {{trans('front.not_found')}}
        @endif
    </div>
@stop