@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Phân quyền</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
                    <div class="block">
                        <!-- END Table Styles Title -->
                        <div class="row">
                            <form method="POST">{{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-striped table-vcenter table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="">
                                                    Route
                                                </th>
                                                <th  class="text-center">
                                                    Cho phép
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @foreach( $modules as $key => $mod )
                                                <td>{{$mod->name}}</td>
                                                <td class="text-center"><input type="checkbox" name="allows[]" value="{{$mod->id}}" @if( $group->has_permission($mod->route) ) checked @endif/></td>
                                            @if( $key > 0 && $key % 2 == 0 )
                                            </tr>
                                                @if($modules->count() <= $key)
                                                    <tr>
                                                @endif
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="text-center"><button type="submit" class="btn  btn-primary ink-reaction">Cập nhật</button>
                                    <a href="{{ url()->current() }}" class="btn btn-warning"> Nhập lại</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop