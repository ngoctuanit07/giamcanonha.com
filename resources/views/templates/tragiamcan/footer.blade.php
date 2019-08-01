<!--Footer-->
<?php
$modelProduct = (new \App\Models\ShopProduct);
$allProduct = $modelProduct->getAllProduct();
?>
<!--Module top footer -->
@isset ($layouts['footer'])
    @foreach ( $layouts['footer']  as $layout)
        @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
            @if ($layout->type =='html')
                {!! $layout->text !!}
            @elseif($layout->type =='view')
                @if (view()->exists('blockView.'.$layout->text))
                    @include('blockView.'.$layout->text)
                @endif
            @elseif($layout->type =='module')
                {!! (new $layout->text)->render() !!}
            @endif
        @endif
    @endforeach
@endisset
<!--//Module top footer -->
<div class="footer">
    <div class="menu_footer">
        <div class="auto">
            <div class="news_foot">
                <div class="title_foot">
                    <h3 class="left title_h3"><a href="{{ route('tintuc') }}" title="Tin tức">Kiến thức làm đẹp</a></h3>
                    <h4 class="right xem_all"><a href="{{ route('tintuc') }}" title="Xem tất cả">Xem tất cả</a></h4>
                    <div class="clr"></div>
                </div>
                <div class="cont_news_f">
                    <div class="wrap_all">

						<?php //print_r(count($news)); die();?>
                        @foreach ($newsTintuc as $newsDetail)
                            <div class="left box_news_f">
                                <div class="thumb"><a href="{{ $newsDetail->getTintucUrl() }}"
                                                      title="{{ $newsDetail->title }}"><img
                                                src="{{ asset($newsDetail->getThumb()) }}"
                                                alt="{{ $newsDetail->title }}"/></a>
                                </div>
                                <div class="story_title"><a href="{{ $newsDetail->getTintucUrl() }}"
                                                            title="{{ $newsDetail->title }}">{{ $newsDetail->title }}</a>
                                </div>
                                <div class="more"><a href="{{ $newsDetail->getTintucUrl() }}"
                                                     title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"
                                                                                  aria-hidden="true"></i></a></div>
                                <div class="clr"></div>
                            </div>
                        @endforeach
                        <div class="clr"></div>
                    </div>
                </div>
            </div>

            <div class="clr"></div>
            <div class="foot2">
                <div class="wrap_all">
                    <div class="left foot_col">
                        <h3 class="title">Bản đồ</h3>
                        <div class="foot_maps">
                            <p>
                                <iframe frameborder="0" height="210" scrolling="no"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d977.8282773426188!2d107.53611595626194!3d11.384789568900814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317471afc058e1b1%3A0x2b13bab331ca8f47!2zQsO5aSBUaOG7iyBYdcOibiwgdHQuIE1hIMSQYSBHdWksIMSQ4bqhIEh1b2FpLCBMw6JtIMSQ4buTbmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1559652723413!5m2!1svi!2s"
                                        style="border:0" width="100%"></iframe>
                            </p>
                        </div>
                    </div>
                    <div class="left foot_col">
                        <h3 class="title title_dk" style="text-align: center">Nhận thông tin khuyến mãi</h3>
                        <div class="dangky_tt">
                            <form action="{{ route('subscribe') }}" method="post">
                                @csrf
                                <input type="email" name="subscribe_email" class="text_email"
                                       placeholder="{{ trans('language.subscribe.subscribe_email') }}"
                                       required="required"/>
                                <div class="clr"></div>
                                <button type="submit" class="submit_dk">Đăng ký</button>
                            </form>
                            <div class="text_dk">
                                <p>Ch&uacute;ng t&ocirc;i sẽ gửi c&aacute;c chương tr&igrave;nh Khuyến m&atilde;i, ưu đ&atilde;i
                                    giảm gi&aacute;, tri &acirc;n kh&aacute;ch h&agrave;ng th&acirc;n thiết v&agrave;
                                    giới thiệu sản phẩm mới tới Email của bạn.</p>
                            </div>
                        </div>
                    </div>

                    <div class="left foot_col">
                        <h3 class="title">Facebook</h3>
                        <div class="foot_facebook">
                            <div class="fanpage" style="margin-top:0px;">

                                <div class="fb-like-box"
                                     data-href="https://www.facebook.com/giamcanonha/"
                                     data-width="347" data-height="262" data-colorscheme="light" data-show-faces="true"
                                     data-header="true" data-stream="false" data-show-border="true"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="foot2 foot3">
                <div class="wrap_all">
                    <div class="left foot_col">
                        <h3 class="title">Hỗ trợ khách hàng</h3>
                        <div class="dm_foot">
                            <ul>
                                <li style="width:100%;"><a href="#"><i class="fa fa-check-square"
                                                                       aria-hidden="true"></i> Chính sách đổi trả</a>
                                </li>
                                <li style="width:100%;"><a href="#"><i class="fa fa-check-square"
                                                                       aria-hidden="true"></i> Chính sách bảo hành</a>
                                </li>
                                <li style="width:100%;"><a href="#"><i class="fa fa-check-square"
                                                                       aria-hidden="true"></i> Mua online và thanh toán</a>
                                </li>

                            </ul>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <div class="left foot_col">
                        <h3 class="title">Danh mục</h3>
                        <div class="dm_foot">
                            <ul>
                                <li><a rel="nofollow" href="{{ route('tintuc') }}" title="Tin tức"> <i
                                                class="fa fa-check-square"
                                                aria-hidden="true"></i>
                                        <span>Tin tức</span></a></li>
                                <li><a rel="nofollow" href="{{ route('chinhsach') }}" title="Chính sách"> <i
                                                class="fa fa-check-square" aria-hidden="true"></i>
                                        <span>Chính sách</span></a></li>
                                <li><a rel="nofollow" href="{{ route('daily') }}" title="Tuyển sỉ, đại lý"> <i
                                                class="fa fa-check-square" aria-hidden="true"></i> <span>Tuyển sỉ, đại lý</span></a>
                                </li>
                            </ul>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <div class="left foot_col">
                        <h3 class="title">Thông tin</h3>
                        <div class="thongtin_f">
                            <h3><span style="font-size:16px; text-transform: uppercase;">giảm cân ở nhà</span></h3>

                            <p>{{ trans('language.shop_info.address') }}: {{ $configsGlobal['address'] }}</p>
                            <p>Hotline (24/7):&nbsp;<a
                                        href="tel:{{ $configsGlobal['long_phone'] }}">{{ $configsGlobal['long_phone'] }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="clr"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="auto">
            <div class="copy left">
                <p>&copy; Copyright 2019 All rights reserved. By <a href="{{\Request::fullUrl()}}"><span
                                style="color:#FFFFFF;text-transform: uppercase;">Giảm cân ở nhà</span></a></p>
                <style type="text/css">
                    .lik a {
                        color: #FFF;
                    }

                    .lik h2, .lik p {
                        display: inline;
                        font-family: OpensansR;
                        font-size: 12px;
                    }
                </style>

                <div class="lik">


                </div>
            </div>
            <div class="right" style="font-size:12px;">
                <p>(*) Kết quả tùy thuộc vào cơ địa của mỗi người</p>
                <p>(*) Thực phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh</p>
            </div>
            <div class="clr"></div>
        </div>
    </div>

</div>
<div id="test-popup" class="white-popup mfp-hide">
    <div class="title_dh">
        <h3 style="margin-top:5px;">Form đặt hàng nhanh</h3>
    </div>

    <div class="form_dh">
        <form action="{{route('order') }}" method="post">
            @csrf
            <p style="display: none;"><input type="text" name="url" value="{{\Request::fullUrl()}}"
                                             required="required"/></p>
            <p style="text-align: center;margin-bottom:20px;color:#f00;"><b>----> Đặt Online nhận ƯU ĐÃI <----</b></p>
            <p style="text-align: center;margin-bottom:20px;color:#f00;">Chuyên viên tư vấn sẽ xác nhận sau khi bạn đặt
                hàng</p>
            <p>
                <select class="select_sl" name="congty" required="required">
                    @foreach($allProduct as $product)
                        <option value="{{$product->name ? $product->name : ''}}">{{$product->name ? $product->name : ''}}</option>
                    @endforeach


                </select>
            </p>
            <p>
                <select class="select_sl" name="soluong" required="required">
                    <option value="">Chọn số lượng</option>
                    <option value="1 hộp">1 hộp</option>
                    <option value="2 hộp">2 hộp</option>
                    <option value="3 hộp">3 hộp</option>
                    <option value="4 hộp">4 hộp</option>
                    <option value="5 hộp0">5 hộp</option>
                    <option value="> 5 hộp"> > 5 hộp</option>
                </select>
            </p>
            <p><input type="text" name="hoten" placeholder="Họ và tên" class="text_dh" required="required"/></p>
            <p><input type="text" name="dienthoai" placeholder="Điện thoại" class="text_dh" required="required"/></p>
            <p><input type="text" name="diachi" placeholder="Địa chỉ" class="text_dh" required="required"/></p>
            <p><input type="email" name="email" placeholder="Email" class="text_dh" required="required"/></p>
            <p><textarea name="noidung" placeholder="Ghi chú: (thời gian giao hàng hoặc số lượng > 5)"
                         maxlength="500"></textarea></p>
            <p>
                <button type="submit"><i class="fa fa-cart-arrow-down"></i> Đặt hàng</button>
            </p>
            <p style="text-align: center;margin-top:10px;color:#f00;font-style: italic">Giao hàng miễn phí toàn quốc</p>
        </form>
    </div>
</div>


<div class="icon_mua">

    <a href="tel:{{ $configsGlobal['long_phone'] }}" class="bt_phone"><i class="fa fa-phone"></i><span
                class="sdt">&nbsp;&nbsp;{{ $configsGlobal['long_phone'] }}</span></a>
    <a href="#test-popup" class="open-popup-link bt_mua" title="Mua ngay"><i class="fa fa-cart-arrow-down"></i> &nbsp;Mua
        free ship</a>

    <div class="clr"></div>
</div>
<div class="icon_zalo">
    <a href="https://zalo.me/0948068327"><img src="{{ asset(SITE_THEME_ASSET.'/images/icon-zalo.png')}}"
                                              alt="icon zalo"/> </a>
</div>
<script src="{{ asset(SITE_THEME_ASSET.'/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>

<script src="{{ asset(SITE_THEME_ASSET.'/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset(SITE_THEME_ASSET.'/js/bootstrap.min.js')}}"></script>
<script src="{{ asset(SITE_THEME_ASSET.'/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset(SITE_THEME_ASSET.'/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset(SITE_THEME_ASSET.'/js/main.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>
<script type='text/javascript' src='{{ asset(SITE_THEME_ASSET.'/js/global.js')}}'></script>


<script src="{{ asset(SITE_THEME_ASSET.'/js/skdslider.js')}}" type="text/javascript"></script>

<script src="{{ asset(SITE_THEME_ASSET.'/js/flaunt.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>


<!--<script type='text/javascript' src='--><!--public/js/jquery.js'></script>-->
<!--<script type='text/javascript' src='--><!--public/js/jquery-migrate.min.js'></script>-->


<script type='text/javascript' src='{{ asset(SITE_THEME_ASSET.'/js/owl.carousel.min.js')}}'></script>
<script type='text/javascript' src='{{ asset(SITE_THEME_ASSET.'/js/isotope-docs.min.js')}}'></script>


<!--popup dat hang-->
<!--<script type="text/javascript" src="--><!--public/js/jquery-2.2.4.min.js"></script>-->
<script type="text/javascript" src="{{ asset(SITE_THEME_ASSET.'/js/jquery.magnific-popup.min.js')}}"></script>

<!--//Footer-->
