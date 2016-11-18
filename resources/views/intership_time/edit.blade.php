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
							<header>Sửa thông tin đợt thực tập</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'intership_time::add' ) )
		        				        <a href="{{route('intership_time::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm đợt thực tập"><span class="fa fa-plus"></span></a>
		        				    @endif
		        				    @if( \Auth::user()->has_permission( 'intership_time::' ) )
		        				        <a href="{{route('intership_time::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách đợt thực tập"><span class="md md-format-list-bulleted"></span></a>
		        				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('intertime_name')) has-error @endif">
        								<input class="form-control" id="intertime_name" name="intertime_name" type="text" value="{{old('intertime_name')?old('intertime_name'):$intership_time->intertime_name}}">
        								<label for="intertime_name">Đợt thực tập:</label>
                                        @foreach( $errors->get('intertime_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<select id="year_id" name="year_id" class="form-control">
        									@foreach($year as $option)
        										<option value="{{$option->id}}" 
                                                    @if(old('year_id') )
                                                        @if( $option->id == old('year_id')) selected @endif 
                                                    @else
                                                        @if( $option->id == $intership_time->year->id) selected @endif 
                                                    @endif>{{$option->year}}
                                                </option>
        									@endforeach
										</select>
        								<label for="year_id">Năm học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<select id="id_intertype" name="id_intertype" class="form-control">
        									@foreach($intership_type as $option)
        										<option value="{{$option->id}}" 
                                                    @if(old('id_intertype') )
                                                        @if( $option->id == old('id_intertype')) selected @endif 
                                                    @else
                                                        @if($option->id == $intership_time->intership_type->id) selected @endif 
                                                    @endif>{{$option->intertype_name}}
                                                </option>
        									@endforeach
										</select>
        								<label for="id_intertype">Loại thực tập:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
    								<div class="form-group @if($errors->has('startdate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" id="startdate" name="startdate" value="{{old('startdate')?old('startdate'):Date('d/m/Y',strtotime($intership_time->startdate))}}">
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
												<input class="form-control" type="text" name="enddate" id="enddate" value="{{old('enddate')?old('enddate'):Date('d/m/Y',strtotime($intership_time->enddate))}}">
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
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('content')) has-error @endif">
    									<textarea aria-required="true" id="txt_content" name="content" class="form-control" rows="3">{{old('content')?old('content'):$intership_time->content}}</textarea>
    									<label for="content">Nội dung:</label>
                                        @foreach( $errors->get('content') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')?old('note'):$intership_time->note}}</textarea>
    									<label for="note">Ghi chú:</label>
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
@section('addtional-js')
<script src="{{asset('public/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/assets/js/libs/ckeditor/ckeditor.js')}}"></script>
<script>
(function($){
	CKEDITOR.replace("txt_content");
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
})(jQuery);
</script>
@stop