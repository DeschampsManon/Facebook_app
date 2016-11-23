<!-- <!DOCTYPE html>
<html>
    
    <head>
        
            <meta charset="utf-8">
            <title>{% block title %}{% endblock %} - Project Name</title>
            <meta name="description" content="{% block description %}{% endblock %}">
            <meta name="viewport" content="width=device-width">
            <meta name="author" content="Gianni AZIZI, Alexis TRETON, Alexandre DUBOIS, Manon DESCHAMPS">
            <link rel="stylesheet" href="/assets/stylesheet/font-awesome.min.css">
            <link rel="stylesheet" href="/assets/stylesheet/main.css.scss">
            <link rel="stylesheet" href="/assets/stylesheet/main_header.css.scss">
            <link rel="stylesheet" href="/assets/stylesheet/main_footer.css.scss">
            <link rel="stylesheet" href="/assets/stylesheet/filter.css.scss">
    </head>
    
    <body>
        
        <header id="main-header" class="clearfix">
            <article id="logo">
                <div class="container">
                    <h1>pardon maman</h1>
                </div>
            </article>
            <nav class="dark-bg">
                <div class="container">
                    <ul class="clearfix">
                        <li>
                            <a href="/views/home.php" title="home">Accueil</a>
                        </li>
                        <li>
                            <a href="/views/galery.php" title="galery">Galerie</a>
                        </li>
                        <li>
                            <a href="/views/participate.php" title="participate">Participer</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <section class="clearfix dark-bg">
            <div class="container">
                <p class="center-text" style="padding:4rem 6rem;">
                    Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopu
                    <br><br>
                    Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis
                </p> 
            </div>
        </section>
        <section class="clearfix galery dark-bg">
            <div class="container">
                <h2 class="center-text text-16px margin-bot-20">Dernières photos ajoutées</h2>
                <div class="clearfix grid" data-masonry='{ "itemSelector": ".grid-item" }'>
                    <?php 
                        // for($i=1; $i < 7; $i++){
                        //     echo 
                        //     "
                        //     <article class='clearfix col tiers grid-item margin-bot-20 clickable'>
                        //         <img src='/assets/images/img".$i.".jpg' alt='img".$i."'>
                        //         <div class='clearfix details'>
                        //             <div class='count-likes'>
                        //                 <i class='fa fa-heart'></i>
                        //                 255
                        //             </div>
                        //             <div class='user'>
                        //                 <img src='/assets/images/user.jpg' alt='username avatar' class='pull-left'>
                        //                 <h2 class='pull-left'>username</h2>
                        //             </div>
                        //         </div>
                        //     </article>
                        //     ";
                        }
                     ?>
                </div>
            </div>
        </section>
       
        <footer id="main-footer">
            <div class="container">
                <nav>
                    <ul class="clearfix">
                        <?php $admin = 2 ?>
                        <li>
                            <a href="#!" title="policy" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Politique de confidentialité</a>
                        </li>
                        <li>
                            <a href="#!" title="cgu" class="<?=$admin === 2 ? 'without-admin' : 'with-admin'?>">Conditions d'utilisation</a>
                        </li>
                        <li>
                            <a href="#!" title="admin" class="<?=$admin === 2 ? 'hidden' : 'with-admin'?>">Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <script type="text/javascript" src="/assets/javascript/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="/assets/javascript/masonry.js"></script>
        </footer>
        
    </body>
</html> -->