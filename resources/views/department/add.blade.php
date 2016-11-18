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
							<header>Thêm bộ môn</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'department::' ) )
	            				        <a href="{{route('department::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách bộ môn"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        				    
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('name')) has-error @endif">
        								<input class="form-control" id="name" name="name" class="form-control" type="text" value="{{old('name')}}" rows="3">
        								<label for="name">Tên bộ môn:</label>
                                        @foreach( $errors->get('name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
        							</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control"  rows="3">{{old('note')}}</textarea>
    									<label for="note">Ghi chú</label>
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
@section('addtional-js')
<script src="{{asset('public/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script>
    $('#demo-date').datepicker({autoclose: true, todayHighlight: true});
		$('#demo-date-month').datepicker({autoclose: true, todayHighlight: true, minViewMode: 1});
		$('#demo-date-format').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
		$('#demo-date-range').datepicker({todayHighlight: true});
		$('#demo-date-inline').datepicker({todayHighlight: true});
</script>
@stop