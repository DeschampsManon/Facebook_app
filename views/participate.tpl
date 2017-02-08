{% extends 'layout.tpl' %}

{% block content %}

<section class="clearfix" id="pictures">
    <div class="container">
        <div class="clearfix">
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
                {% set countRadio = 0 %}
                {% for image in images %}
                <div class="album hidden" album="{{ count }}">

                    {% for image in image %}
                    {% if image != '' %}
                    <form method="post" action="index.php?action=participate" id="form1">
                        <label for="radio{{ countRadio }}">
                            <input type="radio" id="radio{{ countRadio }}" name="link_photo" class="hidden" value="{{ image }}">
                            <div style="margin:2px;float:left;width:150px;height:150px;background-image:url('{{ image }}');background-repeat:no-repeat;background-size:cover;"></div>
                        </label>
                        <input type="submit" value="Envoyer" style="display: none;">
                    </form>
                    {% endif %}
                    {% set countRadio = countRadio + 1 %}
                    {% endfor %}
        </div>
        {% set count = count + 1 %}
        {% endfor %}
        </div>
        <div class="clearfix">
            <!-- form upload -->
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input type="file" accept="image/jpg, image/png" name="file">
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</section>




{% endblock %}

{% block script %}
    <script>
    $(function(){
        $('select').change(function(){
            album = $(this).val();
            $('.album').hide();
            $('.album[album='+album+']').show();
        });

        $('label').click(function(){
            $('#form1 input[type=submit]').css('display', 'none');
            $(this).next('input').css('display','block');
        });
    });
    </script>
{% endblock %}
