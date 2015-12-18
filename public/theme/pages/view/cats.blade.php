@extends('app')

@section('content')
   {!!  do_shortcode('[pages.shortcode.cat]',$article,$slug)  !!}
@stop