</div>
<!--// END CONTAINER -->

<!-- FOOTER -->
<div class="footer">
    <div class="footer-place">
        <div class="logo-copy">
            <div class="logo"><a href="/"></a></div>
            <div class="copy">&copy 2015 Gb Times all rights reserved</div>
        </div>
        <div class="footer-menu">
            <div class="footer-menu-place">
                <?php $footer_menu = get_pages(73); $new_footer_menu = array();?>
                    @if(count($footer_menu))
                        @foreach($footer_menu as $key=>$item)
                           <?php $new_footer_menu[$item->translate_slug] = $item;?>
                        @endforeach
                    @endif
                <ul>
                    <li><a href="http://company.gbtimes.com/">About Us</a></li>
                    <li><a href="http://company.gbtimes.com/career">Careers</a></li>
                    @if(isset($new_footer_menu['contact-us']->translate_slug))
                        <li><a href="{{action('WelcomeController@showPage',$new_footer_menu['contact-us']->translate_slug)}}">{{$new_footer_menu['contact-us']->title}}</a></li>
                    @endif
                </ul>
                    <ul>
                        @if(count($footer_menu))
                            @foreach($footer_menu as $key=>$item)
                                @if($item->translate_slug != "contact-us")
                                <li><a href="{{action('WelcomeController@showPage',checkItem($item->translate_slug,$item->slug))}}">{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                {{--<ul>--}}
                    {{--<li><a href="#">About Us</a></li>--}}
                    {{--<li><a href="#">Sign in</a></li>--}}
                    {{--<li><a href="#">Careers</a></li>--}}
                    {{--<li><a href="#">Contributors</a></li>--}}
                    {{--<li><a href="#">Contact Us</a></li>--}}
                    {{--<li><a href="#">Privacy</a></li>--}}
                    {{--<li><a href="#">Advertise with Us</a></li>--}}
                    {{--<li><a href="#">Terms & Conditions</a></li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
</div>
<!--// END FOOTER -->

</div>
<!-- //END WRAPPER -->
<script src="{{ asset('/theme/js/custom.js') }}"></script>
<script src="{{ asset('/theme/js/mainSlider.js') }}"></script>
<script src="{{ asset('/theme/js/radioplayer.js') }}"></script>
<script src="{{ asset('/theme/js/ajax.js') }}"></script>
</body>
</html>
