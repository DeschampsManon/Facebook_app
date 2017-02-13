{% extends 'layout.tpl' %}

{% block content %}

{% block head %}
    <style>
        h3{
            color: rgba(255,255,255,.5);
            background-color: #272727;
            position: absolute;
            margin: 0 auto;
            top: 4.2rem;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
{% endblock %}

<section class="clearfix" id="pictures">
    <div class="container">
        <div class="clearfix">
            <section class="clearfix" id="last_participants">
                <div class="container">
                    <header class="relative col total">
                        <hr>
                        <h3 class="acenter">Gérer le concours</h3>
                        <form method="post" action="index.php">
                            <label for="startDate">Nom du concours</label>
                            <input type="text" name="name" class="input-admin" value="">

                            <label for="startDate">Date de début</label>
                            <input type="text" name="starting_date" class="input-admin" value="">

                            <label for="endDate">Date de fin</label>
                            <input type="text" name="end_date" class="input-admin" value="">

                            <label for="reward">Récompense</label>
                            <input type="text" name="reward" class="input-admin" value="">

                            <label for="rewardtext" class="label-textarea">Texte récompense</label>
                            <textarea id="rewardtext" name="text_reward"></textarea>

                            <div class="col tiers center-block" style="float:none;">
                                <input type="submit">
                            </div>
                            <input type="hidden" name="action" value="competition">
                        </form>
                    </header>
                    <header class=" relative col total">
                        <hr>
                        <h3 class="acenter">Réglages</h3>
                        <form method="post" action="index.php">

                            <label for="bgcolor">Background color</label>
                            <input type="text" id="bgcolor" placeholder="#000000" name="background" class="input-admin" value="{{ front.backgroundcolor }}">

                            <label for="cgu" class="label-textarea">CGU</label>
                            <textarea id="cgu" name="cgu" >{{ front.cgu }}</textarea>

                            <div class="col tiers center-block" style="float:none;">
                                <input type="submit">
                            </div>
                            <input type="hidden" name="action" value="front">
                        </form>
                    </header>
                    <header class=" relative col total">
                        <hr>
                        <h3 class="acenter">Live edit</h3>
                        <div class="col tiers center-block" style="float:none;">
                            <a href="index.php?action=livedit" title="live-edit" class="btn btn-dark">Accéder au live edit</a>
                        </div>
                    </header>
                </div>
            </section>
        </div>
    </div>
</section>

{% endblock %}

{% block script %}
<script>

</script>
{% endblock %}
