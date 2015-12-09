<?php
header('Content-Type: application/xml; charset=utf-8');
$xml = '<?xml version="1.0" encoding="UTF-8"?>';
?>
{!! $xml !!}
<rss version="2.0">
    <channel>
        <title>gbtimes.com RSS Feed</title>
        @if(count($entry) > 0)
            @foreach($entry as $item)
                <item>
                    <url>{!! action('WelcomeController@showArticle',$item->slug) !!}</url>
                    <pubDate>{{$item->published_at}}</pubDate>
                    <category>{{ join(',',array_pluck($item->categories->toArray(),'name')) }}</category>
                    <title>{!! $item->title !!}</title>
                    <image>{!! $item->img !!}</image>
                    <description><![CDATA[{!! strip_tags($item->body) !!}]]></description>
                </item>
            @endforeach
        @endif
    </channel>
</rss>