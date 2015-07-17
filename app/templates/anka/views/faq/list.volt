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
                <input class="input-search" type="text" class="search" placeholder="Tìm câu hỏi">
                <h3 class="title">Những câu hỏi được quan tâm nhất</h3>
                <?php foreach ($faq_hot_list as $faq) { ?>
                    <a href="<?php echo $this->url->get(array('for' => 'faq-view', 'slug' => $faq['slug'], 'id' => $faq['id'])); ?>" class="question-i">
                        <div class="name"><?php echo $faq['question']; ?></div>
                        <div class="like"> <span><?php echo $faq['like_count']; ?></span> Likes</div>
                    </a>
                <?php } ?>
                <h3 class="title">Những câu hỏi khác</h3>
                <?php foreach ($faq_list as $faq) { ?>
                    <a href="<?php echo $this->url->get(array('for' => 'faq-view', 'slug' => $faq['slug'], 'id' => $faq['id'])); ?>" class="question-i">
                        <div class="name"><?php echo $faq['question']; ?></div>
                        <div class="like"> <span><?php echo $faq['like_count']; ?></span> Likes</div>
                    </a>
                <?php } ?>
                <a href="#" class="see-more">XEM THÊM</a>
            </div>

        </div>
        <div class="clear"></div>
        <div class="support-box">
            <div class="column1">
                <div class="block-title white">Những câu hỏi thường gặp về<br>sản phẩm Anka Milk</div>
                Sed ut perspiciatis unde omnis iste natus<br>error sit voluptatem accusantium<br>doloremque laudantium
                <div class="clear"></div>
                <div class="button button1"><a href="#">Xem thêm</a></div>
            </div>
            <div class="column2">
                <div class="block-title white">Hotline hỗ trợ</div>
                <div class="block-title white phone">(08) 38 483 483</div>
                Sed ut perspiciatis unde omnis iste natus<br>error sit voluptatem accusantium<br>doloremque laudantium
            </div>
        </div>
    </div>
</div>

{% endblock%}