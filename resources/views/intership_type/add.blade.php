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
							<header>Thêm loại thực tập</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'intership_type::' ) )
	            				        <a href="{{route('intership_type::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách loại thực tập"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('intertype_name')) has-error @endif">
        								<input class="form-control" id="intertype_name" name="intertype_name" type="text" value="{{old('intertype_name')}}">
        								<label for="intertype_name">Loại thực tập:</label>
                                        @foreach( $errors->get('intertype_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group @if($errors->has('intertype_fullname')) has-error @endif">
        								<input class="form-control" id="intertype_fullname" name="intertype_fullname" type="text" value="{{old('intertype_fullname')}}">
        								<label for="intertype_fullname">Tên đầy đủ:</label>
                                        @foreach( $errors->get('intertype_fullname') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
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
    									<label for="note">Ghi chú</label>
    								</div>
    							</div>
    							<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="allow" name="allow" type="checkbox" value="1">
        								<label for="allow">Thực tập tại cơ sở:</label>
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
