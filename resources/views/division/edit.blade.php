@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Phân công giảng dạy</h1>
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
	                                        <input class="form-control" id="course_name" name="course_name" type="text" value="<?php echo $division->course_name ;?>">
	                                       	<label >Tên học phần:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="number" name="number" type="text" value="<?php echo $division->number ;?>">
	                                       	<label >Số tín chỉ:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="number_practice" name="number_practice" type="text" value="<?php echo $division->number_practice ;?>">
	                                       	<label >TCTH:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="type_learn" name="type_learn" type="text" value="<?php echo $division->type_learn ;?>">
	                                       	<label >Kiểu học:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="semester" name="semester" type="text" value="<?php echo $division->semester ;?>">
	                                       	<label >Học kỳ:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="type_exam" name="type_exam" type="text" value="<?php echo $division->type_exam ;?>">
	                                       	<label >Hình thức thi:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="name_class" name="name_class" type="text" value="<?php echo $division->name_class;?>">
	                                       	<label >Khóa:</label>
	        							</div>
	        						</div>
	        						<div class="col-sm-6">
	        							<div class="form-group">
	                                        <input class="form-control" id="num_student" name="num_student" type="text" value="<?php echo $division->num_student;?>">
	                                       	<label >Số SV:</label>
	        							</div>
	        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    										<select class="form-control" id="teacher" name="teacher">
                                           @foreach( $teacher as $t )
                                               <option value="{{$t->id}}">{{$t->teacher_name}}</option>
                                           @endforeach
                                       </select>
    									<label for="teacher"> Giáo viên đảm nhận:</label>
    								</div>
    							</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" ><?php echo $division->note;?></textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Lưu</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop