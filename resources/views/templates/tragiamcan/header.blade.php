@if(\Request::fullUrl() === "https://www.giamcanonha.com")
    <div class="wrap_header">
        <div class="menu_pc">
            <div class="all_header">
                <div class="wrap_menu  ">
                    <div class="auto">
                        <div class="left logo"><a href="/"><img
                                        src="{{ asset(SITE_THEME_ASSET.'/images/1543500805-Phan-Phoi-Tra-Giam-Can-Golean-Detox-Tai-Ha-Noi.png')}}"
                                        alt="Tra-Golean-Matxi-SG-Tra-Giam-Can-Tai-Ha-Noi"/></a></div>

                        <div class="right menu-right">
                            <nav class="nav">
                                <div class="number_home number_mobile"><a href="tel:0948068327"><i class="fa fa-phone"
                                                                                                     aria-hidden="true"></i>
                                        0948068327</a></div>
                                <div class="right textmn"></div>
                                <ul class="nav-list">
                                    <li class="nav-item {{ \Request::fullUrl() == route('gioithieu')? 'active' : ''  }} "><a class="" href="{{route('gioithieu')}}"
                                                             title="Về Matxi S.G">Về Matxi
                                            Lâm đồng</a>
                                    </li>
                                    <li class="nav-item {{ \Request::fullUrl() == route('chinhsach')? 'active' : ''  }}"><a class="" href="{{route('chinhsach')}}"
                                                            title="Chính sách">Chính sách
                                        </a>
                                    </li>
                                    <li class="nav-item {{ \Request::fullUrl() == route('daily')? 'active' : ''  }}"><a class="" href="{{route('daily')}}"
                                                            title="Tuyển sỉ, đại lý">Tuyển
                                            sỉ, đại lý
                                        </a>
                                    </li>
                                    <li class="nav-item {{ \Request::fullUrl() == route('tintuc')? 'active' : ''  }}"><a class="" href="{{route('tintuc')}}"
                                                                                                                        title="tin tức">Kiến thức làm đẹp
                                        </a>
                                    </li>
                                    <li class="nav-item {{ \Request::fullUrl() == route('video')? 'active' : ''  }}"><a class="" href="{{route('video')}}"
                                                                                                                         title="Video">Video
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item "><a class="" href="/Meo-giam-can/" title="Mẹo giảm cân">Mẹo
                                             giảm cân
                                         </a>
                                     </li>
                                     <li class="nav-item "><a class="" href="/Video/" title="Video">Video
                                         </a>
                                     </li>-->
                                    @if (!empty($layoutsUrl['menu']))
                                        @foreach ($layoutsUrl['menu'] as $url)
                                            <li class="nav-item "><a
                                                        {{ ($url->target =='_blank')?'target=_blank':''  }} href="{{ url($url->url) }}">{{ trans($url->name) }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>

                        <div class="clr"></div>
                    </div>

                </div>
            </div>
            <div class="auto">
                <div class="form_dathang">
                    <h2 class="title">GOLEAN MATXI S.G TẠI LÂM ĐỒNG</h2>
                    <p class="slo">AN TOÀN TUYỆT ĐỐI - HIỆU QUẢ BẤT NGỜ</p>
                    <div class="box_h">
                        <div class="left">
                            <p><i class="fa fa-check-square" aria-hidden="true"></i> Giảm cân, tiêu tan mỡ</p>
                            <p><i class="fa fa-check-square" aria-hidden="true"></i> Đào thải độc tố</p>
                            <p><i class="fa fa-check-square" aria-hidden="true"></i> Da đẹp, dáng xinh</p>
                            <p><i class="fa fa-check-square" aria-hidden="true"></i> Phòng ngừa bệnh tật</p>
                            <p><i class="fa fa-check-square" aria-hidden="true"></i> Lợi sữa với sau sinh</p>

                        </div>
                        <div class="right">
                            <p><i class="fa fa-times" aria-hidden="true"></i> Không có tác dụng phụ</p>
                            <p><i class="fa fa-times" aria-hidden="true"></i> Không gây mệt mỏi</p>
                            <p><i class="fa fa-times" aria-hidden="true"></i> Không cần ăn kiêng</p>
                            <p><i class="fa fa-times" aria-hidden="true"></i> Không cần tập thể dục</p>
                            <p><i class="fa fa-times" aria-hidden="true"></i> Không tăng cân trở lại</p>

                        </div>

                        <div class="clr"></div>
                    </div>
                    <div class="buton_dathang">
                        <a href="tel:{{ $configsGlobal['long_phone'] }}" class="bt_mua" title="Đặt hàng"><i
                                    class="fa fa-phone"
                                    aria-hidden="true"> &nbsp;&nbsp;</i>{{ $configsGlobal['long_phone'] }}</a>
                        <a href="#test-popup" class="open-popup-link bt_mua" title="Đặt hàng"><i
                                    class="fa fa-cart-arrow-down"></i> &nbsp;Đặt hàng</a>

                    </div>

                    <div class="box_camket">
                        <h2 class="title">BẢO VỆ QUYỀN LỢI NGƯỜI TIÊU DÙNG</h2>
                        <p><i class="fa fa-check-square"></i> Thông tin mới trách nhiệm sản phẩm tại <a
                                    href="https://www.giamcanonha.com/gioithieu/bao-hiem-trach-nhiem-tra-golean-len-den-1-trieu-usd_13.html">đây</a>
                        </p>
                        <p><i class="fa fa-check-square"></i> Cập nhật mẫu mã hàng mới nhất tại <a
                                    href="https://www.giamcanonha.com/gioithieu/nhan-biet-hang-moi-nhat-tra-giam-can-golean_7.html">đây</a>
                        </p>
                        <p><i class="fa fa-check-square"></i> Cách nhận biết hàng chính hãng tại <a
                                    href="https://www.giamcanonha.com/gioithieu/phan-biet-hang-chinh-hang-that-gia-tra-golean_8.html">đây</a>
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </div>
@else
    <div class="all_header">
        <div class="wrap_menu  background_mn">
            <div class="auto">
                <div class="left logo"><a href="/"><img
                                src="{{ asset(SITE_THEME_ASSET.'/images/1543500805-Phan-Phoi-Tra-Giam-Can-Golean-Detox-Tai-Ha-Noi.png')}}"
                                alt="Tra-Golean-Matxi-SG-Tra-Giam-Can-Tai-Ha-Noi"/></a></div>

                <div class="right menu-right">
                    <nav class="nav">
                        <div class="number_home number_mobile"><a href="tel:{{ $configsGlobal['long_phone'] }}"><i
                                        class="fa fa-phone"
                                        aria-hidden="true"></i> {{ $configsGlobal['long_phone'] }}0</a></div>
                        <div class="right textmn"></div>
                        <ul class="nav-list">
                            <li class="nav-item {{ \Request::fullUrl() == route('gioithieu')? 'active' : ''  }} "><a class="" href="{{route('gioithieu')}}" title="Về Matxi S.G">Về
                                    Matxi
                                    Lâm đồng</a>
                            </li>
                            <li class="nav-item {{ \Request::fullUrl() == route('chinhsach')? 'active' : ''  }}"><a class="" href="{{route('chinhsach')}}"
                                                    title="Chính sách">Chính sách
                                </a>
                            </li>
                            <li class="nav-item {{ \Request::fullUrl() == route('daily')? 'active' : ''  }} "><a class="" href="{{route('daily')}}"
                                                    title="Tuyển sỉ, đại lý">Tuyển
                                    sỉ, đại lý
                                </a>
                            </li>
                            <li class="nav-item {{ \Request::fullUrl() == route('tintuc')? 'active' : ''  }} "><a class="" href="{{route('tintuc')}}"
                                                                                                                 title="Tuyển sỉ, đại lý">Kiến thức làm đẹp
                                </a>
                            </li>
                            <li class="nav-item {{ \Request::fullUrl() == route('video')? 'active' : ''  }}"><a class="" href="{{route('video')}}"
                                                                                                                title="Video">Video
                                </a>
                            </li>
                            <!-- <li class="nav-item "><a class="" href="/Meo-giam-can/" title="Mẹo giảm cân">Mẹo
                                     giảm cân
                                 </a>
                             </li>
                             <li class="nav-item "><a class="" href="/Video/" title="Video">Video
                                 </a>
                             </li>-->
                            @if (!empty($layoutsUrl['menu']))
                                @foreach ($layoutsUrl['menu'] as $url)
                                    <li class="nav-item "><a
                                                {{ ($url->target =='_blank')?'target=_blank':''  }} href="{{ url($url->url) }}">{{ trans($url->name) }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </nav>
                </div>

                <div class="clr"></div>
            </div>

        </div>
    </div>

@endif;

