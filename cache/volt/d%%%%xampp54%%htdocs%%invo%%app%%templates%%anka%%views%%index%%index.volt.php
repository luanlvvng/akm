<!DOCTYPE html>
<html>
    <head>
        <title>Trang chủ</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/skin/anka/css/core.css" media="all" />
        <link rel="stylesheet" href="/skin/anka/css/fm.scrollator.jquery.css" media="all"/>
        <script type="text/javascript" src="/skin/anka/js/jquery-1.11.2.min.js"></script></head>
    <body class="homepage " data-base-url="<?php echo $this->url->get(); ?>" data-debug="">
        <div id="wrap-all">
            <div id="wrap-header">
                <div id="header" class="container">
                    <div class="left">
                        <span class="icon hotline left"></span>
                        Hotline: <span class="strong organce">(08) 38 483 483</span>
                    </div>
                    <div class="right">
                        <?php if (!isset($current_user)) { ?>
                            <span class="border-left-gray"><a href="<?php echo $this->url->get('/session/start'); ?>">Đăng nhập</a></span>
                            <span class="border-left-gray"><a href="<?php echo $this->url->get('/register'); ?>">Đăng ký</a></span>
                        <?php } else { ?>
                            <span class="border-left-gray"><a href="<?php echo $this->url->get('/session/end'); ?>"><?php echo $current_user['name']; ?> Đăng xuất</a></span>
                            <?php if (Custom\MyTags::isAllowed($current_user['role'], 'admin', 'index')) { ?>
                                <span class="border-left-gray"><a href="<?php echo $this->url->get('/admin'); ?>">Admin</a></span>
                            <?php } ?>

                        <?php } ?>
                        <span class="border-left-gray"><a href="#"><span class="icon cart"></span></a></span>
                        <span class="border-left-gray"><a href="#"><span class="icon search"></span></a></span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="wrap-menu">
                <div class="container main-menu">
                    <a href="<?php echo $this->url->get(); ?>" class="logo" title="Anka Milk"><img alt="Anka Milk" src="/skin/anka/images/anka-logo.png" /><h1>Anka Milk</h1></a>
                    <ul class="menu">
                        <li><a href="<?php echo $this->url->get('gioi-thieu'); ?>">Giới thiệu</a></li>
                        <li><a href="san-pham.html">Sản phẩm</a></li>
                        <li><a href="traceability.html">Traceability</a></li>
                        <li><a href="anka-irish-farm.html">Anka irish farm</a></li>
                        <li><a href="<?php echo $this->url->get('tu-van-cung-chuyen-gia'); ?>">Tư vấn cùng chuyên gia</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <?php echo $this->flash->output(); ?>
