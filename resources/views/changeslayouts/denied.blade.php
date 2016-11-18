@extends('layouts.blank')

@section('page-content')
<!-- Table Styles Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-lock"></i>Quyền không phù hợp<br><small>Bạn đang truy cập vào chức năng mà bạn không được cấp phép!</small>
        </h1>
    </div>
</div>
<div class="block">
    <!-- Table Styles Title -->
    <div class="block-title">
        <h2><strong>Thông báo!</strong></h2>
    </div>
    <!-- END Table Styles Title -->
    <h4 class="sub-title">Lỗi truy cập</h4>
    <p>
        Bạn không có quyền sử dụng chức năng này!
    </p>
</div>
@stop