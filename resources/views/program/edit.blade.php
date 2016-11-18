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
                                               <option value="{{$item->id}}" <?php if($program->id_subject == $item->id): echo "selected"; endif;?>>{{$item->subject_name}}</option>
                                           @endforeach
                                       </select>
        								<label for="name">Tên môn học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							    	<input class="form-control" id="number" name="number" type="number" value="<?php echo $program->number;?>">
        								<label >Số tín chỉ:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							   	<input class="form-control" id="number_practice" name="number_practice" type="number" value="<?php echo $program->number_practice;?>">
        								<label >TCTH:</label>
        							</div>
        						</div>
         						<div class="col-sm-6">
        							<div class="form-group">
        							    <input class="form-control" id="semester" name="semester" type="number" value="<?php echo $program->semester;?>">
        								<label >Học kỳ:</label>
        							</div>
        						</div>       						
        					    <div class="col-sm-6">
        							<div class="form-group">
        								<select class="form-control" id="department" name="department">
                                      		@foreach($department as $d)
                                                   <option value="{{$d->id}}" <?php if($program->id_department == $d->id): echo "selected"; endif;?>>{{$d->department_name}}</option>  
                                           @endforeach
                                       </select>
        								<label for="name">Đơn vị:</label>
        							</div>
        						</div>
    							
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" value="<?php echo $program->note;?>" ></textarea>
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