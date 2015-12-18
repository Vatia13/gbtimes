
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('site_title',trans('all.site_title')) !!}
            {!! Form::text('site_title',(Lang::has('all.'.$settings[0]->value)) ? 'all.'.$settings[0]->value : $settings[0]->value,['class'=>'form-control']) !!}
            <i><small>({{trans('all.if_translate')}})</small></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('site_tags',trans('all.site_tags')) !!}
            {!! Form::text('site_tags',(Lang::has('all.'.$settings[1]->value)) ? 'all.'.$settings[1]->value : $settings[1]->value,['class'=>'form-control']) !!}
            <i><small>({{trans('all.if_translate')}})</small></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('site_description',trans('all.site_description')) !!}
            {!! Form::textarea('site_description',(Lang::has('all.'.$settings[2]->value)) ? 'all.'.$settings[2]->value : $settings[2]->value,['class'=>'form-control']) !!}
            <i><small>({{trans('all.if_translate')}})</small></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <!--{!! Form::label('allow_registration',trans('all.users')) !!}-->
            <label for="allow_registration">{!! Form::checkbox('allow_registration',1,($settings[3]->value == 0) ? 0 : 1) !!} {{trans('all.allow_registration')}}</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('pagination_num',trans('all.pagination_num')) !!}
            {!! Form::input('number','pagination_num',(Lang::has('all.'.$settings[4]->value)) ? 'all.'.$settings[4]->value : $settings[4]->value,['class'=>'form-control','max'=>'30','style'=>'width:64px']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::submit(trans('all.save'),['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>