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
							<header>Sửa thông tin nhóm hội đồng</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'council_group::' ) )
	            				        <a href="{{route('council_group::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách nhóm hội đồng"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" type="text" value="{{old('name')?old('name'):$council_group->name}}">
        								<label for="name">Tên nhóm hội đồng:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group">
        								<select id="intertime_id" name="intertime_id" class="form-control">
        									@foreach($intership_time as $option)
                                                <option value="{{$option->id}}" 
                                                @if(old('intertime_id')) 
                                                    @if( $option->id == old('intertime_id')) selected @endif
                                                @else 
                                                    @if($option->id == $council_group->intership_time->id) selected @endif 
                                                @endif>{{$option->intertime_name}}</option>
                                            @endforeach
										</select>
        								<label for="intertime_id">Đợt thực tập:</label>
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

