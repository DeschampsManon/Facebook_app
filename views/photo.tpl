{% extends 'layout.tpl' %}

{% block header %}
    {{ parent() }}
    <meta property="og:url"           content="http://fb.digital-rooster.fr/?photo&id={{ picture.id_photo }}" />
    <meta property="og:title"         content="Photo du concours" />
    <meta property="og:description"   content="Découvrez une des photos du concours" />
    <meta property="og:image"         content="{{ picture.link_photo }}" />
{% endblock %}

{% block title %}
TEST
{% endblock %}

{% block content %}
{{ parent() }}
<section class="clearfix" id="pictures">
    <div class="container">
        <div class="clearfix">
            <div class="col tiers">
                <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count"
                     data-action="like" data-size="small"
                     data-show-faces="true" data-share="true"></div>
                <div style="margin:2px;float:left;width:150px;height:150px;background-image:url('{{ picture.link_photo }}');background-repeat:no-repeat;background-size:cover;"></div>
            </div>
        </div>
    </div>
</section>
{% endblock %}
