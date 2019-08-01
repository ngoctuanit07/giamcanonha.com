@extends(SITE_THEME.'.shop_layout')

@section('main')
    <div class="list">
        <div class="auto">
            @yield('breadcrumb')
            <div class="left content_left">
                {!! $news_currently->content !!}
            </div>
            <div class="right content_right">
                <div class="title_r"><h2><a href="/gioithieu.html" title="Về Matxi S.G">Về
                            Giảm Cân Ở Nhà</a></h2></div>
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
            <div class="clr"></div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="derectory">
        <div class="auto">
            <div class="top_link">
                <a rel="nofollow" href="{{ route('home') }}" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i> </a><a
                        href="{{ route('daily') }}" class="active">{{ $title }}</a> <span class="bg_span"></span>
            </div>
        </div>
    </div>
@endsection
