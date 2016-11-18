@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Sửa chương trình đào tạo</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card">
        				<div class="card-body floating-label">
        				    
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="tenbomon" name="tebomon" type="text" value="{{$bomon->tenbomon}}">
        								<label for="tenbomon">Tên booj moon:</label>
        							</div>
        						</div>
        						
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="ghichu" id="ghichu" class="form-control" rows="3" required="">{{$bomon->ghichu}}</textarea>
    									<label for="ghichu">Ghi chú:</label>
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Cập nhập</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop