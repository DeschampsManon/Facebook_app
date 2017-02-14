{% extends 'layout.tpl' %}

{% block content %}
    <section class="clearfix" id="cgu">
        <div class="container">
            <header class="clearfix relative col total">
                <hr>
                <h3>Conditions Générales d'utilisations</h3>
            </header>
            <div class="col total margin-bot-20">
                {{ front.cgu | raw}}
            </div>
        </div>
    </section>
{% endblock %}
