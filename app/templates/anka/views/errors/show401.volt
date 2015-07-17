{% extends "layouts/default.volt" %}
{% block title %}{{ "Có lỗi xảy ra"}}{% endblock %}
{% block bodyclass %}support-listing {% endblock %}
{% block content %}
<div class="jumbotron">
    <h1>Unauthorized</h1>
    <p>You don't have access to this option. Contact an administrator</p>
    <p>{{ link_to('index', 'Home', 'class': 'btn btn-primary') }}</p>
</div>
{% endblock %}