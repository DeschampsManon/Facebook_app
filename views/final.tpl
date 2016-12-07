{% extends 'layout.tpl' %}

{% block title %}
Accueil
{% endblock %}

{% block content %}
    <style type="text/css">
    #main-header ul{
        display: none;
    }
    </style>
    <section class="clearfix" id="final">
        <div class="container">
            <article>
                <fieldset class="moitie relative">
                    <legend> c'est la fin </legend>
                    <h2>the end ...</h2>
                    <p>
                        Notre concours est déjà terminé.. Merci à tous pour votre participation. Découvrez le nom du grand vainqueur juste en dessous. 
                    </p>
                </fieldset> 
            </article>
        </div>
    </section>
    <section class="clearfix" id="winner">
        <div class="container">
            <article class="col moitie no-padding-left no-padding-right">
                <img src="/assets/images/winner.png" alt="">
            </article>
            <article class="col moitie">
                <div class="relative">
                    <h3>le grand gagnant est</h3>
                    <h2>name user</h2>
                    <p>
                        Postremo ad id indignitatis est ventum, ut cum peregrini ob formidatam haut ita dudum alimentorum inopiam pellerentur ab urbe praecipites, sectatoribus disciplinarum. 
                    </p>
                </div>
            </article>
        </div>
    </section>
{% endblock %}