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
							<header>Sửa kế hoạch</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'plan::' ) )
	            				        <a href="{{route('plan::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách kế hoạch"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('plan_name')) has-error @endif">
        								<input class="form-control" id="plan_name" name="plan_name" type="text" value="{{old('plan_name')?old('plan_name'):$plan->plan_name}}">
        								<label for="plan_name">Tên kế hoạch:</label>
                                        @foreach( $errors->get('plan_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						
        						<div class="col-sm-6">
    								<div class="form-group @if($errors->has('startdate')) has-error @endif">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" id="startdate" name="startdate" value="{{old('startdate')?old('startdate'):Date('d/m/Y',strtotime($plan->startdate))}}">
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
												<input class="form-control" type="text" id="enddate" name="enddate" value="{{old('enddate')?old('enddate'):Date('d/m/Y',strtotime($plan->enddate))}}">
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
        							<div class="form-group">
        								<select id="intertype_id" name="intertype_id" class="form-control">
        									@foreach($intership_type as $option)
        										<option value="{{$option->id}}" 
                                                @if(old('intertype_id')) 
                                                    @if( $option->id == old('intertype_id')) selected @endif
                                                @else
                                                    @if($option->id == $plan->intership_type->id) selected @endif 
                                                @endif
                                                >{{$option->intertype_name}}
                                                </option>
        									@endforeach
										</select>
        								<label for="intertype_id">Đợt thực tập:</label>
        							</div>
        						</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="year_id" name="year_id" class="form-control">
                                            @foreach($year as $option)
                                                <option value="{{$option->id}}" 
                                                @if(old('year_id')) 
                                                    @if( $option->id == old('year_id')) selected @endif
                                                @else
                                                    @if($option->id == $plan->year->id) selected @endif 
                                                @endif
                                                >{{$option->year}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="year_id">Năm học:</label>
                                    </div>
                                </div>
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('content')) has-error @endif">
    									<textarea aria-required="true" name="content" class="form-control" rows="3">{{old('content')?old('content'):$plan->content}}</textarea>
    									<label for="content">Nội dung:</label>
                                        @foreach( $errors->get('content') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        						<div class="col-sm-12">
    								<div class="form-group">
        								<input class="form-control" id="description" name="description" type="text" value="{{old('description')?old('description'):$plan->description}}">
        								<label for="description">Mô tả:</label>
        							</div>
        						</div>
        						<div class="col-sm-12">
    								<div class="form-group">
        								<input class="form-control" id="note" name="note" type="text" value="{{old('note')?old('note'):$plan->note}}">
        								<label for="note">Ghi chú:</label>
        							</div>
        						</div>
                                <div class="col-sm-12">
                                    <div class="form-group @if($errors->has('file')) has-error @endif">
                                        <label for="file">File:</label>
                                        <input type="file" name="file" />
                                        @foreach( $errors->get('file') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
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
<script>
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
</script>
@stop