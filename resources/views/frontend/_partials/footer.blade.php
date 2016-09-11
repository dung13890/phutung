<div id="headerLinks" class="clear"></div><!-- /#headerLinks -->

<div id="footer" class="clear">
    <div class="logo">
        <img src="{{ route('image', $configs['logo_footer']) }}" alt="LOGO"/>
    </div>

    <div class="info">
        <p>{{ $configs['address'] }}</p>
        <p>Phone: {{ $configs['phone'] }}</p>
        <p>Email: {{ $configs['email'] }}</p>
    </div>

    <div class="links">
        <ul class="list-inline visible-lg-block visible-md-block visible-sm-block">
            <li><a href="mailto:{{ $configs['email'] }}"><img src="/template/img/i-envelope.png" alt="I-ENVELOPE"/></a></li>
            <li><a title="{{ $configs['address'] }}" href="#"><img src="/template/img/i-point.png" alt="I-POINT"/></a></li>
            <li><a title="{{ $configs['phone'] }}" href="#"><img src="/template/img/i-phone.png" alt="I-PHONE"/></a></li>
            <li><a target="_blank" href="{{ $configs['facebook'] }}"><img src="/template/img/i-fb.png" alt="I-FB"/></a></li>
        </ul>

        <ul class="list-inline visible-xs-block">
            <li><a href="mailto:{{ $configs['email'] }}"><img src="/template/img/i-black-address.png" alt="I-ENVELOPE"/></a></li>
            <li><a href="mailto:{{ $configs['email'] }}"><img src="/template/img/i-black-envelop.png" alt="I-POINT"/></a></li>
            <li><a href="{{ $configs['youtube'] }}"><img src="/template/img/i-black-youtube.png" alt="I-PHONE"/></a></li>
            <li><a href="{{ $configs['facebook'] }}"><img src="/template/img/i-black-facebook.png" alt="I-PHONE"/></a></li>
            <li><a href="{{ $configs['phone'] }}"><img src="/template/img/i-black-phone.png" alt="I-FB"/></a></li>
        </ul>
    </div>
</div><!-- /#footer -->
<div id="bottom" class="clear"></div><!-- /#bottom -->
