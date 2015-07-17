{% extends "layouts/default.volt" %}
{% block title %}{{ "Có lỗi xảy ra"}}{% endblock %}
{% block bodyclass %}support-listing {% endblock %}
{% block content %}
<div class="jumbotron">
    <h1>Page not found</h1>
    <p>Sorry, you have accesed a page that does not exist or was moved</p>
    <p>{{ link_to('index', 'Home', 'class': 'btn btn-primary') }}</p>
</div>
{% endblock %}
