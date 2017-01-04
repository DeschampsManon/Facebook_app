{% extends 'layout.tpl' %}

{% block content %}

    {% set count = 0 %}
    <section class="clearfix">
        <div class="container">
            <article id="gallery">
                <div class="col total">
                    <label>Selectionnez un fichier</label>
                    <select name="albums">
                        <option value="">Selectionner un album</option>
                        {% for album in albums %}
                            {{ album }}
                                <option value="{{ count }}">{{ album }}</option>
                            {% set count = count + 1 %}
                        {% endfor %}
                    </select>
                </div>
                <div style="padding-top:83px;">
                    {% set count = 0 %}
                        {% for image in images %}
                        <div class="album hidden grid" album="{{ count }}">
                        {% for image in image %}
                            {% if image != '' %}
                                <div class="grid-item quart col">
                                    <img src="{{ image }}" class="total">
                                </div>
                            {% endif %}
                        {% endfor %}
                        </div>
                        {% set count = count + 1 %}
                    {% endfor %}
                </div>
            </article>
        </div>
    </section>

{% endblock %}
