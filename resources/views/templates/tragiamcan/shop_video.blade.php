@extends(SITE_THEME.'.shop_layout')

@section('main')
    @php
        $videos = \App\Models\Video::where('status', 1)->get()

    @endphp
    <div class="auto">
        <div class="list">
            <div class=" content_left" style="width:100%;">
                <div class="title_dm"><h1 class="title_h1 name post-title entry-title" itemprop="itemReviewed"
                                          itemscope="" itemtype="http://schema.org/Thing"><a href="{{ \Request::fullUrl() }}"
                                                                                             title="Video"><span
                                    itemprop="name">Video</span></a><br><span class="border"></span></h1></div>
                <div class="page_text">
                </div>
                <div class="box_video">
                    <div class="wrap_all">
                        @if (!empty($videos))
                            @foreach ($videos as $key => $video)
                                <div class="left story_video">
                                    <div class="story_thumb"><a
                                                href="{{route('videoDetail', ['name' => Helper::strToUrl($video->title), 'id' => $video->id])}}"
                                                title="{{ $video->title }}"><img
                                                    src="{{ asset(PATH_FILE.'') }}/{{ $video->image }}"
                                                    alt="{{ $video->title }}"></a></div>
                                    <div class="left story_title">
                                        <a class="fancybox" href="{{route('videoDetail', ['name' => Helper::strToUrl($video->title), 'id' => $video->id])}}"
                                           title="{{ $video->title }}">{{ $video->title }}</a>
                                    </div>

                                    <div class="clr"></div>
                                </div>
                            @endforeach
                        @endif
                        <div class="clr"></div>
                    </div>

                </div>
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
