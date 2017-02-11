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
        <input type="text" id="search_user" placeholder="chercher un participant">
      </form>
    </div>
  </section>

  <section class="clearfix" id="pictures">
    <div class="container">
      <div class="clearfix">


          {% for picture in pictures %}
              <div class="col tiers picture">
                  <div style="margin:2px;float:left;width:150px;height:150px;background-image:url('{{ picture.link_photo }}');background-repeat:no-repeat;background-size:cover;"></div>
                  <p class="author" style="color:#FFF">{{ picture.id_user }}</p>
                  <div class="fb-like" data-href="{{ picture.link_like }}" data-layout="box_count"
                       data-action="like" data-size="small"
                       data-show-faces="true" data-share="true"></div>
              </div>
          {% endfor %}


      </div>
      <footer class="clearfix">
        <div class="col tiers center-block" style="float:none;">

        </div>
      </footer>
    </div>
  </section>
{% endblock %}

{% block script %}
    <script>
        $(function(){
            $('#search_user').keyup(function(){
                var search = $(this).val().toLowerCase();
                $('.picture').each(function(){
                    var author = $(this).find('.author').html().toLowerCase();
                    var result = author.search(search);
                    if(result == -1) {
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                });
            });
        });
    </script>
{% endblock %}