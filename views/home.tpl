{% extends 'layout.tpl' %}

{% block title %}
Accueil
{% endblock %}

{% block content %}
    {{ parent() }}
    <div class="app-data">
        <div class="container">
            <div class="fb-like" data-href="https://www.facebook.com/Concours-photo-pardon-maman-Community-1926870424202660/?ref=bookmarks" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
    </div>
    <section class="clearfix" id="explications">
        <div class="container">
            <article>
                <fieldset class="moitie relative">
                    <legend> concours photo </legend>
                    <h2>{{ front.title }}</h2>
                    <p>
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
            <article class="col moitie">
                <div class="relative">
                    <h2>{{ competition.reward }}</h2>
                    <h3>{{ front.title2 }}</h3>
                    <p>
                        {{ competition.text_reward }}
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
                <article class="col tiers user-picture">
                    <div style="background-image:url('{{ picture.link_photo }}');">
                        <div class="user-data hidden">
                            <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <p class="author">{{ picture.id_user }}</p>
                        </div>
                    </div>
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
{% endblock %}
