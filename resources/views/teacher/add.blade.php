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
							<header>Thêm giảng viên</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'teacher::' ) )
	            				        <a href="{{route('teacher::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách giảng viên"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">  
        					<div class="row">
        					    <div class="col-sm-6">
        							<div class="form-group @if($errors->has('teacher_avatar')) has-error @endif">
    									<input class="form-control" id="teacher_avatar" name="teacher_avatar" type="file" value="{{old('teacher_avatar')}}">
    									<label for="teacher_avatar"></label>
                                        @foreach( $errors->get('teacher_avatar') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
    							</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('teacher_name')) has-error @endif">
        								<input class="form-control" id="teacher_name" name="teacher_name" type="text" value="{{old('teacher_name')}}">
        								<label for="teacher_name">Họ và tên:</label>
                                        @foreach( $errors->get('teacher_name') as $message )
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
        							<div class="form-group @if($errors->has('email')) has-error @endif">
        								<input class="form-control" id="email" name="email" type="text" value="{{old('email')}}">
        								<label for="email">Email:</label>
                                        @foreach( $errors->get('email') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="degree" name="degree" type="text" value="{{old('degree')}}">
        								<label for="degree">Học vị:</label>
        							</div>
        						</div>
        					
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="faculty" name="faculty" type="text" value="{{old('faculty')}}">
        								<label for="faculty">Khoa:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        							    <select class="form-control" id="id_department" name="id_department">
        							        @foreach( $department as $item )
        							            <option value="{{$item->id}}" @if( $item == old('id_department')) selected @endif>{{$item->department_name}}</option>
        							        @endforeach
        							    </select>
    									<label for="id_department">Bộ môn:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<input class="form-control" id="subject" name="subject" type="text" value="{{old('subject')}}">
    									<label for="subject">Lĩnh vực chuyên môn:</label>
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
    									<textarea aria-required="true" name="description" id="description" class="form-control" rows="3" >{{old('description')}}</textarea>
    									<label for="description">Mô tả:</label>
    								</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3">{{old('note')}}</textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="working" name="working" type="checkbox" value="1">
        								<label for="working">Đang làm việc:</label>
        							</div>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Thêm giáo viên mới</button>
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
