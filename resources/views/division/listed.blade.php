@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Phân công giảng dạy</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
					<div class="card-body tab-content filter-customer-this">
						<div class="tab-pane active">
            				<div class="card-body">
            					<div class="table-responsive">
            						<table class="table no-margin">
            							<thead>
            								<tr>
            									<th>STT</th>
            									<th>Lớp học phần</th>
            									<th>Số tín chỉ</th>
            									<th>TCTH</th>
            									<th>Kiểu học</th>
            									<th>Học kỳ</th>
            									<th>Hình thức thi</th>
            									<th>Khóa</th>
            									<th>Số SV</th>
            									<th>GV đảm nhận</th>
            									<th>Ghi chú</th>
            								</tr>
            							</thead>
            							<tbody>
            							    
            							    @foreach( $division as $item )
            							   
            							    <tr>
            							        <td>{{$item->id}}</td>
            									<td>{{$item->course_name}}</td> 
                    							<td>{{$item->number}}</td>	
                    							<td>{{$item->number_practice}}</td>
                    							<td>{{$item->type_learn}}</td>
                    							<td>{{$item->semester}}</td>
            									<td>{{$item->type_exam}}</td>
            									<td>{{$item->name_class}}</td>
            									<td>{{$item->num_student}}</td>
        										<td><?php foreach($teacher as $t):
        									            if($item->id_teacher==$t->id):
        									                echo $t->teacher_name "selected";
        									            endif;
        									           endforeach ?>
            									  </td>
            									<td>{{$item->note}}</td>
            								</tr>
            							    @endforeach
            							</tbody>
            						</table>
            					</div><!--end .table-responsive -->
        					</div>
        			</div>
    			</div><!--end .card -->
    		</div>
		</div><!--end row-->
		
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
