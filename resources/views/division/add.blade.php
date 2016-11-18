@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Thêm phân công giảng dạy</h1>
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
        							<select class="form-control" id="course" name="course">
                                           @foreach( $course as $item )
                                               <option value="{{$item->id}}">{{$item->name}}</option>
                                           @endforeach
                                       </select>
        								<label for="name">Tên học phần:</label>
        							</div>
        						</div>
        					    <div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="class_learn" name="class_learn" type="text">
        								<label>Khóa:</label>
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
												<select id="lanhoc" name="lanhoc" class="form-control">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
												<label for="select1">Lần học</label>
											</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<select class="form-control" id="teacher" name="teacher">
                                           @foreach( $teacher as $item1 )
                                               <option value="{{$item1->id}}">{{$item1->teacher_name}}</option>
                                           @endforeach
                                       </select>
    									<label for="teacher"> Giáo viên đảm nhận:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        							    <div class="checkbox checkbox-inline checkbox-styled">
        							        <label>Chính quy:
            								    <input  id="formal" name="formal" value="1" type="checkbox">
            								</label>
            							</div>
        							</div>
        						</div>
    							<div class="col-sm-6">
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