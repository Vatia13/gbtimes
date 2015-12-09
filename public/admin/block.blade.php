<div class="block-list" >
    {{--*/ $modules = get_modules() /*--}}
    @if(count($modules) > 0)
        <ul>
            @foreach($modules as $mod)
                {{--*/ $action = 'Admin\\'. $mod->controller . 'Controller@index' /*--}}
                @if($mod->name <> 'modules')
                    @if(is_array(get_role_permissions(Auth::user(),$mod->name)))
                        {{--*/ $array = (in_array('index',get_role_permissions(Auth::user(),$mod->name))) ? true : false /*--}}
                    @else
                        {{--*/ $array = false /*--}}
                    @endif
                    @if($array == true)
                        <li class="{{ (strpos(Route::getCurrentRoute()->uri(),$mod->name)) ? 'active ' : ''  }}{{$mod->name}}"><a href="{{action($action)}}" title="{{trans('all.'.$mod->trans)}}"><i class="fa {{$mod->icon}}"></i> <span>{{trans('all.'.$mod->trans)}}</span></a></li>
                    @endif
                @elseif($mod->name == 'modules' && Auth::user()->hasRole('Super Admin'))
                    <li class="{{ (strpos(Route::getCurrentRoute()->uri(),$mod->name)) ? 'active' : ''  }} {{$mod->name}}"><a href="{{action($action)}}" title="{{trans('all.'.$mod->trans)}}"><i class="fa {{$mod->icon}}"></i> <span>{{trans('all.'.$mod->trans)}}</span></a></li>
                @endif
            @endforeach
        </ul>
    @endif
    <div class="fix"></div>
    <div class="nav_bars">
        <i onClick='$("input[name=\"active_top_slide\"]").click()' class="fa fa-arrow-circle-left"></i>
        <input type="checkbox" value="1" name="active_top_slide" style="display:none;" {{(isset($_COOKIE['nav_bar']) != false) ? 'checked' : ''}}>
    </div>
</div>

