@extends('app')

@section('content')
    <div class="content">
        @if($item)
            <div class="read" @if($item->categories[0]->id <> 1) style="width:98% !important" @endif>
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
                                            <a href="{{checkImage($img->img)}}" rel="prettyPhoto[view]" title="{{checkItem($img->title,$img->alt)}}"><span class="zoom"></span><img src="{{checkImage($img->img)}}" alt="{{checkItem($img->alt,$img->title)}}"/></a>
                                            @if(!empty($img->title))
                                                <div class="image_title"><span>{{$img->title}}</span></div>
                                            @endif

                                        </div>
                                    @endif
                                @endforeach
                                @if(count($item->images) > 1)
                                    <div class="other_images">
                                        <ul>
                                            @foreach($item->images as $key=>$img)
                                                <li><a @if($key <> 0)href="{{checkImage($img->img)}}"  rel="prettyPhoto[view]"@endif  title="{{checkItem($img->title,$img->alt)}}"><img src="{{checkImage($img->img)}}" alt="{{checkItem($img->alt,$img->title)}}"/></a></li>
                                                <?php  $string_tags .= ','.$img->meta_key; ?>
                                            @endforeach
                                        </ul>
                                        <div class="fix"></div>
                                    </div>
                                @endif
                                    <link rel="Stylesheet" href="{{asset('/prettyPhoto/prettyPhoto.css')}}"/>
                                    <script src="{{asset('/prettyPhoto/jquery.prettyPhoto.js')}}"></script>
                                    <script>
                                        $(document).ready(function(){
                                            $('a[rel="prettyPhoto[view]"]').prettyPhoto({
                                                social_tools:false
                                            });
                                        });
                                    </script>
                            </div>
                        @endif
                        <div class="fix"></div>
                        <div class="video_player">
                        @if(validate_extra_field(get_fields($item->extra_fields),'brightcove'))
                                <object type="application/x-shockwave-flash" data="http://c.brightcove.com/services/viewer/federated_f9?&amp;flashID=myExperience1&amp;movie=http%3A%2F%2Fc.brightcove.com%2Fservices%2Fviewer%2Ffederated_f9%3FisVid%3D1%26isUI%3D1&amp;bgcolor=%23ffffff&amp;base=http%3A%2F%2Fadmin.brightcove.com&amp;seamlesstabbing=false&amp;allowFullScreen=true&amp;swLiveConnect=true&amp;htmlFallback=true&amp;allowScriptAccess=always&amp;isVid=true&amp;isUI=true&amp;dynamicStreaming=true&amp;includeAPI=true&amp;templateLoadHandler=bcTemplateLoaded&amp;templateReadyHandler=brightcove%5B%22templateReadyHandlermyExperience1%22%5D&amp;playerID=1620668361001&amp;playerKey=AQ~~%2CAAABeSq2SWE~%2CaL3Zv53GNup7iLNCSLuWPKgk1OvfRkD0&amp;%40videoPlayer={{validate_extra_field(get_fields($item->extra_fields),'brightcove')}}&amp;autoStart=&amp;debuggerID=&amp;originalTemplateReadyHandler=bcTemplateReady&amp;startTime=1450171733744" id="myExperience1" width="100%" height="360" class="BrightcoveExperience" seamlesstabbing="undefined"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"><param name="seamlessTabbing" value="false"><param name="swliveconnect" value="true"><param name="wmode" value="window"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"></object>
                        @endif
                        <div class="fix"></div>
                        @if(validate_extra_field(get_fields($item->extra_fields),'embed_video'))
                            {!! validate_extra_field(get_fields($item->extra_fields),'embed_video') !!}
                        @endif
                        </div>
                        <div class="fix"></div>
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
                                    <li>
                                        <a class="facebook" href="http://www.facebook.com/sharer.php?u={{Request::url()}}" onclick="shareWindow('Facebook',this);return false;"></a>
                                    </li>
                                    <li>
                                        <a class="twitter" onclick="shareWindow('Twitter',this);return false;" href="https://twitter.com/intent/tweet?url={{Request::url()}}&amp;text={{recordTitle($item->social_media_title,$item->title)}}&amp;via=Gbtimes.com" target="_blank"></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" onclick="shareWindow('Google',this);return false;" href="https://plus.google.com/share?url={{Request::url()}}" target="_blank"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="comments">
                            <div id="disqus_thread"><a></a><p></p></div>
                            <script>
                                /**
                                 * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                 */
                                /*
                                 var disqus_config = function () {
                                 this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                                 this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                 };
                                 */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');

                                    s.src = '//newgbtimes.disqus.com/embed.js';

                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
                    <div class="similar_side">
                            <?php $author_articles = $article->getAuthorArticles($item->author,3); ?>
                            <div class="news_list">
                                @if(count($author_articles) > 0)
                                    <a href="{{action('WelcomeController@newsAuthor',$item->author)}}">More by author</a>
                                    <ul>
                                        @foreach($author_articles as $key=>$it)
                                            <li>
                                                <a href="{{action('WelcomeController@showArticle',checkItem($it->translate_slug,$it->slug))}}">
                                                    <div class="image">
                                                        <img src="{{checkImage($it->img)}}"/>
                                                    </div>
                                                    <div class="desc">
                                                        <h4>{{recordTitle($it->frontpage_title,$it->title)}}</h4>
                                            <span>
                                                {{recordDesc($it->head,$it->body,20)}}
                                            </span>
                                                        <br>
                                                    </div>
                                                    <div class="time-author">
                                                        <span>{{$it->author}}</span> <span>{{date('m.d.Y',strtotime($it->published_at))}}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                                <?php $cats = array_pluck($item->categories->toArray(),'id');  unset($cats[0]);?>
                                <?php $similar_articles = $article->getSimilarArticles($cats,3,$item->author); ?>
                                <div class="news_list">
                                    @if(count($similar_articles) > 0)
                                        <a href="#">Similar stories</a>
                                        <ul>
                                            @foreach($similar_articles as $key=>$it)
                                                <li>
                                                    <a href="{{action('WelcomeController@showArticle',checkItem($it->translate_slug,$it->slug))}}">
                                                        <div class="image">
                                                            <img src="{{checkImage($it->img)}}"/>
                                                        </div>
                                                        <div class="desc">
                                                            <h4>{{recordTitle($it->frontpage_title,$it->title)}}</h4>
                                            <span>
                                                {{recordDesc($it->head,$it->body,20)}}
                                            </span>
                                                            <br>
                                                        </div>
                                                        <div class="time-author">
                                                            <span>{{$it->author}}</span> <span>{{date('m.d.Y',strtotime($it->published_at))}}</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                    </div>

                @endif
            </div>
        @else
            {{trans('front.not_found')}}
        @endif
    </div>
@stop