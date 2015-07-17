{% extends "layouts/default.volt" %}
{% block title %}{{ "Tư vấn cùng chuyên gia"}}{% endblock %}
{% block bodyclass %}support {% endblock %}
{% block content %}
<div class="main-content">
    <div class="block10 wrap-content">
        <div class="visible-animation3">
            <h2 class="block-title">Gửi thắc mắc của bạn cho chúng tôi</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi</p>
        </div>
        <div class="form-list">
            {{ flash.output() }}
            <div class="clm-left visible-animation3">
                <form action="<?php echo $this->url->get(array('for' => 'faq-submit')); ?>" method="post" >
                    <div class="f-group">
                        <div class="f-title">
                            Họ
                        </div>
                        <input type="text" name="first_name">
                    </div>
                    <div class="f-group">
                        <div class="f-title">
                            Tên
                        </div>
                        <input type="text" name="last_name">
                    </div>
                    <div class="f-group">
                        <div class="f-title">
                            Email
                        </div>
                        <input type="text" name="email">
                    </div>
                    <div class="f-group ">
                        <div class="f-title">
                            Sinh nhật hoặc ngày dự sinh của bạn
                        </div>
                        <input type="text" name="dob">
                        <p class="birthday">Ngày/tháng/năm</p>
                    </div>
                    <div class="f-group">
                        <div class="f-title">
                            Giới tính của con
                        </div>
                        <div class="r-group">
                            <input type="radio" checked name="gender" id="male"> <label for="male"> Nam</label>
                            <input type="radio" name="gender" id="female"> <label for="female"> Nữ</label>
                        </div>
                    </div>
                    <div class="f-group ">
                        <div class="f-title">
                            Chủ đề
                        </div>
                        <input type="text" name="subject" id="subject">
                    </div>
                    <div class="f-group ">
                        <div class="f-title">
                            Nội dung
                        </div>
                        <textarea class="noidung" name="question" id="question" cols="30" rows="10"></textarea>
                    </div>
                    <div class="f-group ">
                        <div class="f-title">

                        </div>
                        <div class="button2 button left">
                            <button type="submit">Gửi câu hỏi</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clm-right visible-animation2">
                <h3 class="right-title">We are happy to advise you</h3>
                <ul>
                    <li><a href="support-listing-detail.html"><h4>What to eat while breastfeeding</h4></a></li>
                    <li><a href="support-listing-detail.html"><h4>How to plan a menu tailored to the age and needs of the child</h4></a></li>
                    <li><a href="support-listing-detail.html"><h4>How to soothe the pain a little tummy, such as colic or constipation</h4></a></li>
                    <li><a href="support-listing-detail.html"><h4>How to deal with different situations that arise during pregnancy and motherhood.</h4></a></li>
                </ul>
                <div class="people visible-animation2"></div>
            </div>
            <div class="clear" style="height:40px;"></div>
        </div>
        <div class="support-box">
            <div class="column1">
                <div class="block-title white">Những câu hỏi thường gặp về
                    <br>sản phẩm Anka Milk</div>
                Sed ut perspiciatis unde omnis iste natus
                <br>error sit voluptatem accusantium
                <br>doloremque laudantium
                <div class="clear"></div>
                <div class="button button1"><a href="#">Xem thêm</a></div>
            </div>
            <div class="column2">
                <div class="block-title white">Hotline hỗ trợ</div>
                <div class="block-title white phone">(08) 38 483 483</div>
                Sed ut perspiciatis unde omnis iste natus
                <br>error sit voluptatem accusantium
                <br>doloremque laudantium
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
{% endblock %}