<div class="container">
    <div class="slider1">
        <div id="slider1_container_homepage">
            <div u="slides" class="slider">
                <div>
                    <div class="slide1">
                        <div class="caption">
                            <h2 class="title-banner">Lần đầu tiên tại Việt Nam,<br />
                                Bạn có thể truy xuất nguồn gốc<br />sản phẩm đang sử dụng
                            </h2>
                            <div class="button1 button"><a href="#">Xem thông tin</a></div>
                        </div>
                        <img src="/skin/anka/images/banner1.jpg" alt="Anka Milk" class="banner"/>
                    </div>
                </div>
                <div>
                    <div class="slide2">
                        <div class="caption">
                            <h2 class="title-banner">Công thức vàng với<br />
                                Geni-IQ126<sup>TM</sup><br />
                                hỗ trợ trí não và thị giác<br />
                                phát triển vượt trội  
                            </h2>
                            <div class="button1 button"><a href="#">Tìm hiểu thêm</a></div>
                            <div class="italic">Có trong sản phẩm Anka Gold IQ</div>
                        </div>
                        <img src="/skin/anka/images/banner2.jpg" />
                    </div>
                </div>
            </div>
            <div u="navigator" class="bullet">
                <div u="prototype"></div>
            </div>
            <span u="arrowleft" class="jssora21l" style=""><span class="arrow"></span></span>
            <span u="arrowright" class="jssora21r" style=""><span class="arrow"></span></span>
        </div>
    </div>
    <div class="clear"></div>
    <div class="quytrinhsx">
        <div class="wrap-content">
            <div class="block-content visible-animation">
                <h2 class="block-title">Quy trình sản xuất</h2>
                Hãng sản xuất: Anka<br />Công dụng: Bồi dưỡng sức khỏe, Tăng cân, Bổ sung vi chất, Tăng trưởng cơ thể
                <div class="button2 button"><a href="#">Khám phá thêm</a></div>
            </div>
            <div class="cow-element hide-text"><h3>Bò sữa trang trại sữa Anka</h3></div>
            <div class="famer-element hide-text"><h3>Người nông dân trang trại sữa Anka</h3></div>
        </div>
    </div>
    <div class="content2">
        <div class="slide3 wrap-content visible-animation">
            <div class="caption">
                <h2 class="block-title">Khám phá sản phẩm Anka</h2>
                <div class="content-product" id="anka-milk-1">
                    <h2 class="title-product">Anka Gold IQ</h2>
                    Công dụng: Bồi dưỡng sức khỏe, Tăng cân,<br />Bổ sung vi chất, Tăng trưởng cơ thể
                    <div class="button2 button"><a href="#">Xem thêm</a></div>
                </div>
                <div class="content-product" id="anka-milk-2" style="display: none;">
                    <h2 class="title-product">Anka Gold Grow</h2>
                    Công dụng: Bồi dưỡng sức khỏe, Tăng cân,<br />Bổ sung vi chất, Tăng trưởng cơ thể
                    <div class="button2 button"><a href="#">Xem thêm</a></div>
                </div>
            </div>
            <div class="img-product">
                <ul id="boutique">
                    <li>
                        <a href="#anka-milk-1">
                            <img src="/skin/anka/images/sp1.png" alt="Anka Grow" />
                        </a>
                    </li>
                    <li>
                        <a href="#anka-milk-2">
                            <img src="/skin/anka/images/sp2.png" alt="Anka IQ" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="next"><a href="#" onclick="boutique_next();
                    return false">Tiếp</a></div>
        </div>
    </div>
    <div class="content3">
        <div class="wrap-content visible-animation">
            <div class="caption">
                <h2 class="block-title">Tư vấn cùng chuyên gia</h2>
                Tham gia tư vấn trực tiếp từ các chuyên gia hàng đầu về dinh dưỡng
                <div class="button2 button"><a href="#">Hỏi chuyên gia</a></div>
            </div>
            <div class="img-product"></div>
            <div class="next"></div>
        </div>
    </div>
    <div class="content4">
        <div class="wrap-content visible-animation">
            <div class="caption">
                <h2 class="block-title">Câu chuyện Anka</h2>
                Câu chuyện bắt nguồn từ những giọt mưa, từ sự phát triển của cây cỏ<br />
                ra thành quả là những giọt sữa giàu dinh dưỡng...
                <div class="button2 button"><a href="#">Khám phá thêm</a></div>
            </div>
            <div class="img-product"></div>
            <div class="next"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="clear"></div>
            <div class="footer">
                <div class="container">
                    <div class="wrap-content">
                        <div class="col5 visible-animation">
                            <h3>Traceability</h3>
                            <ul>
                                <li><a href="#">From Cow to Can</a></li>
                                <li><a href="#">Traceability</a></li>
                            </ul>
                        </div>
                        <div class="col5 visible-animation">
                            <h3>Sản phẩm</h3>
                            <ul>
                                <li><a href="#">Anka Gold Grow</a></li>
                                <li><a href="#">Anka Gold IQ</a></li>
                            </ul>
                        </div>
                        <div class="col5 visible-animation">
                            <h3>Giới thiệu</h3>
                            <ul>
                                <li><a href="#">Thông điệp từ CEO</a></li>
                                <li><a href="#">Câu chuyện Anka</a></li>
                                <li><a href="#">Đối tác</a></li>
                            </ul>
                        </div>
                        <div class="col5 visible-animation">
                            <h3>Hỗ trợ</h3>
                            <ul>
                                <li><a href="#">Liên hệ Anka</a></li>
                                <li>Hotline: <span class="strong">(08) 38 483 483</span></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                                <li><a href="#">Tìm kiếm</a></li>
                            </ul>
                        </div>                
                        <div class="col5 visible-animation">
                            <h3>Kết nối & Liên hệ</h3>
                            <p class="strong">Anka Milk</p>
                            Tòa nhà Sunrise Tower<br />
                            Tháp 5, TPHCM<br />
                            ______<br />
                            Hotline: (08) 35 483 483
                        </div>
                        <div class="clear" style="height: 26px;"></div>
                        <a href="#" title="Anka Milk trên Facebook"><span class="icon facebook"></span></a>
                        <a href="#" title="Anka Milk trên Youtube"><span class="icon youtube"></span></a>
                    </div>
                    <div class="clear" style="height: 26px;"></div>
                    <div class="bt-top"><a href="#top" id="bt-top" title="Lên trên cùng">&nbsp;</a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>        
        <link rel="stylesheet" href="/skin/anka/css/styles.css" media="all"/>

        <script type="text/javascript" src="/skin/anka/js/fm.scrollator.jquery.js"></script>
        <script src="/skin/anka/js/common.js"></script>
        <script src="/skin/anka/js/extension.js"></script><script src="/skin/anka/js/jssor.slider.min.js"></script>
<script src="/skin/anka/js/jquery.boutique.js"></script>
<script>
                jQuery(document).ready(function () {
                    var options = {
                        $AutoPlay: true,
                        $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$,
                        },
                        $SlideDuration: 500,
                        $AutoPlayInterval: 10000,
                        $AutoCenter: 1,
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $ChanceToShow: 2
                        }
                    };
                    var jssor_slider1 = new $JssorSlider$('slider1_container_homepage', options);

                    $('#boutique').boutique({
                        autoplay: true,
                        back_opacity: 1,
                        front_img_width: 314,
                        front_img_height: 274,
                        front_topmargin: 0,
                        frames: 3,
                        hovergrowth: 0,
                        behind_topmargin: 20,
                        back_topmargin: 50,
                        behind_opacity: 1,
                        behind_size: 0.8,
                        variable_container_height: true
                    });
                });
                function pre_move_callback(anchor) {
                    $('.content-product').hide();
                    $(anchor).show();
                }
</script></body>
</html>