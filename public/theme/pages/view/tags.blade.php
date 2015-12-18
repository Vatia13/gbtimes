@extends('app')

@section('content')
    {!!  do_shortcode('[pages.shortcode.tags]',$article,$slug)  !!}
@stop