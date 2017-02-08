{% extends 'layout.tpl' %}

{% block content %}

<section class="clearfix" id="pictures">
    <div class="container">
        <div class="clearfix">
            <!-- form upload -->
            <form method="post" action="index.php">
                <input type="text" name="name" placeholder="Nom du concours">
                <input type="date" name="starting_date" placeholder="Date de démarrage">
                <input type="date" name="end_date" placeholder="Date de fin">
                <input type="text" name="reward" placeholder="Récompense">
                <textarea name="text_reward" style="color:#000" placeholder="Texte de récompense"></textarea>
                <input type="submit" value="Envoyer">
            </form>

            <form method="post" action="index.php?action=front">
                <input type="text" name="background" placeholder="background color">
                <textarea name="cgu" placeholder="CGU"></textarea>
                <input type="submit" name="send" value="Envoyer">
            </form>
        </div>
    </div>
</section>

{% endblock %}

{% block script %}
<script>

</script>
{% endblock %}
