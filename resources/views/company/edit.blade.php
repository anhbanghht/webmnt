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
							<header>Sửa thông tin cơ sở thực tập</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'company::' ) )
	            				        <a href="{{route('company::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách cơ sở thực tập"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        				    
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value="{{old('name')?old('name'):$company->company_name}}">
        								<label for="name">Tên cơ sở:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('email')) has-error @endif">
        								<input class="form-control" id="email" name="email" type="text" value="{{old('email')?old('email'):$company->email}}">
        								<label for="email">Email:</label>
                                        @foreach( $errors->get('email') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="website" name="website" type="text" value="{{old('website')?old('website'):$company->website}}">
        								<label for="website">Website:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('phone')) has-error @endif">
        								<input class="form-control" id="phone" name="phone" type="text" value="{{old('phone')?old('phone'):$company->phone}}">
        								<label for="phone">Điện thoại:</label>
                                        @foreach( $errors->get('phone') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('address')) has-error @endif">
        								<input class="form-control" id="address" name="address" type="text" value="{{old('address')?old('address'):$company->address}}">
        								<label for="address">Địa chỉ:</label>
                                        @foreach( $errors->get('address') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('subject')) has-error @endif">
        								<input class="form-control" id="subject" name="subject" type="text" value="{{old('subject')?old('subject'):$company->subject}}">
        								<label for="subject">Lĩnh vực:</label>
                                        @foreach( $errors->get('subject') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('student_quantity')) has-error @endif">
        								<input class="form-control" id="student_quantity" name="student_quantity" type="text" value="{{old('student_quantity')?old('student_quantity'):$company->student_quantity}}">
        								<label for="student_quantity">Số lượng sinh viên:</label>
                                        @foreach( $errors->get('student_quantity') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('guide_people')) has-error @endif">
        								<input class="form-control" id="guide_people" name="guide_people" type="text" value="{{old('guide_people')?old('guide_people'):$company->guide_people}}">
        								<label for="guide_people">Cán bộ hướng dẫn của cơ sở:</label>
                                        @foreach( $errors->get('guide_people') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<select id="teacher_id" name="teacher_id" class="form-control">
        									@foreach($teacher as $option)
        										<option value="{{$option->id}}" 
                                                @if(old('teacher_id') )
                                                    @if( $option->id == old('teacher_id')) selected @endif 
                                                @else 
                                                    @if($option->id == $company->teacher->id) selected @endif 
                                                @endif >{{$option->teacher_name}}
                                                </option>
        									@endforeach
										</select>
        								<label for="teacher_id">Phụ trách cơ sở:</label>
        							</div>
        						</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="intertime_id" name="intertime_id" class="form-control">
                                            @foreach($intership_time as $option)
                                                <option value="{{$option->id}}" 
                                                @if(old('intertime_id')) 
                                                    @if( $option->id == old('intertime_id')) selected @endif
                                                @else 
                                                    @if($option->id == $company->intership_time->id) selected @endif 
                                                @endif>{{$option->intertime_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="intertime_id">Đợt thực tập:</label>
                                    </div>
                                </div>
        						<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="description" id="description" class="form-control" rows="3" >{{old('description')?old('description'):$company->description}}</textarea>
    									<label for="description">Các hướng đề tài thực tập:</label>
    								</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')?old('note'):$company->note}}</textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Cập nhập</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop