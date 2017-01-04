{% extends 'layout.tpl' %}

{% block title %}
Accueil
{% endblock %}

{% block content %}
    <section class="clearfix relative" id="login">
        <div class="container"> 
            <div class="fixed-content">
                <a href="{{ loginUrl }}">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    Se connecter
                </a>
            </div>
        </div>
    </section>
    <section class="clearfix" id="explications">
        <div class="container">
            <article>
                <fieldset class="moitie relative">
                    <legend> concours photo </legend>
                    <h2>the best tatoo</h2>
                    <p>
                        Pardon maman organise un concours photos de tatouage. Tu as jusqu’au 28 février 2017 pour poster ton meilleur tatouage et voter pour celui que tu trouves le plus impressionant.
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
                    <h2>free tatoo</h2>
                    <h3>une superbe récompense</h3>
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
                <article class="col tiers">
                    <img src="/assets/images/img1.jpg" height="330px">
                </article>
                <article class="col tiers">
                    <img src="/assets/images/img4.jpg" height="330px">
                </article>
                <article class="col tiers">
                    <img src="/assets/images/img3.jpg" height="330px">
                </article>
            </div>
            <footer class="clearfix">
                <div class="col tiers center-block" style="float:none;">
                    <a href="index.php?action=gallery" title="gallery" class="btn btn-dark">Voir toutes les photos</a>
                </div>
            </footer>
        </div>  
    </section>
{% endblock %}
