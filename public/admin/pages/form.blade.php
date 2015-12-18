{{--*/ $children = get_cat_by_parent(71) /*--}}
{!! Form::hidden('published_at',$date) !!}
{!! Form::hidden('status',1) !!}
{!! Form::hidden('translate_slug',$translate_slug) !!}
<?php $langs = get_languages();?>
@if(count($translates) > 0)
    @foreach($translates as $t)
        <?php unset($langs[$t]); ?>
    @endforeach
@endif
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('lang',trans('all.chose_language')) !!}
            {!! Form::select('lang',['---']+$langs,$lang,['class'=>'form-control','style'=>'margin-top:0;']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('title',trans('all.title')) !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('body',trans('all.text')) !!}
            {!! Form::textarea('body',null,['class'=>'form-control tinymce']) !!}
        </div>
    </div>
</div>



<div class="row">

    <div class="col-xs-6">
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    {!! Form::label('slug',trans('all.url').' ('.trans('all.auto_gen').')') !!}
                    {!! Form::text('slug',null,['class'=>'form-control','maxlength'=>255]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    {!! Form::label('meta_key',trans('all.meta_key')) !!}
                    {!! Form::text('meta_key',null,['class'=>'form-control','maxlength'=>100]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    {!! Form::label('meta_desc',trans('all.meta_desc')) !!}
                    {!! Form::textarea('meta_desc',null,['class'=>'form-control','maxlength'=>150,'rows'=>5]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="rubrics">
        <div class="col-xs-6">
            <div class="row box">
                <h3>{{trans('all.menu')}}</h3>

                <div class="col-sm-12">
                    <div class="form-group" id="rubrics">
                        @if(count($children) > 0)
                            @if($page != false && count($page) > 0)
                                {{--*/ $cat_array = array_pluck($children,'id') /*--}}
                                {{--*/ $in_array = $page->categories()->select('cat_id')->whereIn('cat_id',$cat_array)->get()->toArray() /*--}}
                                {{--*/ $checked_array = array_pluck($in_array,'cat_id') /*--}}
                            @endif
                            @foreach($children as $child)
                                <label class="checkbox-inline" >
                                    @if($page != false && count($page) > 0)
                                        @if(in_array($child['id'],$checked_array))
                                            {{--*/ $checked = true /*--}}
                                        @else
                                            {{--*/ $checked = false /*--}}
                                        @endif
                                    @endif

                                    {!! Form::checkbox('cat[]',$child['id'],$checked,['class'=>'child_cat']) !!}  {{get_trans($child['name'])}}
                                </label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
