@extends('admin.app')


@section('content')

    <h2>{{trans('pages.create')}}</h2>
    {{--*/ $date = date('d/m/Y H:i') /*--}}
    {!! Form::open(['action'=>'Admin\PagesController@store']) !!}
         @include('admin.pages.form',[
         'submitButtonText'=>trans('all.add'),
         'page'=>false,
         'lang'=>App::getLocale(),
         'checked'=>null,
         'translate_slug'=>'',
         'translates'=>[]
         ])
    {!! Form::close() !!}

@include('errors.list')

@stop