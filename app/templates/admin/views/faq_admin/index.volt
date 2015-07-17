
{% extends "layouts/default.volt" %}

{% block title %}Trang chủ{% endblock %}
{% block bodyclass %}homepage {% endblock %}

{% block content %}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>FAQs
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url()}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('admin')}}">Admin</a></li>
            <li class="active">FAQs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                {{ flash.output() }}
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">FAQs</h3>
                        <div class="box-tools">
                            <div class="input-group">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Câu hỏi</th>
                                <th>Trả lời</th>
                                <th>Ngày</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            {% for item in faq_list %}
                            <tr>
                                <td>{{item['id']}}</td>
                                <td>{{item['question']}}</td>
                                <td>{{item['answer']}}</td>
                                <td>{{date('d/m/Y',item['modified_date'])}}</td>
                                <td>
                                    <?php
                                    if ($item['status'] > 0) {
                                        echo '<span class="label label-success">Đã duyệt</span>';
                                    } else {
                                        echo '<span class="label label-warning">Chưa duyệt</span>';
                                    }
                                    ?>
                                </td>                                
                                <td>
                                    <a href="<?php echo $this->url->get(array('for' => 'admin-faq-edit', 'id' => $item['id'])); ?>" class="btn btn-sm bg-purple btn-flat margin">Sửa</a>
                                    <a href="<?php echo $this->url->get(array('for' => 'admin-faq-delete', 'id' => $item['id'])); ?>" class="btn btn-sm bg-red btn-flat margin">Xóa</a>
                                </td>
                            </tr>
                            {% endfor %}

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
{% endblock %}