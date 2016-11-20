<!DOCTYPE html>
<html>
    <head>
        <!-- {% block head %} -->
            <meta charset="utf-8">
            <title>{% block title %}{% endblock %} - Project Name</title>
            <meta name="description" content="{% block description %}{% endblock %}">
            <meta name="viewport" content="width=device-width">
            <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS" />
            <link rel="stylesheet" href="/assets/stylesheet/main.css.scss">
            <link rel="stylesheet" href="/assets/stylesheet/main_header.css.scss">
            <link rel="stylesheet" href="/assets/stylesheet/main_footer.css.scss">
        <!-- {% endblock %} -->
    </head>
    <body>
        <header id="main-header" class="clearfix">
            <!-- {% block header %} -->
            <div class="container">
            	<nav>
            		<ul class="clearfix">
            			<li>
            				<a href="#!" title="home">Accueil</a>
            			</li>
            			<li>
            				<a href="#!" title="galery">Galerie</a>
            			</li>
            			<li>
            				<a href="#!" title="participate">Participer</a>
            			</li>
            		</ul>
            	</nav>
            </div>
            <!-- {% endblock %} -->
        </header>
        <!-- {% block content %}{% endblock %} -->
        <footer id="main-footer">
	        <div class="container">
            	<nav>
            		<ul class="clearfix">
            			<?php $admin = 2 ?>
            			<li>
            				<a href="#!" title="policy" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Politique de confidentialité</a>
            			</li>
            			<li>
            				<a href="#!" title="cgu" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Conditions d'utilisation</a>
            			</li>
            			<li>
            				<a href="#!" title="admin" class="<?=$admin === 2 ? 'hidden' : 'with-admin'?>">Admin</a>
            			</li>
            		</ul>
            	</nav>
            </div>
            <!-- {% block footer %} -->
                <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
            <!-- {% endblock %} -->
        </footer>
        </div>
    </body>
</html>