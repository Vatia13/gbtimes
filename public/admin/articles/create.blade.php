@extends('admin.app')


@section('content')

    <h2>{{trans('articles.create')}}</h2>

    {{--*/ $date = date('d/m/Y H:i') /*--}}
    {!! Form::open(['action'=>'Admin\ArticlesController@store']) !!}
         @include('admin.articles.form',[
         'submitButtonText'=>trans('all.add'),
         'item'=>false,'checked'=>null,
         'chose_author'=>$auth,
         'news_id'=>0,
         'parent'=>'',
         'catid'=>'',
         'brightcove'=>'',
         'embed'=>'',
         'lang'=>App::getLocale(),
         'type'=>'',
         'translate_slug'=> (Input::get('translate')) ? Input::get('translate') : ''
         ])
    {!! Form::close() !!}

@include('errors.list')

@stop