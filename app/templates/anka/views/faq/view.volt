{% extends "layouts/default.volt" %}
{% block title %}{{ "Câu hỏi thường gặp"}}{% endblock %}
{% block bodyclass %}support-listing {% endblock %}
{% block content %}
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
{% endblock%}