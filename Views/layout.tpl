<!DOCTYPE html>
<html>
    {% block head %}
    <head>
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - Concours photo</title>
        <meta name="description" content="{% block description %}{% endblock %}">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS">
        <link rel="stylesheet" href="/assets/stylesheet/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="/assets/stylesheet/main.css.scss">
        <link rel="stylesheet" href="/assets/stylesheet/filter.css.scss">
    </head>
    {% endblock %}
    <body>
        {% block header %}
        <header class="clearfix" id="main-header">
            <div class="container">
                <nav class="clearfix">
                    <h1>pardon maman</h1>
                    <ul class="clearfix">
                        <li>
                            <a href="index.php?action=home" title="home">Accueil</a>
                        </li>
                        <li>
                            <a href="index.php?action=gallery" title="galery">Galerie</a>
                        </li>
                        <li>
                            <a href="index.php?action=participate" title="participate">Participer</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        {% endblock %}
        {% block content %}{% endblock %}
        {% block footer %}
        <footer>
            <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
        </footer>
        {% endblock %}
    </body>
</html>