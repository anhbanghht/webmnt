@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Đổi mật khẩu</header>
							<div class="tools">
								<div class="btn-group">
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if(session()->has('error.old')) has-error @endif">
                                        <label for="password">Mật khẩu hiện tại:</label>
        								<input class="form-control" id="old" name="old" type="password" value="">
        								@if(session()->has('error.old'))
                                        <span class="help-block">{{session()->get('error.old')}}</span>
                                        @endif
        							</div>
        						</div>
        						<div class="col-sm-12 @if(session()->has('error.new')) has-error @endif">
                                    <div class="form-group">
                                        <input class="form-control" id="new" name="new" type="password" value="">
                                        <label for="password">Mật khẩu mới:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 @if(session()->has('error.new')) has-error @endif">
                                    <div class="form-group">
                                        <input class="form-control" id="repass" name="repass" type="password" value="">
                                        <label for="password">Mật khẩu nhập lại:</label>
                                        @if(session()->has('error.new'))
                                        <span class="help-block">{{session()->get('error.new')}}</span>
                                        @endif
                                    </div>
                                </div>
        					</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Đổi mật khẩu</button>
        					</div>
        				</div>
        			</div><!--end .card -->
        		</form>
        	</div>
        </div>
	</div>
</section>
@stop