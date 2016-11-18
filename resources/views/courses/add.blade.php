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
							<header>Thêm khóa học</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'courses::' ) )
	            				        <a href="{{route('courses::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách khóa học"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('course')) has-error @endif">
        								<input class="form-control" id="course" name="course" type="text" value="{{old('course')}}">
        								<label for="course">Khóa:</label>
                                        @foreach( $errors->get('course') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('course_full')) has-error @endif">
        								<input class="form-control" id="course_full" name="course_full" type="text" value="{{old('course_full')}}"> 
        								<label for="course_full">Tên đầy đủ:</label>
                                        @foreach( $errors->get('course_full') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
    							<div class="col-sm-6">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')}}</textarea>
    									<label for="note">Ghi chú</label>
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
