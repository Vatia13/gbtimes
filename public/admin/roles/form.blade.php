<div class="form-group">
   {!! Form::label('name',trans('groups.group_name')) !!}
   {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="table-responsive">

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('groups.view') }}</th>
            <th>{{ trans('all.add') }}</th>
            <th>{{ trans('all.edit') }}</th>
            <th>{{ trans('groups.delete') }}</th>
            <th>{{ trans('all.sort') }}</th>
            <th>{{ trans('all.publish') }}</th>
            <!--<th>{{ trans('groups.only_my') }}</th>-->
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
        @if($role != false)
        {{--*/ $var = unserialize($role->permissions) /*--}}
        @endif

        <tr>
            <th>{{ trans('all.'.$module) }}</th>
            <td>
                <div class="form-group">

                    {!! Form::checkbox('permissions['.$module.'][index]','index',(!empty($var[$module]['index'])) ? $var[$module]['index'] : false) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::checkbox('permissions['.$module.'][create]','create',(!empty($var[$module]['create'])) ? $var[$module]['create'] : false) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::checkbox('permissions['.$module.'][edit]','edit',(!empty($var[$module]['edit'])) ? $var[$module]['edit'] : false) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::checkbox('permissions['.$module.'][destroy]','destroy',(!empty($var[$module]['destroy'])) ? $var[$module]['destroy'] : false) !!}
                </div>
            </td>
            <td>
                @if($module == 'categories')
                <div class="form-group">
                    {!! Form::checkbox('permissions['.$module.'][sort]','destroy',(!empty($var[$module]['sort'])) ? $var[$module]['sort'] : false) !!}
                </div>
                @endif
            </td>
            <td>
                @if($module == 'articles' or $module == 'movies' or $module == 'gallery')
                    <div class="form-group">
                        {!! Form::checkbox('permissions['.$module.'][active]','destroy',(!empty($var[$module]['active'])) ? $var[$module]['active'] : false) !!}
                    </div>
                @endif
            </td>
            <!--
            <td>
                <div class="form-group">
                    {!! Form::checkbox('permissions['.$module.'][only_my]','only_my',(!empty($var[$module]['only_my'])) ? $var[$module]['only_my'] : false) !!}
                </div>
            </td>-->
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
</div>