{% extends 'layout.tpl' %}

{% block title %}
Accueil
{% endblock %}

{% block content %}
{{ parent() }}
<section class="clearfix" id="explications">
    <div class="container">
        <article>
            <fieldset class="moitie relative">
                <legend> concours photo </legend>
                <h2 class="editable" name="title">{{ front.title }}</h2>
                <p class="editable" textarea="yes" name="texte">
                    {{ front.texte }}
                </p>
                <a href="index.php?action=participate" title="participate" class="btn btn-gold">je participe</a>
            </fieldset>
        </article>
    </div>
</section>
<section class="clearfix" id="recompense">
    <div class="container">
        <article class="col moitie no-padding-left">
            <img src="/assets/images/recompense_tatoo.png" alt="">
        </article>
        <article class="col moitie" id="reward">
            <div class="relative">
                <h2>free tatoo</h2>
                <h3 class="editable" name="title2">{{ front.title2 }}</h3>
                <p>
                    Aucun doute ! Tu seras notre prochain gagnant. Tu auras donc la possibilité de choisir l’un de nos talentueux artistes pour te faire tatouer gratuitement l’oeuvre de ton choix.
                </p>
            </div>
        </article>
    </div>
</section>
<section class="clearfix" id="last_participants">
    <div class="container">
        <header class="clearfix relative col total">
            <hr>
            <h3>les derniers participants</h3>
        </header>
        <div class="clearfix">
            {% for picture in pictures %}
            <article class="col tiers">
                <img src="{{ picture.link_photo }}">
                <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count"
                     data-action="like" data-size="small"
                     data-show-faces="true" data-share="true"></div>
            </article>
            {% endfor %}
        </div>
        <footer class="clearfix">
            <div class="col tiers center-block" style="float:none;">
                <a href="index.php?action=gallery" title="gallery" class="btn btn-dark">Voir toutes les photos</a>
            </div>
        </footer>
    </div>
</section>
<section class="clearfix livedit-submit">
    <div class="container">
        <a id="close" class="close" href="index.php">Fermer l'editeur</a>
        <button id="validate">Enregistrer les modifications</button>
        <form id="form" style="display: none;"></form>
    </div>
</section>

{% endblock %}

{% block script %}
    <script>
        $('a').click(function(e){
            if($(e.target).hasClass('close')) {

            }else{
                return false;
            }
        });
    </script>
{% endblock %}
