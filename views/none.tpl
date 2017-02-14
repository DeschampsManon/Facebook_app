{% extends 'layout.tpl' %}

{% block title %}
Aucun concours
{% endblock %}

{% block content %}
    <section class="clearfix" id="last_participants">
        <div class="container">
            <header class="relative col total" style="min-height: 500px;">
                <p id="information">Désolé, il n'y a aucun concours actuellement !<br>
				Nous vous tiendrons informé dès lors qu'un concours sera disponible.<br><br>
				</p>
				<center><img src="assets/images/sad.png" alt="sad face icon" style="width: 150px; margin-top: 50px;"></center>
			</header>
        </div>  
    </section>
{% endblock %}
