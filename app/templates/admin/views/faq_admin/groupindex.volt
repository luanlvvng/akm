
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
            <li><a href="<?php echo $this->url->get(array('for' => 'admin-faq-index')); ?>">FAQs</a></li>
            <li class="active">Groups</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            {{ flash.output() }}
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Phân nhóm</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Ngày</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            {% for item in group_list %}
                            <tr>
                                <td>{{item['id']}}</td>
                                <td>{{item['name']}}</td>
                                <td>{{item['description']}}</td>
                                <td>{{item['creation_date']}}</td>
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
                                    <a href="<?php echo $this->url->get(array('for' => 'admin-faq-group-edit', 'id' => $item['id'])); ?>" class="btn btn-sm bg-purple btn-flat margin">Sửa</a>
                                    <a href="<?php echo $this->url->get(array('for' => 'admin-faq-group-delete', 'id' => $item['id'])); ?>" class="btn btn-sm bg-red btn-flat margin">Xóa</a>
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