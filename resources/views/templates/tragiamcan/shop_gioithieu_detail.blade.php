@extends(SITE_THEME.'.shop_layout')

@section('main')

    <div class="auto">
        <div class="list">
            <div class="left content_left">
                <div class="detail_news">
                    <div class="title_list">
                        <div class="title_dm"><h1 class="title_h1 name post-title entry-title" itemprop="itemReviewed"
                                                  itemscope="" itemtype="http://schema.org/Thing"><a
                                        href="$"><span
                                            itemprop="name">{!! $news_currently->title !!}</span><br/></a><span
                                        class="border"></span></h1></div>

                        <div class="date">
                            <span class=""></span><i class="fa fa-clock-o" aria-hidden="true"></i>
                            &nbsp;<span>{!! $news_currently->created_at !!}</span>
                            <span class="">&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"
                                                                aria-hidden="true"></i> &nbsp;2247</span>
                            <div class="clr"></div>
                        </div>
                        <div class="page_text">
                            {!! $news_currently->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="right content_right">
                <div class="title_r"><h2><a href="{{route('gioithieu')}}" title="Về Matxi S.G">Về
                            Matxi Lâm Đồng</a></h2></div>
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
        </div>
    </div>
@endsection
@section('breadcrumb')
    <div class="derectory">
        <div class="auto">
            <div class="top_link">
                <a rel="nofollow" href="{{ route('home') }}" title="Trang chủ"><i class="fa fa-home"
                                                                                  aria-hidden="true"></i> </a><a
                        class="active">{{ $title }}</a> <span class="bg_span"></span>
            </div>
        </div>
    </div>
@endsection
