@extends('changeslayouts.layouts.blank')

@section('page-content')
<!-- Table Styles Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-edit"></i>{{ $info['title'] }}<br><small>{{ $info['description'] }}</small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li>{{ $info['breadcrumbhome'] }}</li>
    @foreach( $info['breadcrumb'] as $item )
        <li><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
    @endforeach
</ul>
<!-- END Table Styles Header -->

<!-- Table Styles Block -->
<div class="block">
    <!-- Table Styles Title -->
    <div class="block-title">
        <h2><strong>{{ $info['title'] }}</strong></h2>
    </div>
    <!-- END Table Styles Title -->
    
    <form method="POST"  class="form-horizontal form-bordered">
        {{ csrf_field() }}
        @foreach( $info['fields'] as $item )
        <div class="form-group">
            <label class="col-md-3 control-label" for="{{ $item['id'] }}">{{ $item['label'] }}</label>
            <div class="col-md-9">
                @if( $item['type'] == 'text' )
                    <input type="text" id="{{ $item['id'] }}" name="{{ $item['name'] }}" class="{{ $item['class'] }}" placeholder="" value="@if(isset($item['value'])) {{$item['value']}} @endif">
                @endif
                @if( $item['type'] == 'textarea' )
                    <textarea id="{{ $item['id'] }}" name="{{ $item['name'] }}" rows="4" class="{{ $item['class'] }}" placeholder="">@if(isset($item['value'])) {{$item['value']}} @endif</textarea>
                @endif
                @if( $item['type'] == 'select' )
                    <select id="{{ $item['id'] }}" name="{{ $item['name'] }}" class="{{ $item['class'] }}">
                        @foreach( $item['options'] as $key => $value )
                        <option value="{{$key}}" @if(isset($item['selected']) && $item['selected'] == $key ) selected @endif >{{$value}}</option>
                        @endforeach
                    </select>
                @endif
                @if( $item['type'] == 'repeat' )
                    <div class="clone-wrapper" style="display:none;">
                        <div class="block" style="display:none;">
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger enable-tooltip remove_row" data-toggle="button" title="" data-original-title="Xoá thông tin"><i class="gi gi-remove_2"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info enable-tooltip toggle_row" data-toggle="button" title="" data-original-title="Ẩn/Hiện nội dung"><i class="gi gi-sorting"></i></a>
                                </div>
                                <h2 class="repeat_title">...</h2>
                            </div>
                            <div class="form-horizontal form-bordered repeat_content">
                                @foreach( $item['repeat'] as $subitem )
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ $subitem['label'] }}</label>
                                        <div class="col-md-9">
                                            @if( $subitem['type'] == 'text' )
                                                <input type="text" name="{{ $subitem['name'] }}" class="{{ $subitem['class'] }}" placeholder="">
                                            @endif
                                            @if( $subitem['type'] == 'textarea' )
                                                <textarea name="{{ $subitem['name'] }}" rows="4" class="{{ $subitem['class'] }}" placeholder=""></textarea>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="repeat_wrap">
                        @foreach( $item['data'] as $subrow )
                        <div class="block">
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger enable-tooltip remove_row" data-toggle="button" title="" data-original-title="Xoá thông tin"><i class="gi gi-remove_2"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info enable-tooltip toggle_row" data-toggle="button" title="" data-original-title="Ẩn/Hiện nội dung"><i class="gi gi-sorting"></i></a>
                                </div>
                                <h2 class="repeat_title">{{ $subrow->$item['primary'] }}</h2>
                            </div>
                            <div class="form-horizontal form-bordered repeat_content">
                                @foreach( $item['repeat'] as $subitem )
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ $subitem['label'] }}</label>
                                        <div class="col-md-9">
                                            @if( $subitem['type'] == 'text' )
                                                <input type="text" name="{{ $subitem['name'] }}" class="{{ $subitem['class'] }}" placeholder="" value="{{ $subrow->$item['keys'][$subitem['name']] }}">
                                            @endif
                                            @if( $subitem['type'] == 'textarea' )
                                                <textarea name="{{ $subitem['name'] }}" rows="4" class="{{ $subitem['class'] }}" placeholder="">{{ $subrow->$item['keys'][$subitem['name']] }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="javascript:void(0)" class="btn btn-block btn-primary add_row">Thêm thông tin</a>
                @endif
            </div>
        </div>
        @endforeach
        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Cập nhập</button>
                <a href="{{ url()->current() }}" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Nhập lại</a>
            </div>
        </div>
    </form>
</div>
<!-- END Table Styles Block -->
@stop

@section('add-js')
<script>
    (function($){
        $('.repeat_wrap').on('click','.remove_row',function(e){
            e.preventDefault();
            var parent = $(this).parents('.block').first().slideUp(300,function(){$(this).remove();});
        });
        $('.add_row').click(function(e){
            e.preventDefault();
            var new_row = $('.clone-wrapper > .block').clone();
            $(new_row).appendTo($('.repeat_wrap')).slideDown();
        });
        $('.repeat_wrap').on('blur','.primary', function(e){
            var text = ( $(this).val()=='' ) ? '...' : $(this).val();
            $(this).parents('.block').first().find('.repeat_title').html(text);
        });
        $('.repeat_wrap').on('click','.toggle_row',function(e){
            e.preventDefault();
            $(this).parents('.block').first().find('.repeat_content').slideToggle(300);
        });
    })(jQuery);
</script>
@stop