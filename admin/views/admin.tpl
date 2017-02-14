{% extends 'layout.tpl' %}

{% block content %}

<section class="clearfix">
    <div class="container">
        <article class="col total admin-form">

            {% if erreur != '' %}
                <div id="boxmessage" class="bad">{{ erreur }}</div>
            {% endif %}

            {% if message != '' %}
                <div id="boxmessage" class="good">{{ message }}</div>
            {% endif %}

            <header class="clearfix relative total">
                <hr>
                <h3 class="acenter">Gérer le concours</h3>
            </header>
            <form method="post" action="index.php">
                <label for="startDate">Nom du concours</label>
                <input type="text" name="name" class="input-admin" value="">

                <label for="startDate">Date de début</label>
                <input type="date" name="starting_date" class="input-admin" value="">

                <label for="endDate">Date de fin</label>
                <input type="date" name="end_date" class="input-admin" value="">

                <label for="reward">Récompense</label>
                <input type="text" name="reward" class="input-admin" value="">

                <label for="rewardtext" class="label-textarea">Texte récompense</label>
                <textarea id="rewardtext" name="text_reward"></textarea>
                <input type="submit">
                <input type="hidden" name="action" value="competition">
            </form>
        </article>
        <article class="col total admin-form">
            <header class="clearfix relative total">
                <hr>
                <h3 class="acenter">Réglages</h3>
            </header>
            <form method="post" action="index.php">
                <label for="bgcolor">Background color</label>
                <input type="text" id="bgcolor" placeholder="#000000" name="background" class="input-admin" value="{{ front.backgroundcolor }}">
                <label for="cgu" class="label-textarea">CGU</label>
                <textarea id="cgu" name="cgu" >{{ front.cgu }}</textarea>
                <input type="submit">
                <input type="hidden" name="action" value="front">
            </form>
        </article>
        <article class="clearfix admin-form padding-bot-20" style="clear:both;">
            <div class="col tiers center-block" style="float:none;">
                <a href="index.php?action=livedit" title="live-edit" class="btn btn-dark">Accéder au live edit</a>
            </div>
        </article>
    </div>
</section>

{% endblock %}

{% block script %}
<script>

</script>
{% endblock %}
