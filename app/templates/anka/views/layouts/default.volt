<!DOCTYPE html>
<html>
    <head>
        <title>{% block title %}{% endblock %}</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/skin/anka/css/core.css" media="all"/>
        <script type="text/javascript" src="/skin/anka/js/jquery-1.11.2.min.js"></script>
        {%- block head -%}
        {%- endblock -%}
    </head>
    <body class="{%- block bodyclass -%}{%- endblock -%}" data-base-url="{{ url() }}" data-debug="">
        <div class="wrap-all">
            <div class="wrap-header">
                <div id="header" class="container">
                    <div class="left">
                        <span class="icon hotline left"></span>
                        Hotline: <span class="strong organce">(08) 37 763 763</span>
                    </div>
                    <div class="right">
                        <?php if (!isset($current_user)) { ?>
                            <span class="border-left-gray"><a href="{{ url('/session/start') }}">Đăng nhập</a></span>
                            <span class="border-left-gray"><a href="{{ url('/register') }}">Đăng ký</a></span>
                        <?php } else { ?>
                            <span class="border-left-gray"><a href="{{ url('/session/end') }}"><?php echo $current_user['name']; ?> Đăng xuất</a></span>
                            <?php if (Custom\MyTags::isAllowed($current_user['role'], 'admin', 'index')) { ?>
                                <span class="border-left-gray"><a href="{{ url('/admin') }}">Admin</a></span>
                            <?php } ?>

                        <?php } ?>
                        <span class="border-left-gray"><a href="#"><span class="icon cart"></span></a></span>
                        <!--<span class="border-left-gray"><a href="#"><span class="icon search"></span></a></span>-->
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="wrap-menu">
                <div class="container main-menu">
                    <a href="{{url()}}" class="logo" title="Anka Milk"><img alt="Anka Milk" src="/skin/anka/images/anka-logo.png" /><h1>Anka Milk</h1></a>
                    <ul class="menu">
                        <li<?php echo ($this->router->getControllerName()=='about'?' class="active"':'');?>><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
                        <li><a href="san-pham.html">Sản phẩm</a></li>
                        <li><a href="traceability.html">Truy xuất nguồn gốc</a></li>
                        <li><a href="anka-irish-farm.html">Trang Trại xanh Anka Ireland</a></li>
                        <li<?php echo ($this->router->getControllerName()=='faq'?' class="active"':'');?>><a href="{{url('tu-van')}}">Tư vấn</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            {%- block content -%}
            {%- endblock -%}
            <div class="clear"></div>
            <div class="footer">
                <div class="container">
                    <div class="wrap-content">
                        <div class="col5 visible-animation">
                            <h3>Truy xuất nguồn gốc</h3>
                            <ul>
                                <li><a href="#">Quy trình</a></li>
                                <li><a href="#">Truy xuất nguồn gốc</a></li>
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
                                <li>Hotline: <span class="strong">(08) 37 763 763</span></li>
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
                            Hotline: (08) 37 763 763
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
        <link rel="stylesheet" href="/skin/anka/css/fm.scrollator.jquery.css" media="all"/>
        <script type="text/javascript" src="/skin/anka/js/fm.scrollator.jquery.js"></script>        
        <script src="/skin/anka/js/common.js"></script>             
        {%- block footscript -%}
        {%- endblock -%}
    </body>
</html>