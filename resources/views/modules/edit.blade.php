@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post" >
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Sửa thông tin module</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'modules::' ) )
	            				        <a href="{{route('modules::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách modules"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="name" name="name" type="text" value="{{$data->name}}">
        								<label for="name">Tên route</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="route" name="route" type="text" value="{{$data->route}}">
        								<label for="route">Route</label>
        							</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group">
    									<select id="usergroup" name="usergroup[]" multiple="multiple">
    										@foreach($groups as $option)
    											<option value="{{ $option->id }}" >{{ $option->name }}</option>
    										@endforeach
											</select>
    									<label for="usergroup">Nhóm quản trị:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Cập nhật</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop
@section('addtional-css')
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/multi-select/multi-select.css')}}" />
@stop
@section('addtional-js')
<script src="{{ asset('public/assets/js/libs/multi-select/jquery.multi-select.js')}}"></script>
<script>
	$('#usergroup').multiSelect({selectableOptgroup: true});
</script>
@stop