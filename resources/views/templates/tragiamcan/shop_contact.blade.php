@extends(SITE_THEME.'.shop_layout')

@section('main')
    <div class="auto">
        <div class="list">
            @yield('breadcrumb')
            <div class="left content_left">
                <div class="title_dm"><h1 class="title_h1 name post-title entry-title" itemprop="itemReviewed" itemscope=""
                                          itemtype="http://schema.org/Thing"><a href="/Lien-he/" title="Liên hệ"><span
                                    itemprop="name">Liên hệ</span></a><br/><span class="border"></span></h1></div>
                <div class="list_contact">
                    <div class="left contact_left">
                        <div class="page_text">
                            <h3><span style="font-size:16px; text-transform: uppercase;">giảm cân ở nhà</span></h3>

                            <p>{{ trans('language.shop_info.address') }}: {{ $configsGlobal['address'] }}</p>
                            <p>Hotline (24/7):&nbsp;<a href="tel:{{ $configsGlobal['long_phone'] }}">{{ $configsGlobal['long_phone'] }}</a></p>

                            <p>Website:&nbsp;<a href="{{\Request::fullUrl()}}"
                                                style="margin: 0px; padding: 0px; text-decoration-line: none; transition: background 0.5s ease 0s; color: rgb(244, 156, 58);">www.giamcanonha.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="right contact_right" style="margin-top:20px;">
                        <div class="wrap_form">

                            <form class="form_contact" action="{{ route('postContact') }}" method="post">
                                {{ csrf_field() }}
                                <p>Tên của bạn <span>(*)</span></p>
                                <p><input type="text" name="name" value="" required="required"></p>
                                <p>Điện thoại <span>(*)</span></p>
                                <p><input type="text" name="phone" value="" required="required"></p>
                                <p>Địa chỉ email <span>(*)</span></p>
                                <p><input type="text" name="email" value="" required="required"></p>

                                <p>Nội dung <span>(*)</span></p>
                                <p><textarea class="" name="content" maxlength="500"></textarea></p>
                                <p>
                                    <button class="sb_gui">Gửi liên hệ</button>
                                </p>
                            </form>
                            <div class="contact_maps">
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="right content_right">
                <div class="title_r"><h2><a href="{{ route('gioithieu') }}" title="Về Matxi S.G">Về
                            Giảm cân ở nhà</a></h2></div>
                @foreach ($newsList as $newsDetail)
                    <div class="news_right">
                        <div class="story_r">
                            <div class="left thumb"><a
                                        href="{{ $newsDetail->getGioiThieuUrl() }}"><img
                                            src="{{ asset($newsDetail->getThumb()) }}"
                                            alt="{{ $newsDetail->title }}"/></a></div>
                            <div class="title"><a
                                        href="{{ $newsDetail->getGioiThieuUrl() }}">{{ $newsDetail->title }}</a></div>
                            <div class="date">
                                <span class="left"></span><i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{ $newsDetail->created_at }}</span>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@section('breadcrumb')
    <div class="derectory">
        <div class="auto">
            <div class="top_link">
                <a rel="nofollow" href="{{ route('home') }}" title="Trang chủ"><i class="fa fa-home"
                                                                                  aria-hidden="true"></i> </a><a
                        href="{{ route('daily') }}" class="active">{{ $title }}</a> <span class="bg_span"></span>
            </div>
        </div>
    </div>
@endsection
