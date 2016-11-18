@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Chương trình đào tạo</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				    <a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
    				    <a href="{{route('subject::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					<div class="table-responsive">
    						<table class="table no-margin">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Tên môn học</th>
    									<th>Tên tiếng anh</th>
    									<th>Số tín chỉ</th>
    									<th>TCTH</th>
    									<th>Đơn vị</th>
    									<th>Bộ môn</th>
    									<th>Bắt buộc</th>
    									<th>Ngân hàng đề</th>
    									<th>Kiểu thi</th>
    									<th>Thời gian thi</th>
    									<th>Số GV</th>
    									<th>GV</th>
    									<th>Ghi chú</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $subject->isEmpty() )
    							    <tr>
    									<td rowspan="5">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $subject as $item )
    							    <tr>
    									<td>{{$item->id}}</td>
    									<td>{{$item->name}}</td>
    									<td>{{$item->english}}</td>
    									<td>{{$item->number}}</td>
    									<td>{{$item->number_practice}}</td>
    									<td>{{$item->semester}}</td>
    									<td>{{$item->type_exam}}</td>
    									<td>{{$item->time_exam}}</td>
    									<td>{{$item->id_department}}</td>
    									<td>{{$item->num_teacher}}</td>
    									<td>{{$item->note}}</td>
    									<td>
    									    <a href="{{route('subject::edit',['id'=>$item->id_subject])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    <a href="{{route('subject::delete',['id'=>$item->id_subject])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									</td>
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