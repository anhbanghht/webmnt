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
        								<input class="form-control" id="name" name="name" type="text" value="<?php echo $program1->name;?>">
        								<label>Tên chương trình:</label>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<input class="form-control" id="chitiet" name="chitiet" type="text" value="<?php echo $program1->chitiet;?>">
        								<label>Mô tả:</label>
        							</div>
        						</div>
    							<div class="col-sm-12">
        							<div class="form-group">
    									<textarea aria-required="true" name="note" id="note" class="form-control" rows="3" value="<?php echo $program1->note;?>" ></textarea>
    									<label>Ghi chú:</label>
    								</div>
    							</div>
        			    	</div>
        			    </div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn btn-flat btn-primary ink-reaction">Lưu</button>
        					</div>
        				</div>
        		</div><!--end .card -->
        	</form>
        	</div>
        </div>
	</div>
</section>
@stop