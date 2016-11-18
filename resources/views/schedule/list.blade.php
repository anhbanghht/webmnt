@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Thời khóa biểu</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table no-margin">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Lớp học phần</th>
    									<th>Số tín chỉ</th>
    									<th>Thứ</th>
    									<th>Tiết học</th>
    									<th>Phòng học</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $schedule->isEmpty() )
    							    <tr>
    									<td rowspan="15">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $schedule as $item )
    							    <tr>
    									<td>{{$item->id}}</td>
    									<td>{{$item->name_course}}</td>
    									<td>{{$item->number}}</td>
    									<td>{{$item->thu}}</td>
    									<td>{{$item->study_time}}</td>
    									<td>{{$item->lecture_hall}}</td>
    								</tr>
    							    @endforeach
    								@endif
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
    			</div><!--end .card -->
    		</div>
		</div>
		
    </div>
</section>
@stop
@section('addtional-js')
<script>
    (function($){
        var token = "{{csrf_token()}}";
        $('.remove-btn').click(function(e){
           e.preventDefault();
           var link = $(e.currentTarget).attr('href');
           $.ajax({
               url: link,
               data: '_token='+token,
               method: 'POST'
           }).done(function(data){
              window.location.reload(); 
           });
        });
    })(jQuery);
</script>
@stop