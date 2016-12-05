{% extends 'layout.tpl' %}

{% block content %}
	<p>Nom : {{ user.last_name }}</p>
	<p>Prenom : {{ user.first_name }}</p>
	<p>anniversaire : {{ user.birthday }}</p>
	<p>Sexe : {{ user.gender }}</p>
	<p>Appareils utilisés : {% for device in user.devices %} {{ device.os }} {% endfor %}</p>
	<p>localisation : {{ user.locale }}</p>
	<p>age : {{ user.birthday | time_diff }}</p>

	<a href="disconnect.php">Se deconnecter</a>
{% endblock %}

