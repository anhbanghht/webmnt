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
							<header>Sửa thông tin công việc</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'job::' ) )
	            				        <a href="{{route('job::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách công việc"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
						<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('job_name')) has-error @endif">
        								<input class="form-control" id="job_name" name="job_name" type="text" value="{{old('job_name')?old('job_name'):$job->job_name}}">
        								<label for="job_name">Tên công việc:</label>
                                        @foreach( $errors->get('job_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group ">
        								<select id="intertime_id" name="intertime_id" class="form-control">
        									@foreach($intership_time as $option)
        										<option value="{{$option->id}}" 
                                                @if(old('intertime_id')) 
                                                    @if( $option->id == old('intertime_id')) selected @endif
                                                @else
                                                    @if($option->id == $job->intership_time->id) selected @endif
                                                @endif >{{$option->intertime_name}}</option>
        									@endforeach
										</select>
        								<label for="intertime_id">Đợt thực tập:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
    								<div class="form-group @if($errors->has('startdate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" id="startdate" name="startdate" value="{{old('startdate')?old('startdate'):Date('d/m/Y',strtotime($job->startdate))}}">
												<label>Ngày bắt đầu</label>
												<p class="help-block">ngày/tháng/năm</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
                                        @foreach( $errors->get('startdate') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
									</div>
    							</div>
    							<div class="col-sm-6">
    								<div class="form-group @if($errors->has('enddate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" id="enddate" name="enddate" value="{{old('enddate')?old('enddate'):Date('d/m/Y',strtotime($job->enddate))}}">
												<label>Ngày kết thúc</label>
												<p class="help-block">ngày/tháng/năm</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
                                        @foreach( $errors->get('enddate') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
									</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group @if($errors->has('location')) has-error @endif">
        								<input class="form-control" id="location" name="location" type="text" value="{{old('location')?old('location'):$job->location}}">
        								<label for="location">Địa điểm:</label>
                                        @foreach( $errors->get('location') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group @if($errors->has('description')) has-error @endif">
    									<textarea aria-required="true" name="description" class="form-control" rows="10" >{{old('description')?old('description'):$job->description}}</textarea>
    									<label for="description">Mô tả:</label>
                                        @foreach( $errors->get('description') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('content')) has-error @endif">
    									<textarea aria-required="true" name="content" class="form-control" rows="10" >{{old('content')?old('content'):$job->content}}</textarea>
    									<label for="content ">Nội dung:</label>
                                        @foreach( $errors->get('content') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="important" name="important" type="checkbox" value="1" @if($job->important) checked @endif>
        								<label for="important">Quan trọng:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="allday" name="allday" type="checkbox" value="1" @if($job->allday) checked @endif>
        								<label for="allday">Cả ngày:</label>
        							</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<select id="teacher" name="teacher[]" multiple="multiple">
    										@foreach($teacher as $option)
    											<option value="{{ $option->id }}" 
                                                @if(old('teacher')) 
                                                    @if( $option->id == old('teacher')) selected @endif
                                                @else
                                                    @if($job->teacher)
                                                    @if( in_array($option->id, json_decode($job->teacher) ) ) selected @endif 
                                                    @endif
                                                @endif>{{ $option->teacher_name }}</option>
    										@endforeach
											</select>
    									<label for="teacher">Giáo viên thực hiện:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" >{{$job->note}}</textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Sửa nội dung công việc</button>
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
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#teacher').multiSelect({selectableOptgroup: true});
</script>
@stop