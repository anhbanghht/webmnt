@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card">
        			    <div class="card-head card-head-lg">
    						<header>Sửa nhóm người dùng</header>
    						<div class="tools">
    							<div class="btn-group">
    							    @if( \Auth::user()->has_permission( 'users:groups:add' ) )
                				        <a href="{{route('users:groups:add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm nhóm người dùng"><span class="fa fa-plus"></span></a>
                				    @endif
    								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
    							</div>
    						</div>
    					</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value="{{old('name')?old('name'):$data->name}}">
        								<label for="name">Tên nhóm:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" >{{old('note')?old('note'):$data->description}}</textarea>
    									<label for="note">Ghi chú:</label>
    								</div>
    							</div>
    							<div class="col-sm-12">
    							    <div class="checkbox checkbox-styled">
										<label>
											<input class="form-control" id="active" name="active" type="checkbox" value="1" @if($data->active) checked @endif >
											<span>Đang hoạt động</span>
										</label>
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