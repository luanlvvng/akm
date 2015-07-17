<!DOCTYPE html>
<html>
    <head>
        <title><?php echo 'Câu hỏi thường gặp'; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/skin/anka/css/core.css" media="all" />
        <link rel="stylesheet" href="/skin/anka/css/fm.scrollator.jquery.css" media="all"/>
        <script type="text/javascript" src="/skin/anka/js/jquery-1.11.2.min.js"></script></head>
    <body class="support-listing " data-base-url="<?php echo $this->url->get(); ?>" data-debug="">
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
<div class="main-content">
    <div class="wrap-content">

        <h1 class="main-title">
            Câu hỏi thường gặp
        </h1>
        <div class="wrap-content top">
            <div class="left">
                <a href="#" class="left-i active">
                    <img src="/skin/anka/images/anka-expert-small.png" alt="">
                    <div class="text">Chuyên gia dinh dưỡng</div>
                </a>
                <a href="#" class="left-i">
                    <img src="/skin/anka/images/anka-milk.png" alt="">
                    <div class="text">Về sản phẩm</div>
                </a>
            </div>
            <div class="right">
                <div class="article-content">
                    <?php
                    if ($faq['question']) {
                        $link = $this->url->get(array('for' => 'faq-view', 'slug' => $faq['slug'], 'id' => $faq['id']));
                        ?>
                        <h2 class="title"><?php echo $faq['question']; ?></h2>
                        <div class="content">
                            <?php echo $faq['answer']; ?>
                        </div>
                        <div class="footer-article">
                            <table cellpadding="7" cellspacing="7">
                                <tr>
                                    <td>Bạn có thấy câu trả lời hữu ích?</td>
                                    <td><div class="button button3"><a class="fn-faq-like" data-id="<?php echo $faq['id']; ?>" href="#">Thích</a></div></td>
                                    <td>Chia sẻ</td>
                                    <td><a class="fn-share" data-to="fb" href="<?php echo $link; ?>" title="Chia sẻ qua Facebook"><span class="icon facebook2"></span></a></td>
                                    <td><a class="fn-share" data-to="mail" href="<?php echo $link; ?>" title="Chia sẻ qua Email"><span class="icon mail"></span></a></td>
                                </tr>
                            </table>
                        </div>
                    <?php } else {
                        ?>
                        <div><p>Không tìm thấy dữ liệu</p></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="support-box">
            <div class="column1">
                <div class="block-title white">Những câu hỏi thường gặp về<br>sản phẩm Anka Milk</div>
                Sed ut perspiciatis unde omnis iste natus<br>error sit voluptatem accusantium<br>doloremque laudantium
                <div class="clear"></div>
                <div class="button button1 left"><a href="#">Xem thêm</a></div>
            </div>
            <div class="column2">
                <div class="block-title white">Hotline hỗ trợ</div>
                <div class="block-title white phone">(08) 38 483 483</div>
                Sed ut perspiciatis unde omnis iste natus<br>error sit voluptatem accusantium<br>doloremque laudantium
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $.post('<?php echo $this->url->get(array('for' => 'faq-counter')); ?>', {op: 'vi ew', id:<?php echo $faq['id']; ?>}, function (rsp) {
        });
        $('.fn-faq-like').click(function () {
            $.post('<?php echo $this->url->get(array('for' => 'faq-counter')); ?>', {op: 'li ke', id:<?php echo $faq['id']; ?>}, function (rsp) {

            });
            return false;
        });
        $('.fn-share').click(function () {
            if ($(this).data('to') == 'fb') {
                url = 'https://www.facebook.com/sharer/sharer.php?u=' + $(this).attr('href');
                window.open(url, 'share', 'height=400,width=600');
            }
            return false;
        });
    }());
</script>
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
        <script src="/skin/anka/js/extension.js"></script></body>
</html>