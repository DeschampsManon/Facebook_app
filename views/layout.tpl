<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - Concours photo</title>
        <meta name="description" content="{% block description %}{% endblock %}">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS">
        <link rel="stylesheet" href="/assets/stylesheet/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="/assets/stylesheet/main.css">
        {% block head %}
        {% endblock %}
    </head>
    <body>
        {% block header %}
        <header class="clearfix" id="main-header">
            <div class="container">
                <nav class="clearfix">
                    <h1>
                        <a href="index.php?action=home" title="home">Pardon maman</a>
                    </h1>
                    <ul>
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
        {% block content %}
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=325674481145757";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        {% endblock %}

        <footer class="main-footer">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php?action=cgu">Conditions générales d'utilisation</a>
                        </li>
                        {% if admin == 1 %}
                            <li class="admin-link">
                                <a href="admin/index.php">Administration</a>
                            </li>
                        {% endif %}
                    </ul>
                </nav>
                {% block footer %}
                {% endblock %}
            </div>
        </footer>
        <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
        <script type="text/javascript" src="/assets/javascript/main.js"></script>
        {% block script %}
        {% endblock %}
    </body>
</html>
