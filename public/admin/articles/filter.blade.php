<div class="well well-sm filter">
    {!! Form::open(['action'=>['Admin\ArticlesController@filter',(Input::get('partner')) ? 'partner=1' : ''],'method'=>'POST','class'=>'form-horizontal']) !!}
        <div class="control-group" style="position:relative;">
            {!! Form::hidden('a_filter',filter_request($request,'a_filter',1)) !!}
            <div class="row">
                <div class="col-sm-2">
                    {!! Form::label('a_cat',trans('all.category')) !!}
                    {!! Form::selectCat('a_cat',$cats,filter_request($request,'a_cat'),['class'=>'controls form-control','style'=>'width:100%','data-root'=>2]) !!}</div>
                <div class="col-sm-2">
                    {!! Form::label('a_type',trans('all.type')) !!}
                    {!! Form::select('a_type',[''=>'all','article'=>'Article','video'=>'Video','photogallery'=>'PhotoGallery','audio'=>'Audio','study-online'=>'Study online'],filter_request($request,'a_type'),['class'=>'controls form-control','style'=>'width:100%']) !!}</div>
                <div class="col-sm-2">
                    {!! Form::label('a_status',trans('all.status')) !!}
                    {!! Form::select('a_status',[''=>'---','1'=>'published','0'=>'unpublished'],filter_request($request,'a_status'),['class'=>'controls form-control','style'=>'width:100%']) !!}</div>
                @if(Input::get('partner') != 1)
                    <div class="col-sm-2">
                        {!! Form::label('a_author','&nbsp;') !!}
                        {!! Form::text('a_author',filter_request($request,'a_author'),['class'=>'controls  form-control ajax_author','style'=>'width:100%','placeholder'=>trans('all.author'),'data-route'=>action('Admin\UsersController@getAjaxUserName'),'data-token'=>csrf_token()]) !!}
                        <div class="ajax_author_get"></div>
                    </div>
                @else
                    <div class="col-sm-2">
                        {!! Form::label('a_partner_name',trans('all.source')) !!}
                        {!! Form::select('a_partner_name',[''=>'---']+$partner_list,filter_request($request,'a_partner_name'),['class'=>'controls form-control','style'=>'width:100%']) !!}
                    </div>
                @endif
                <div class="col-sm-2">
                    {!! Form::label('a_from','&nbsp;') !!}
                    {!! Form::text('a_from',filter_request($request,'a_from'),['class'=>'controls form-control','style'=>'width:100%','id'=>'datetimepicker1','placeholder'=>trans('all.from')]) !!}
                </div>
                <div class="col-sm-2">
                    {!! Form::label('a_to','&nbsp;') !!}
                    {!! Form::text('a_to',filter_request($request,'a_to'),['class'=>'controls form-control','style'=>'width:100%;','id'=>'datetimepicker2','placeholder'=>trans('all.to')]) !!}
                </div>
                <div class="col-sm-2">
                    {!! Form::submit(trans('all.filter'),['class' => 'btn btn-primary btn-default']) !!}
                </div>
                <div class="col-sm-2">
                    {!! Form::submit(trans('all.reset'),['class' => 'btn btn-danger btn-default','onClick' => '$("select[name=a_cat]").val("0");$("select[name=a_type]").val("");$("select[name=a_partner_name]").val("");$("select[name=a_status]").val("");$("input[name=a_to],input[name=a_from],input[name=a_author]").val("");']) !!}
                </div>
            </div>
            <div class="fix"></div>
        </div>
    {!! Form::close() !!}
</div>