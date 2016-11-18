@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Sửa thông tin người dùng</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'year::' ) )
	            				        <a href="{{route('year::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách năm học"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('username')) has-error @endif">
        								<input class="form-control" id="username" name="username" type="text" value="{{old('username')?old('username'):$data->username}}">
        								<label for="username">Tài khoản:</label>
                                        @foreach( $errors->get('username') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('password')) has-error @endif">
        								<input class="form-control" id="password" name="password" type="password" value="" placeholder="Empty if not change!">
        								<label for="password">Mật khẩu:</label>
                                        @foreach( $errors->get('password') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value=" {{old('name')?old('name'):$data->name}}">
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
        										<option value="{{$option->id}}" 
                                                @if(old('teacher_id')) 
                                                    @if( $option->id == old('teacher_id')) selected @endif
                                                @else 
                                                    @if($data->teacher_id == $option->id) selected @endif @endif>{{$option->teacher_name}}
                                                </option>
        									@endforeach
										</select>
        								<label for="teacher_id">Tên giáo viên:</label>
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<select id="group" name="group" class="form-control">
        									@foreach($group as $option)
        										<option value="{{$option->id}}" 
                                                    @if(old('group')) 
                                                        @if( $option->id == old('group')) selected @endif
                                                    @else
                                                        @if($data->group == $option->id) selected @endif @endif>{{$option->name}}
                                                </option>
        									@endforeach
										</select>
        								<label for="group">Nhóm quản trị:</label>
        							</div>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Cập nhật</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop