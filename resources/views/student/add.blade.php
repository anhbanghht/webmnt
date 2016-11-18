@extends('layouts.default')
@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post" >
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm sinh viên</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'student::' ) )
	            				        <a href="{{route('student::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách sinh viên"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        					    <div class="col-sm-6">
        							<div class="form-group @if( $errors->has('student_id')) has-error @endif">
        								<input class="form-control" id="student_id" name="student_id" type="text" value="{{ old('student_id') }}">
        								<label for="student_id">Mã sinh viên:</label>
                                        @foreach( $errors->get('student_id') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        								
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('student_name')) has-error @endif">
        								<input class="form-control" id="student_name" name="student_name" type="text" value="{{old('student_name')}}">
        								<label for="student_name">Họ và tên:</label>
                                        @foreach( $errors->get('student_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('dateofbirth')) has-error @endif">
        								<input class="form-control" id="dateofbirth" name="dateofbirth" type="text" value="{{old('dateofbirth')}}">
        								<label for="dateofbirth">Ngày sinh:</label>
                                        @foreach( $errors->get('dateofbirth') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('class_name')) has-error @endif">
        								<input class="form-control" id="class_name" name="class_name" type="text" value="{{old('class_name')}}">
        								<label for="class_name">Lớp:</label>
                                        @foreach( $errors->get('class_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group ">
        								<select id="course_id" name="course_id" class="form-control">
        									@foreach($courses as $option)
        										<option value="{{$option->id}}"@if( $option == old('course_id')) selected @endif>{{$option->course}}</option>
        									@endforeach
										</select>
        								<label for="course_id">Khóa học:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<select id="id_department" name="id_department" class="form-control">
        									@foreach($department as $option)
        										<option value="{{$option->id}}"@if( $option == old('id_department')) selected @endif>{{$option->department_name}}</option>
        									@endforeach
										</select>
        								<label for="id_department">Ngành:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="email" name="email" type="text" value="{{old('email')}}">
        								<label for="email">Email:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="phone" name="phone" type="text" value="{{old('phone')}}">
        								<label for="phone">Điện thoại:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="description" id="description" class="form-control" rows="3">{{old('description')}}</textarea>
    									<label for="description">Mô tả:</label>
    								</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')}}</textarea>
    									<label for="note">Ghi chú:</label>
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
	$('#dateofbirth').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
</script>
@stop