@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post" enctype="multipart/form-data">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm hội đồng</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'council::' ) )
	            				        <a href="{{route('council::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách hội đồng"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value="{{old('name')}}">
        								<label for="name">Tên hội đồng:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group ">
        								<select id="council_group_id" name="council_group_id" class="form-control">
        									@foreach($council_group as $option)
        										<option value="{{$option->id}}" @if($option==old('council_group_id')) selected @endif>{{$option->name}}</option>
        									@endforeach
										</select>
        								<label for="council_group_id">Nhóm hội đồng:</label>
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group  @if($errors->has('time_start')) has-error @endif">
        								<input class="form-control" id="time_start" name="time_start" type="text" value="{{old('time_start')}}">
        								<label for="time_start">Thời gian bắt đầu:</label>
                                        @foreach( $errors->get('time_start') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('time_end')) has-error @endif">
        								<input class="form-control" id="time_end" name="time_end" type="text" value="{{old('time_end')}}">
        								<label for="time_end">Thời gian kết thúc:</label>
                                        @foreach( $errors->get('time_end') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6" >
    								<div class="form-group @if($errors->has('startdate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" name="startdate" id="startdate" value="{{old('startdate')}}">
												<label>Ngày</label>
												<p class="help-block">dd/mm/yyyy</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
                                        @foreach( $errors->get('startdate') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
									</div>
    							</div>
        						<div class="col-sm-6" >
        							<div class="form-group @if($errors->has('place')) has-error @endif">
        								<input class="form-control" id="place" name="place" type="text" value="{{old('place')}}">
        								<label for="place">Địa điểm:</label>
                                        @foreach( $errors->get('place') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group">
    									<select id="teacher" name="teacher[]" multiple="multiple">
    										@foreach($teacher as $option)
    											<option value="{{ $option->id }}" @if( $option == old('teacher')) selected @endif>{{ $option->teacher_name }}</option>
    										@endforeach
										</select>
    									<label for="teacher">Giáo viên trong hội đồng:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('name')}}</textarea>
    									<label for="note">Ghi chú</label>
    								</div>
    							</div>
    							
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Thêm mới</button>
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
<script src="{{ asset('public/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
<script>
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#teacher').multiSelect({selectableOptgroup: true});
	$("#time_start").inputmask('hh:mm', {placeholder: 'hh:mm', alias: 'time24', hourFormat: '24'});
	$("#time_end").inputmask('hh:mm', {placeholder: 'hh:mm', alias: 'time24', hourFormat: '24'});
</script>
@stop
