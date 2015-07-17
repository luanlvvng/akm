{% extends "layouts/default.volt" %}
{% block title %}{{ "Tư  vấn cùng chuyên gia"}}{% endblock %}
{% block bodyclass %}expert {% endblock %}
{% block content %}
<div class="main-content">
    <div class="container">
        <div class="block10 wrap-content">
            <div class="content">
                <?php echo $this->flashSession->output() ?>
                <div class="visible-animation3">
                    <h2 class="block-title">Tư vấn cùng chuyên gia</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi</p>
                    <p class="strong">Những câu hỏi được quan tâm nhất:</p>
                    <ul class="faqlist">
                        {% for faq in faq_hot_list %}
                        <li><a href="<?php echo $this->url->get(array('for' => 'faq-view', 'slug' => $faq['slug'], 'id' => $faq['id'])); ?>"><h3>{{ faq['question']}}</h3></a></li>
                        {% endfor %}
                    </ul>
                    <div class="button button1">
                        <a href="<?php echo $this->url->get(array('for' => 'faq-list')); ?>">Xem thêm</a>
                    </div>
                    <div class="button2 button">
                        <a href="<?php echo $this->url->get(array('for' => 'faq-submit')); ?>">Gửi câu hỏi</a>
                    </div>
                </div>
            </div>
            <div class="visible-animation2 ankaexpert hide-text"><h3>Kerry nutrition expert</h3></div>
            <div class="clear"></div>
            <div class="support-box">
                <div class="column1">
                    <div class="block-title white">Những câu hỏi thường gặp về<br />sản phẩm Anka Milk</div>
                    Sed ut perspiciatis unde omnis iste natus<br/>error sit voluptatem accusantium<br />doloremque laudantium
                    <div class="clear"></div>
                    <div class="button button1"><a href="#">Xem thêm</a></div>
                </div>
                <div class="column2">
                    <div class="block-title white">Hotline hỗ trợ</div>
                    <div class="block-title white phone">(08) 38 483 483</div>
                    Sed ut perspiciatis unde omnis iste natus<br />error sit voluptatem accusantium<br />doloremque laudantium
                </div>
            </div>
        </div>
    </div>
<div class="clear"></div>
</div>
{% endblock %}