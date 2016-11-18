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
							<header>Thêm người dùng</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'users:' ) )
	            				        <a href="{{route('users:')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách người dùng"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('username')) has-error @endif">
        								<input class="form-control" id="username" name="username" type="text" value="{{old('username')}}">
        								<label for="username">Tài khoản:</label>
                                        @foreach( $errors->get('username') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('password')) has-error @endif">
        								<input class="form-control" id="password" name="password" type="password" value="{{old('password')}}">
        								<label for="password">Mật khẩu:</label>
                                        @foreach( $errors->get('password') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value="{{old('name')}}">
        								<label for="name">Tên hiển thị:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<select id="teacher_id" name="teacher_id" class="form-control">
        									@foreach($teacher as $option)
        										<option value="{{$option->id}}" @if($option == old('teacher_id')) selected @endif>{{$option->teacher_name}}</option>
        									@endforeach
										</select>
        								<label for="teacher_id">Tên giáo viên:</label>
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<select id="group" name="group" class="form-control">
        									@foreach($group as $option)
        										<option value="{{$option->id}}" @if($option == old('group')) selected @endif>{{$option->name}}</option>
        									@endforeach
										</select>
        								<label for="group">Nhóm quản trị:</label>
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