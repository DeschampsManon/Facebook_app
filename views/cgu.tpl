{% extends 'layout.tpl' %}

{% block content %}

    {% block head %}
        <style>
            h3{
                color: rgba(255,255,255,.5);
                background-color: #272727;
                position: absolute;
                margin: 0 auto;
                top: 4.2rem;
                left: 50%;
                transform: translateX(-50%);
            }
        </style>
    {% endblock %}

    <section class="clearfix" id="pictures">
        <div class="container">
            <div>
                <p style="color: #FFF; padding:20px;">{{ front.cgu | nl2br }}</p>
            </div>
        </div>
    </section>

{% endblock %}

{% block script %}
    <script>

    </script>
{% endblock %}
