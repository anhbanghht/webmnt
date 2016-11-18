@extends('changeslayouts.layouts.blank')

@section('page-content')
<!-- Table Styles Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-list"></i>{{ $info['title'] }}<br><small>{{ $info['description'] }}</small>
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
    
    <div class="table-options clearfix">
        <div class="btn-group btn-group-sm pull-right">
            {{ $info['data']->links() }}
        </div>
        <div class="btn-group btn-group-sm pull-left">
            @foreach( $info['tools'] as $btn )
                {{-- @if( \Auth::user()->has_permission( $btn['route'] ) ) --}}
                <a href="{{ route($btn['route']) }}" class="btn btn-primary {{ $btn['classes'] }}" data-toggle="tooltip" title="" data-original-title="{{ $btn['label'] }}" data-action="{{ $btn['action'] }}"><i class="{{ $btn['icon'] }}"></i></a>
                {{-- @endif --}}
            @endforeach
        </div>
    </div>
    
    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-vcenter table-hover table-condensed">
            <thead>
                <tr>
                    <th class="text-center">
                        <input type="checkbox" id="check_all"/>
                    </th>
                    @foreach( $info['table']->keys() as $thead )
                    <th>
                        {{$thead}}
                    </th>
                    @endforeach
                    <th>
                        Hành động
                    </th>
                </tr>
            </thead>
            <tbody>
                @if( $info['data']->isEmpty() )
                <tr>
                    <td colspan="{{ $info['table']->count()+2 }}">
                        <h5><strong>Không có bản ghi nào!</strong></h5>
                    </td>
                </tr>
                @endif
                @foreach( $info['data'] as $item )
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="check_box_id" name="ids[]" value="{{$item->id}}"/>
                    </td>
                    <?php
                        $info['table']->each(function($i,$k) use($item) {
                        if( is_array($i) ){
                            $temp = $item;
                            foreach( $i as $key => $value ){
                                $temp = $temp->$value;
                            }
                            echo "<td>".$temp."</td>";
                        } else
                            echo "<td>".$item->$i."</td>";
                        });
                      ?>
                    </td>
                    <td class="text-center">
                        <div class="btn-group btn-group-md">
                        @foreach( $info['action'] as $value )
                            {{-- @if( \Auth::user()->has_permission( $value['route'] ) ) --}}
                            <a href="@if( $value['param']->isEmpty() ) {{ route($value['route']) }} @else {{ route( $value['route'], $value['param']->transform(function($i,$k) use($item){ return $item->$k; })->toArray()) }} @endif" data-toggle="tooltip" title="" class="{{ $value['class'] }}" data-original-title="{{ $value['tooltip'] }}"><i class="{{ $value['icon'] }}"></i></a>
                            {{-- @endif --}}
                        @endforeach
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END Table -->
    
</div>
<!-- END Table Styles Block -->
@stop

@section('modal')
    <div id="modal-delete-confirm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-info-circle"></i> Xác nhận</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa không?</p>
                </div>
                <!-- END Modal Body -->
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-primary" id="btn-delete-confirm">Có</button>
                </div>
                <!-- END Modal footer -->
            </div>
        </div>
    </div>
    
    <div id="modal-blank-alert" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-info-circle"></i> Thông báo</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                </div>
                <!-- END Modal Body -->
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-alert-ok" data-dismiss="modal">Đồng ý</button>
                </div>
                <!-- END Modal footer -->
            </div>
        </div>
    </div>
@stop

@section('add-js')
<script>
    (function($){
        var app = {
            confirm: false,
            temp:[],
            init:function(){
                this.removeRow();
                this.checkAllBox();
            },
            removeRow:function(){
                $('.remove_row').click(function(e){
                    e.preventDefault();
                    var row = $(this).parents('.tr').first();
                    var link = $(this).attr('href');
                    $('#modal-delete-confirm').modal('show');
                    $('#btn-delete-confirm').click(function(){
                        app.confirm = true;
                        $('#modal-delete-confirm').modal('hide');
                        $.ajax({
                            url: link,
                            method: 'POST',
                            data: '_token={{csrf_token()}}'
                        }).done(function(response){
                            $('#modal-blank-alert').on('show.bs.modal', function(){
                                $(this).find('.modal-body').text(response.text); 
                            });
                            $('#modal-blank-alert').modal('show');
                            $('#modal-blank-alert').on('hidden.bs.modal', function() {
                                if( ! response.error ){
                                    window.location.reload();
                                }
                            });
                        });
                    });
                    //Reset app confirm;
                    app.confirm = false;
                });
                
            },
            checkAllBox:function(){
                $('#check_all').click(function(e){
                    if(e.currentTarget.checked){
                        $('table').find('.check_box_id').prop('checked',true);
                    } else {
                        $('table').find('.check_box_id').prop('checked',false);
                    }
                    console.log(e);
                });
            }
        };
        app.init();
        // $('.remove_row').click(function(e){
        //     e.preventDefault();
        //     var row = $(this).parents('.tr').first();
        //     var link = $(this).attr('href');
        //     if( confirm('Bạn có chắc chắc muốn xóa bản ghi?') )
        //         $.ajax({
        //             url: link,
        //             method: 'POST',
        //             data: '_token={{csrf_token()}}',
        //         }).done(function(){
        //             $(row).remove();
        //             alert('Xóa thành công!');
        //             window.location.reload();
        //         });
        // });
        // //select all
        // $('#check_all').click(function(e){
        //     if(e.currentTarget.checked){
        //         $('table').find('.check_box_id').prop('checked',true);
        //     } else {
        //         $('table').find('.check_box_id').prop('checked',false);
        //     }
        //     console.log(e);
        // });
        // //do action with multi button
        // $('.table-options a.btn').click(function(e) {
        //     e.preventDefault();
        //     var action = $(this).data('action');
        //     var ids = $('.table tbody input.check_box_id:checked').serialize();
        //     if( confirm('Bạn có chắc chắc chứ?') )
        //         $.ajax({
        //             url: '{{-- $info["main-tools"] --}}',
        //             data: '_token={{csrf_token()}}&action='+action+'&'+ids,
        //             method: "POST"
        //         }).done(function(){
        //             alert("Thực hiện thành công!");
        //             window.location.reload();
        //         });
        // });
    })(jQuery);
</script>
@stop