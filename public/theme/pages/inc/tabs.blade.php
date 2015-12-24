<div class="shortcode">
    <div class="cat_tabs">
        <div class="tabs">
            <div class="active">All Results</div>
            <div>Article</div>
            <div>Photo Gallery</div>
            <div>Video</div>
            <div>Audio</div>
            @if(Request::path() == 'study-chinese')
                <div>Study Online</div>
            @endif
        </div>

        <div class="fix"></div>

        <div class="tab_content">
            <div class="tab active">
                @if($items->getPickOfDay($slug,false))
                    @include('theme.pages.inc.pick',['type'=>false])
                @endif
                <div class="fix"></div>
                    @include('theme.pages.inc.gbtimesNews',['type'=>false])
                    @include('theme.pages.inc.partnerNews',['type'=>false])
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'article'))
                    @include('theme.pages.inc.pick',['type'=>'article'])
                @endif
                    <div class="fix"></div>
                    @include('theme.pages.inc.gbtimesNews',['type'=>'article'])
                    @include('theme.pages.inc.partnerNews',['type'=>'article'])
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'photogallery'))
                    @include('theme.pages.inc.pick',['type'=>'photogallery'])
                @endif
                <div class="fix"></div>
                    @include('theme.pages.inc.gbtimesNews',['type'=>'photogallery'])
                    @include('theme.pages.inc.partnerNews',['type'=>'photogallery'])
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'video'))
                    @include('theme.pages.inc.pick',['type'=>'video'])
                @endif
                <div class="fix"></div>
                    @include('theme.pages.inc.gbtimesNews',['type'=>'video'])
                    @include('theme.pages.inc.partnerNews',['type'=>'video'])
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'audio'))
                    @include('theme.pages.inc.pick',['type'=>'audio'])
                @endif
                <div class="fix"></div>
                    @include('theme.pages.inc.gbtimesNews',['type'=>'audio'])
                    @include('theme.pages.inc.partnerNews',['type'=>'audio'])
            </div>
            <div class="tab">
                @if($items->getPickOfDay($slug,'study-online'))
                    @include('theme.pages.inc.pick',['type'=>'study-online'])
                @endif
                <div class="fix"></div>
                    @if(Request::path() == 'study-chinese')
                        @include('theme.pages.inc.gbtimesNews',['type'=>'study-online'])
                        @include('theme.pages.inc.partnerNews',['type'=>'study-online'])
                    @endif
            </div>
        </div>
    </div>
</div>