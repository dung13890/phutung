@extends('layouts.backend')

@section('title',isset($heading) ? $heading : '403 Error Page')

@section('page-content')
<section class="content-header">
    <h1>403 Error Page</h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{ $heading or '403 Error Page' }}</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="error-page">
            <h2 class="headline text-red">403</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Xin lỗi! Chúng tôi phát hiện có 1 lỗi nào đó.</h3>
                <p> Rất tiếc bạn không có quyền để thao tác chức năng này. Làm ơn liên hệ với người quản trị hoặc
                    <a href="/">trở về bảng điều khiển</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
