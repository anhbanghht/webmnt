@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Thêm hồ sơ giảng dạy</h1>
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
        								<select class="form-control" id="teacher" name="teacher">
                                      		@foreach($teacher as $t)
                                                   <option value="{{$t->id}}">{{$t->teacher_name}}</option>  
                                           @endforeach
                                       </select>
        								<label for="name">Tên GV:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							<select class="form-control" id="subject" name="subject">
                                           @foreach( $subject as $item )
                                               @if($item->id_department==1)
                                                   <option value="{{$item->id}}">{{$item->subject_name}}</option>
                                                @endif  
                                           @endforeach
                                       </select>
        								<label for="name">Tên môn học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="document" name="document" type="number">
        								<label>Tài liệu tham khảo:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="semester" name="semester" type="number">
        								<label>Học kỳ:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
										<label> Giáo án:
											<input type="checkbox" id="lesson_plan" name="lesson_plan" value="1"><span></span>
										</label>
									</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    								 	<textarea  name="note" id="note" class="form-control" rows="3" ></textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Thêm mới</button>
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
	$('#start').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#deadline_outline').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#deadline_lesson').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
</script>
@stop