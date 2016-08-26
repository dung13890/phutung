<div id="footer" class="clear">
    <div class="logo">
        <img src="/template/img/logo-footer.png" alt="LOGO-FOOTER"/>
    </div>

    <div class="info">
        <p>{{ $configs['address'] }}</p>
        <p>ĐT: {{ $configs['phone'] }}</p>
        <p>Email: {{ $configs['email'] }}</p>
    </div>

    <div class="links">
        <ul class="list-inline">
            <li><a href="mailto:{{ $configs['email'] }}"><img src="/template/img/i-envelope.png" alt="I-ENVELOPE"/></a></li>
            <li><a title="{{ $configs['address'] }}" href="#"><img src="/template/img/i-point.png" alt="I-POINT"/></a></li>
            <li><a title="{{ $configs['phone'] }}" href="#"><img src="/template/img/i-phone.png" alt="I-PHONE"/></a></li>
            <li><a target="_blank" href="{{ $configs['facebook'] }}"><img src="/template/img/i-fb.png" alt="I-FB"/></a></li>
        </ul>
    </div>
</div><!-- /#footer -->
<div id="bottom" class="clear"></div><!-- /#bottom -->