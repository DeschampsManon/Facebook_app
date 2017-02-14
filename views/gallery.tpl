{% extends 'layout.tpl' %}

{% block title %}
Galerie
{% endblock %}

{% block content %}
{{ parent() }}
 <section class="clearfix" id="filters">
    <div class="container">
      <form action="" method="get" class="relative">
        <input type="text" id="search-user" placeholder="chercher un participant">
      </form>
    </div>
  </section>

  <section class="clearfix" id="pictures">
    <div class="container">
        <div class="col total no-result-found hidden">
          <p>Aucun résultat ne correspond à ta recherche</p>
        </div>
        {% for picture in pictures %}
          <article class="col tiers user-picture margin-bot-20">
            <div style="background-image:url('{{ picture.link_photo }}');">
                <div class="user-data">
                    <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <p class="author">{{ picture.id_user }}</p>
                </div>
            </div>
          </article>
        {% endfor %}
    </div>
  </section>
{% endblock %}

{% block script %}
    <script>
        
    </script>
{% endblock %}