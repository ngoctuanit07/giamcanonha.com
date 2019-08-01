@extends(SITE_THEME.'.shop_layout')

@section('main')
    <div class="auto">
        <div class="list">
            <div class="left content_left">
                <div class="title_dm"><h1 class="title_h1 name post-title entry-title" itemprop="itemReviewed"
                                          itemscope="" itemtype="http://schema.org/Thing"><a
                                href="{{ \Request::fullUrl() }}"
                                title="Về Matxi S.G"><span
                                    itemprop="name">Về giảm cân ở nhà</span></a><br/><span class="border"></span></h1>
                </div>
                <div class="page_text">
                </div>
                <div class="list_news">
                    <div class="wrap_all">
                        @foreach ($newsTintuc as $newsDetail)
                            <div class="left story_news">

                                <div class="story_thumb">
                                    <a href="{{ $newsDetail->getTintucUrl() }}"
                                       title="{{ $newsDetail->title }}"><img
                                                src="{{ asset($newsDetail->getThumb()) }}"
                                                alt="Bảo hiểm trách nhiệm trà golean lên đến 1 triệu USD"></a>
                                </div>
                                <div class="story_title">
                                    <a href="{{ $newsDetail->getTintucUrl() }}"
                                       title="{{ $newsDetail->title }}">{{ $newsDetail->title }}</a>
                                </div>
                                <div class="date">
                                    <span class="left"></span><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>{{ $newsDetail->created_at }}</span>
                                    <div class="clr"></div>
                                </div>
                                <p class="clr"></p>
                            </div>
                        @endforeach
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="right content_right">
                <div class="title_r"><h2><a href="{{ \Request::fullUrl() }}" title="Về
                           Giảm Cân Ở Nhà">Về
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
                                <span class="left"></span><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span>{{ $newsDetail->created_at }}</span>
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

                <a rel="nofollow" href="{{ route('home') }}" title="Trang chủ"><i class="fa fa-home"
                                                                                  aria-hidden="true"></i> </a><a
                        href="{{ route('gioithieu') }}" class="active">{{ $title }}</a> <span class="bg_span"></span>
            </div>
        </div>
    </div>

@endsection
