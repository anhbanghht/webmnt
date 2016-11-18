@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Sửa tiến độ thực tập</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card">
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
    								<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" name="startdate" id="startdate" value="{{Date('Y/m/d',strtotime($topic_process->startdate))}}">
												<label>Ngày bắt đầu</label>
												<p class="help-block">yyyy/mm/dd</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>
    							</div>
    							<div class="col-sm-6">
    								<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" name="enddate" id="enddate" value="{{Date('Y/m/d',strtotime($topic_process->enddate))}}">
												<label>Ngày kết thúc</label>
												<p class="help-block">yyyy/mm/dd</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="description" id="description" class="form-control" rows="3" required="">{{$topic_process->description}}</textarea>
    									<label for="description">Mô tả:</label>
    								</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="content" class="form-control" rows="3" required="">{{$topic_process->content}}</textarea>
    									<label for="content">Nội dung:</label>
    								</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" required="">{{$topic_process->note}}</textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="result" id="result" class="form-control" rows="3" required="">{{$topic_process->result}}</textarea>
    									<label for="result">Kết quả:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="complete" name="complete" type="checkbox" value="1" @if($topic_process->complete) checked @endif>
        								<label for="complete">Hoàn thành:</label>
        							</div>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Cập nhật</button>
        						<a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
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
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
</script>
@stop