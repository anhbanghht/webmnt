@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Thêm phân công</h1>
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
        							<select class="form-control" id="subject" name="subject">
                                           @foreach( $subject as $item )
                                               @if($item->id_department==1)
                                                   <option value="{{$item->id}}" <?php if($responsible->id_subject == $item->id): echo "selected"; endif;?>>{{$item->subject_name}}</option>
                                                @endif  
                                           @endforeach
                                       </select>
        								<label for="name">Tên môn học:</label>
        							</div>
        						</div>
                               	<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
										<label> Môn bắt buộc:
											<input type="checkbox" name="obligatory" value="1" <?php if($responsible->obligatory==1): echo "checked"; endif; ?>><span></span>
										</label>
									</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
										<label> Ngân hàng đề:
											<input type="checkbox" name="bank" value="1" <?php if($responsible->bank==1): echo "checked"; endif; ?>><span></span>
										</label>
									</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
    									<label> Đề cương:
    										<input type="checkbox" name="outline" value="1" <?php if($responsible->outline==1): echo "checked"; endif; ?>><span></span>
    									</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
    									<label> bài giảng:
    										<input type="checkbox" name="lesson" value="1" <?php if($responsible->lesson==1): echo "checked"; endif; ?>><span></span>
    									</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="checkbox checkbox-inline checkbox-styled">
    									<label> bài tập/thảo luận:
    										<input type="checkbox" name="exercise" value="1" <?php if($responsible->exercise==1): echo "checked"; endif; ?>><span></span>
    									</label>
    								</div>
    							</div>
    							
        						<div class="col-sm-6">
        							<div class="form-group">
        							    <input class="form-control" type="date" name="start" id="start" value="<?php echo $responsible->start;?>">
										<label>Bắt đầu sử dụng</label>
        							</div>
        						</div>
        					
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="semester" name="semester" type="text" value="<?php echo $responsible->semester;?>">
        								<label>Học kỳ:</label>
        							</div>
        						</div>
        						
        						<div class="col-sm-6">
        							<div class="form-group">
    									<select class="form-control" id="department" name="department">
                                           @foreach( $department as $item1 )
                                                <option value="{{$item1->id}}" <?php if($responsible->id_department == $item1->id): echo "selected"; endif;?>>{{$item1->department_name}}</option>
                                           @endforeach
                                       </select>
    									<label>Ngành:</label>
    								</div>
    							</div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<select class="form-control" id="bank_responsible" name="bank_responsible">
                                           @foreach( $teacher as $item2 )
                                               <option value="{{$item2->id}}" <?php if($responsible->bank_responsible == $item2->id): echo "selected"; endif;?>>{{$item2->teacher_name}}</option>
                                           @endforeach
                                       </select>
    									<label for="num_teacher">Phụ trách NHD:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    										<input class="form-control" type="text" name="weighted_scores" id="weighted_scores" value="<?php echo $responsible->weighted_scores;?>">
    									<label>Trọng số điểm thi (%):</label>
    								</div>
    							</div>
    							
								
    							
    							<div class="col-sm-6">
        							<div class="form-group">
    									<select class="form-control" id="id_teachers" name="id_teachers">
                                           @foreach( $teacher as $item3 )
                                                <option value="{{$item3->id}}" <?php if($responsible->id_teacher == $item3->id): echo "selected"; endif;?>>{{$item3->teacher_name}}</option>
                                           @endforeach
                                       </select>
    									<label for="num_teacher">Chịu trách nhiệm:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<input class="form-control" type="text" name="status" id="status" value="<?php echo $responsible->status;?>">
    									<label for="num_teacher">Trạng thái:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        							    <div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input class="form-control" type="text" name="deadline_outline" id="deadline_outline" value="<?php echo $responsible->deadline_outline;?>">
												<label>Thời hạn nộp đề cương:</label>
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
												<input class="form-control" type="text" name="deadline_lesson" id="deadline_lesson" value="<?php echo $responsible->deadline_lesson;?>">
												<label>Thời hạn nộp bài giảng:</label>
												<p class="help-block">yyyy/mm/dd</p>
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<select multiple class="form-control" id="group" name="responsible_person[]">
                                           @foreach( $teacher as $item )
                                               <option value="{{$item->id}}">{{$item->teacher_name}}</option>
                                           @endforeach
                                       </select>
    									<label for="num_teacher">Nhóm giáo viên:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea  name="note" id="note" class="form-control" rows="3" ></textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
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