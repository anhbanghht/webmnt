@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm thông tin đợt thực tập trong năm học</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'year::' ) )
	            				        <a href="{{route('year::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách năm học"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('year')) has-error @endif">
        								<input class="form-control" id="year" name="year" type="text" value="{{old('year')}}">
        								<label for="year">Năm học</label>
                                        @foreach( $errors->get('year') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-12">
    								<div class="form-group @if($errors->has('startdate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" name="startdate" id="startdate" value="{{old('startdate')}}">
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
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')}}</textarea>
    									<label for="textarea1">Ghi chú</label>
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
@section('addtional-js')
<script src="{{asset('public/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script>
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
</script>
@stop