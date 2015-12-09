@extends('admin.app')


@section('content')

<h2>{{ trans('pages.edit') }}</h2>
{{--*/ $date = date('d/m/Y H:i',time()) /*--}}
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::open(['method'=>'POST','action'=>['Admin\PagesController@clonePage',$page->id]]) !!}
            {!! Form::submit('Translate to other language',['class'=>'btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! Form::model($page,['method'=>'PATCH', 'action'=>['Admin\PagesController@update',$page->id]] ) !!}
@include('admin.pages.form',['submitButtonText'=>trans('all.edit'),'lang'=>$page->lang,'translate_slug'=>($page->translate_slug) ? $page->translate_slug : $page->slug])
{!! Form::close() !!}

@include('errors.list')

@stop