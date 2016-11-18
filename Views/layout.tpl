<!DOCTYPE html>
<html>
    <head>
        {% block head %}
            <meta charset="utf-8">
            <title>{% block title %}{% endblock %} - Project Name</title>
            <meta name="description" content="{% block description %}{% endblock %}">
            <meta name="viewport" content="width=device-width">
            <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS" />
            <link rel="stylesheet" href="">
        {% endblock %}
    </head>
    <body>
        <header>
            {% block header %}{% endblock %}
        </header>
        {% block content %}{% endblock %}
        <footer>
            {% block footer %}
                <script type="text/javascript" src="/assets/jquery-3.1.1.min.js"></script>
            {% endblock %}
        </footer>
        </div>
    </body>
</html>