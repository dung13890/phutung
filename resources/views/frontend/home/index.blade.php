@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/home.css") }}
@endpush

@section('page-content')
<div id="home">
    <!-- Section-half -->
    <div class="section-half">
        <div class="title">{{ $configs['box_left_name'] }}</div>
    </div>
    <div class="section-half">
        <div class="title">{{ $configs['box_right_name'] }}</div>
    </div>
    <div class="clear"></div>

    <!-- Section -->
    <div class="section">
        <ul class="items">
            <li><a href="{{ $configs['box_left_link'] }}"><img src="{{ route('image', $configs['box_left_image']) }}" alt="{{ $configs['box_left_name'] }}"></a></li>
            <li><a href="{{ $configs['box_right_link'] }}"><img src="{{ route('image', $configs['box_right_image']) }}" alt="{{ $configs['box_right_name'] }}"></a></li>
        </ul>
    </div>
    <div class="clear"></div>

    <div class="title news-title">Tin tức & Sự kiện</div>
    <!-- Section -->
    <div class="section">
        <div class="info">
            <a href="#" title=""><img src="/template/img/big-news.png" alt="BIG-NEWS"></a>
            <div class="text">
                <a href="#">Công ty cổ phần thiết bị tân phát tổ chức tham quan du lịch tại đã nằng</a>
                <p>Hè về là dịp lý tưởng để tổ chức những chuyến du lịch dài ngày.</p>
            </div>
        </div>
        <div class="list">
            <div class="news">
                <div class="image">
                    <a href="#"><img src="/template/img/news-001.png" alt=""></a>
                </div>
                <div class="detail">
                    <a href="#">Công ty Cổ phần thiết bị Tân Phát tổ chức tham quan du lịch tại Đà Nằng</a>
                    <div>
                        <span>22/08/2016 | 111 người đọc</span>
                        <span class="pull-right"><a href="#">Xem chi tiết &raquo;</a></span>
                    </div>
                </div>
            </div>
            <div class="news">
                <div class="image">
                    <a href="#"><img src="/template/img/news-002.png" alt=""></a>
                </div>
                <div class="detail">
                    <a href="#">Công ty Cổ phần thiết bị Tân Phát tổ chức tham quan du lịch tại Đà Nằng</a>
                    <div>
                        <span>22/08/2016 | 111 người đọc</span>
                        <span class="pull-right"><a href="#">Xem chi tiết &raquo;</a></span>
                    </div>
                </div>
            </div>
            <div class="news">
                <div class="image">
                    <a href="#"><img src="/template/img/news-001.png" alt=""></a>
                </div>
                <div class="detail">
                    <a href="#">Công ty Cổ phần thiết bị Tân Phát tổ chức tham quan du lịch tại Đà Nằng</a>
                    <div>
                        <span>22/08/2016 | 111 người đọc</span>
                        <span class="pull-right"><a href="#">Xem chi tiết &raquo;</a></span>
                    </div>
                </div>
            </div>
            <div class="news">
                <div class="image">
                    <a href="#"><img src="/template/img/news-002.png" alt=""></a>
                </div>
                <div class="detail">
                    <a href="#">Công ty Cổ phần thiết bị Tân Phát tổ chức tham quan du lịch tại Đà Nằng</a>
                    <div>
                        <span>22/08/2016 | 111 người đọc</span>
                        <span class="pull-right"><a href="#">Xem chi tiết &raquo;</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#home -->
@endsection