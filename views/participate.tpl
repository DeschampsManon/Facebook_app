{% extends 'layout.tpl' %}

{% block content %}

<section class="clearfix" id="pictures">
    <div class="container">
        <article class="col total">

            {% if upload == 'oui' %}
                <div id="boxmessage" class="good">{{ message }}</div>
            {% elseif upload == 'non' %}
                <div id="boxmessage" class="bad">{{ message }}</div>
            {% endif %}

            {% set count = 0 %}
            <label>Ajouter une photo depuis facebook</label>
            <select name="albums">
                <option value="">Selectionner un album</option>
                {% for album in albums %}
                {{ album }}

                <option value="{{ count }}">{{ album }}</option>

                {% set count = count + 1 %}
                {% endfor %}
            </select>
            {% set count = 0 %}
            {% set countRadio = 0 %}
        </article>
        {% for image in images %}
            <div class="album hidden" album="{{ count }}">
                {% for image in image %}
                    {% if image != '' %}
                        <article class="col quart user-picture">
                            <form method="post" action="index.php?action=participate" id="form1">
                                <label>
                                    <div style="background-image:url('{{ image.source }}');"></div>
                                    <input type="hidden" name="link_photo" value="{{ image.source }}">
                                    <input type="hidden" name="id_image" value="{{ image.id_photo }}"
                                </label>
                                <button type="submit" class="submit-picture">
                                    <i class="fa fa-check-circle-o"></i>
                                </button>
                            </form>
                        </article>
                    {% endif %}
                    {% set countRadio = countRadio + 1 %}
                {% endfor %}
            </div>
            {% set count = count + 1 %}
        {% endfor %}
        <form id="user-picture-upload" method="post" action="upload.php" enctype="multipart/form-data" class="col total">
            <label>Importer une photo depuis ton ordinateur</label>
            <label class="filupp no-margin">
                <span class="filupp-file-name js-value">Choisis un fichier</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input type="file" accept="image/jpg, image/png" name="file">
            </label>
            <input type="submit" value="Envoyer" class="margin-top-20">
        </form>
    </div>
</section>

{% endblock %}
