{% extends 'layout.tpl' %}

{% block content %}

    {% set count = 0 %}
    <select name="albums">
        <option value="">Selectionner un album</option>
    {% for album in albums %}
        {{ album }}

            <option value="{{ count }}">{{ album }}</option>

        {% set count = count + 1 %}
    {% endfor %}
    </select>

    {% set count = 0 %}
    {% for image in images %}
        <div class="album hidden" album="{{ count }}">
        {% for image in image %}
            {% if image != '' %}
                <div style="margin:2px;float:left;width:150px;height:150px;background-image:url('{{ image }}');background-repeat:no-repeat;background-size:cover;"></div>
            {% endif %}
        {% endfor %}
        </div>
        {% set count = count + 1 %}
    {% endfor %}

{% endblock %}

{% block script %}
    <script>
    $(function(){
        $('select').change(function(){
            album = $(this).val();
            $('.album').hide();
            $('.album[album='+album+']').show();
        });
    });
    </script>
{% endblock %}
