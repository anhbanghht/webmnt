@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Thêm môn học</h1>
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
        							    <input class="form-control" id="subject" name="subject" type="text" required="">
        								<label for="name">Tên môn học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							    <input class="form-control" id="number" name="number" type="number" required="">
        								<label >Số tín chỉ:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							    <input class="form-control" id="number_practice" name="number_practice" type="number" required="">
        								<label >TCTH:</label>
        							</div>
        						</div>
         						<div class="col-sm-6">
        							<div class="form-group">
        							    <input class="form-control" id="semester" name="semester" type="number" required="">
        								<label >Học kỳ:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							<select class="form-control" id="program1" name="program1">
                                           @foreach( $program1 as $item )
                                                   <option value="{{$item->id}}">{{$item->name}}</option>
                                           @endforeach
                                       </select>
        								<label for="name">Tên môn học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<select class="form-control" id="department" name="department">
                                           @foreach( $department as $d )
                                               <option value="{{$d->id}}">{{$d->department_name}}</option>
                                           @endforeach
                                       </select>
    									<label> Đơn vị:</label>
    								</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" ></textarea>
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