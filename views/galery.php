<!DOCTYPE html>
<html>
    <head>
        <!-- {% block head %} -->
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
            <link rel="stylesheet" href="/assets/stylesheet/galery.css.scss">
        <!-- {% endblock %} -->
    </head>
    <body>
        <header id="main-header" class="clearfix">
            <!-- {% block header %} -->
            <div class="container">
            	<nav>
            		<ul class="clearfix">
            			<li>
            				<a href="/views/home.php" title="home">Accueil</a>
            			</li>
            			<li>
            				<a href="/views/galery.php" title="galery">Galerie</a>
            			</li>
            			<li>
            				<a href="/views/participate.php" title="participate">Participer</a>
            			</li>
            		</ul>
            	</nav>
            </div>
            <!-- {% endblock %} -->
        </header>
        <!-- {% block content %} -->
		<nav class="clearfix filter dark-bg">
			<div class="container">
				<ul class="col trois-quarts no-padding-right">
					<li class="uppercase-text col quart">
						<p>filtrer par</p>
					</li>
					<li class="col quart">
	    				<a href="#!" title="friends">Amis</a>
	    			</li>
	    			<li class="col quart">
	    				<a href="#!" title="date">Date</a>
	    			</li>
	    			<li class="col quart">
	    				<a href="#!" title="likes">Likes</a>
	    			</li>
				</ul>
				<form action="#!" methode="get" class="col quart relative no-padding-left">
					<input type="text" name="search_friend">
					<i class="fa fa-search"></i>
				</form>
			</div>
		</nav>
		<section class="galery clearfix dark-bg">
			<div class="container">
				<div class="clearfix grid" data-masonry='{ "itemSelector": ".grid-item" }'>
					<?php 
						for($i=1; $i < 7; $i++){
							echo 
							"
							<article class='clearfix col tiers grid-item margin-bot-20 clickable'>
								<img src='/assets/images/img".$i.".jpg' alt='img".$i."'>
								<div class='clearfix details'>
									<div class='count-likes'>
										<i class='fa fa-heart'></i>
										255
									</div>
									<div class='user'>
										<img src='/assets/images/user.jpg' alt='username avatar' class='pull-left'>
										<h2 class='pull-left'>username</h2>
									</div>
								</div>
							</article>
							";
						}
					 ?>
				</div>
				<div class="clearfix padding-top-bot-20">
					<a href="#!" class="btn">Plus de photos</a>
				</div>
			</div>
		</section>
        <!-- {% endblock %} -->
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
                <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
            <!-- {% endblock %} -->
        </footer>
        </div>
    </body>
</html>