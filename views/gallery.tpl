{% extends 'layout.tpl' %}

{% block title %}
Gallerie
{% endblock %}

{% block content %}
  <section class="clearfix" id="filters">
    <div class="container">
      <nav>
        <span>Filtrer par</span>
        <ul>
          <li>
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
        <div class="col tiers">
          <img src="/assets/images/img1.jpg">
        </div>
        <div class="col tiers">
          <img src="/assets/images/img1.jpg">
        </div>
        <div class="col tiers">
          <img src="/assets/images/img1.jpg">
        </div>
        <div class="col tiers">
          <img src="/assets/images/img1.jpg">
        </div>
        <div class="col tiers">
          <img src="/assets/images/img1.jpg">
        </div>
      </div>
      <footer class="clearfix">
        <div class="col tiers center-block" style="float:none;">
            <a href="index.php?action=gallery" title="gallery" class="btn btn-dark">Voir la suite</a>
        </div>
      </footer>
    </div>
  </section>
{% endblock %}
