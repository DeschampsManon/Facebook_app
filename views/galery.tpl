{% extends 'layout.tpl' %}

{% block content %}
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
                
            </div>
            <div class="clearfix padding-top-bot-20">
                <a href="#!" class="btn">Plus de photos</a>
            </div>
        </div>
    </section>
{% endblock %}
