<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - Concours photo</title>
        <meta name="description" content="{% block description %}{% endblock %}">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS">
        <link rel="stylesheet" href="/assets/stylesheet/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="/assets/stylesheet/main.css">
        <style>
            #reward input {
                position: absolute;
                top: -10px;
            }

            /*#validate {
                position: fixed;
                bottom: 15px;
                left: 15px;
                min-width: 50px;
                height: 35px;
                background: orange;
                border: 0px;
                border-radius: 5px;
                color: #FFF;
                padding: 5px;
            }

            #close {
                position: fixed;
                bottom: 60px;
                left: 15px;
                min-width: 50px;
                height: 35px;
                background: orange;
                border: 0px;
                border-radius: 5px;
                color: #FFF;
                padding: 5px;
            }*/

            .acenter {
                left: 50% !important;
            }
        </style>
        {% block head %}
        {% endblock %}
    </head>
    <body>
        {% block header %}
        <header class="clearfix" id="main-header">
            <div class="container">
                <nav class="clearfix">
                    <h1>
                        <a href="../index.php?action=home" title="home">Accueil</a>
                    </h1>
                    <ul>
                        <li>
                            <a href="../index.php?action=home" title="home">Accueil</a>
                        </li>
                        <li>
                            <a href="../index.php?action=gallery" title="galery">Galerie</a>
                        </li>
                        <li>
                            <a href="../index.php?action=participate" title="participate">Participer</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        {% endblock %}
        {% block content %}
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=325674481145757";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        {% endblock %}

        <footer>

        </footer>
        <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
        <script>

            $(function() {

                $('.editable').on('click', function(e) {
                    e.stopPropagation();

                    $('.editable-input').remove();

                    var divHtml = $(this).html();
                    var name = $(this).attr('name');
                    var generateId = Math.floor((9999)*Math.random()+1)

                    /* CSS */
                    var csscolor = $(this).css('color');
                    var csswidth = $(this).width();
                    var cssheight = $(this).height();
                    var cssfont = $(this).css('font');
                    var cssfontsize = $(this).css('font-size');
                    var csstransform = $(this).css('text-tranform');
                    var cssbackground = $(this).css('background-color');

                    if(name == "title" || name == "title2") {
                        divHtml = divHtml.toUpperCase();
                    }

                    if($(this).attr('textarea') == "yes") {
                        var editableText = '<textarea class="editable-input" id="i' + generateId + '" name="'+ name +'"></textarea>';
                    }else {
                        var editableText = '<input class="editable-input" id="i' + generateId + '" type="text" name="' + name + '">';
                    }

                    $(this).after(editableText);


                    $('#i'+generateId).css('color', csscolor);
                    $('#i'+generateId).css('width', csswidth + 25);
                    $('#i'+generateId).css('height', cssheight);
                    $('#i'+generateId).css('font', cssfont);
                    $('#i'+generateId).css('font-size', cssfontsize);
                    $('#i'+generateId).css('text-tranform', csstransform);
                    $('#i'+generateId).css('background-color', cssbackground);


                    $('#i'+generateId).val(divHtml);
                    $(this).css('display', 'none');
                    $('#i'+generateId).focus();

                    $('.editable').unbind('click');
                });

                $('body').click(function(e){
                    e.stopPropagation();

                    if($(e.target).hasClass('editable-input')) {

                    }else{
                        $('.editable-input').each(function(){
                            value = $(this).val();
                            if($(this).is(':visible')) {
                                $(this).prev().html(value);
                                $(this).hide();
                            }
                        });
                        $('.editable').bind('click', editable);

                        $('.editable').show();
                    }

                });


                var editable = function(e) {
                    e.stopPropagation();

                    $('.editable-input').remove();

                    var divHtml = $(this).html();
                    var name = $(this).attr('name');
                    var generateId = Math.floor((9999)*Math.random()+1)

                    /* CSS */
                    var csscolor = $(this).css('color');
                    var csswidth = $(this).width();
                    var cssheight = $(this).height();
                    var cssfont = $(this).css('font');
                    var cssfontsize = $(this).css('font-size');
                    var csstransform = $(this).css('text-tranform');
                    var cssbackground = $(this).css('background-color');

                    if(name == "title" || name == "title2") {
                        divHtml = divHtml.toUpperCase();
                    }

                    if($(this).attr('textarea') == "yes") {
                        var editableText = '<textarea class="editable-input" id="i' + generateId + '" name="'+ name +'"></textarea>';
                    }else {
                        var editableText = '<input class="editable-input" id="i' + generateId + '" type="text" name="' + name + '">';
                    }

                    $(this).after(editableText);


                    $('#i'+generateId).css('color', csscolor);
                    $('#i'+generateId).css('width', csswidth + 25);
                    $('#i'+generateId).css('height', cssheight);
                    $('#i'+generateId).css('font', cssfont);
                    $('#i'+generateId).css('font-size', cssfontsize);
                    $('#i'+generateId).css('text-tranform', csstransform);
                    $('#i'+generateId).css('background-color', cssbackground);


                    $('#i'+generateId).val(divHtml);
                    $(this).css('display', 'none');
                    $('#i'+generateId).focus();
                    $('.editable').unbind('click');
                }


                $('#validate').on('click', function() {


                    $('.editable').each(function(){
                        var name = $(this).attr('name');
                        var value = $(this).html();
                        $('#form').append('<input type="text" name="'+ name +'" value="'+ value +'">');
                    });

                    console.log(document.getElementById('form').innerHTML);

                    var url = "./traitement.php";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $('#form').serialize(),
                        dataType: 'html',
                        success: function(response) {
                            if(response == 1) {

                            }else{

                            }
                        },

                        error: function() {

                        }
                    });


                    $('#form').html('');

                });


            });


        </script>
        {% block script %}
        {% endblock %}
    </body>
</html>
