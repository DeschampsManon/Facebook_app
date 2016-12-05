<!DOCTYPE html>
<html>
    {% block head %}
    <head>
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - Project Name</title>
        <meta name="description" content="{% block description %}{% endblock %}">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS">
        <link rel="stylesheet" href="/assets/stylesheet/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/stylesheet/main.css.scss">
        <link rel="stylesheet" href="/assets/stylesheet/main_header.css.scss">
        <link rel="stylesheet" href="/assets/stylesheet/main_footer.css.scss">
        <link rel="stylesheet" href="/assets/stylesheet/filter.css.scss">
    </head>
    {% endblock %}
    <body>
        {% block header %}
        <header id="main-header" class="clearfix">
            <article id="logo">
                <div class="container">
                    <h1>pardon maman</h1>
                </div>
            </article>
            <nav class="dark-bg">
                <div class="container">
                    <ul class="clearfix">
                        <li>
                            <a href="index.php?action=home" title="home">Accueil</a>
                        </li>
                        <li>
                            <a href="index.php?action=galery" title="galery">Galerie</a>
                        </li>
                        <li>
                            <a href="index.php?action=participate" title="participate">Participer</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        {% endblock %}
        {% block content %}{% endblock %}
        {% block footer %}
        <footer id="main-footer">
            <div class="container">
                <nav>
                    <!-- <ul class="clearfix">
                        <li>
                            <a href="#!" title="policy" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Politique de confidentialité</a>
                        </li>
                        <li>
                            <a href="#!" title="cgu" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Conditions d'utilisation</a>
                        </li>
                        <li>
                            <a href="#!" title="admin" class="<?=$admin === 2 ? 'hidden' : 'with-admin'?>">Admin</a>
                        </li>
                    </ul> -->
                </nav>
            </div>
            <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
        </footer>
        {% endblock %}
    </body>
</html>