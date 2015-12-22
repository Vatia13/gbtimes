@extends('admin.app')


@section('content')

<h2>{{ trans('articles.edit') }}</h2>
<?php $date = date('d/m/Y H:i',strtotime($item->published_at)); ?>
{!! Form::model($item,['method'=>'PATCH', 'action'=>['Admin\ArticlesController@update',$item->id]]) !!}
@include('admin.articles.form',[
'submitButtonText'=>trans('all.edit'),
'chose_author'=>$item->author,
'news_id'=>$item->id,
'lang'=>$item->lang,
'brightcove'=>validate_extra_field($extra_fields,'brightcove'),
'embed'=>validate_extra_field($extra_fields,'embed_video'),
'type'=>$item->type,
'translate_slug'=>$item->translate_slug,
])
{!! Form::close() !!}

@include('errors.list')

@stop