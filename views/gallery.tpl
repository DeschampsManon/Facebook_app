{% extends 'layout.tpl' %}

{% block title %}
Galerie
{% endblock %}

{% block content %}
{{ parent() }}
 <section class="clearfix" id="filters">
    <div class="container">
      <nav>
        <span>Filtrer par</span>
        <ul>
          <li class="active">
            <a href="#!">Date</a>
          </li>
          <li>
            <a href="#!">Amis</a>
          </li>
          <li>
            <a href="#!">Likes</a>
          </li>
        </ul>
      </nav>
      <form action="" method="get" class="relative">
        <input type="text" name="search_user" placeholder="chercher un participant">
        <input type="submit" value="&#xf002;">
      </form>
    </div>
  </section>

  <section class="clearfix" id="pictures">
    <div class="container">
      <div class="clearfix">


          {% for picture in pictures %}
              <div class="col tiers">
                  <div style="margin:2px;float:left;width:150px;height:150px;background-image:url('{{ picture.link_photo }}');background-repeat:no-repeat;background-size:cover;"></div>
                  <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count"
                       data-action="like" data-size="small"
                       data-show-faces="true" data-share="true"></div>
              </div>
          {% endfor %}


      </div>
      <footer class="clearfix">
        <div class="col tiers center-block" style="float:none;">
            <a href="index.php?action=gallery" title="gallery" class="btn btn-dark">Voir la suite</a>
        </div>
      </footer>
    </div>
  </section>
{% endblock %}
