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
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Edit</h3>
                    </div><!-- /.box-header -->
                    <form role="form" method="post">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Nhóm</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập câu hỏi" value="<?php echo $item->name; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Nhập mô tả"><?php echo $item->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="1" <?php if ($item->status > 0) echo ' checked="checked" '; ?> />
                                        Đã duyệt
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="0" <?php if ($item->status < 1) echo ' checked="checked" '; ?> />
                                        Chờ duyệt
                                    </label>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                            <button type="submit" class="btn btn-flat btn-primary">Save changes</button>
                            <button type="reset" class="btn btn-flat btn-default">Reset</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
{% endblock %}