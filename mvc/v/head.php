<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nos Produits</title>
      
    <link rel="stylesheet" href="/public/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="/public/css/font-awesome.min.css"/> 
    <link rel="stylesheet" href="/public/css/owl.carousel.css"/>
    <link rel="stylesheet" href="/public/css/style.css"/>
    <link rel="stylesheet" href="/public/css/responsive.css"/>
    <style>.dproduct-big-title-area,.header-area,.site-branding-area,.mainmenu-area,.footer-top-area{ background-image: url('/public/images/sopsi/7.JPG'); background-attachment: fixed; background-size: cover;  }</style>
    <style>#social{ border-radius: 100%; width:30px; height:30px; } a{ cursor: pointer;}</style>
    <style> input:focus{ background-color: aliceblue; }
    .img-thumbnail{ min-height: 200px; max-height: 200px; max-width: 100px; min-width: 170px; }
    </style>
</head>


<div class="header-area">
    <div class="container"> 
        <div class="row  vert-offset-top-1">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                    <?php if(!isset($_SESSION['id_client'])){ ?>
                        <li><a data-toggle="modal" data-target="#connexion" style="cursor: pointer;" ><i class="fa fa-user"></i>Connexion</a></li>
                        <li><a href="/client/nouveau"><i class="fa fa-user"></i>Inscription</a></li>
                        <li><a href="/client/oublier/">oubli&eacute;?</a></li>
                        

                        <!--    boite dialogue connexion     --> 
                        <div class="modal fade" id="connexion"  tabindex="-1" role="dialog" aria-labelledby="titrePopUp" aria-hidden="true"> 
                        <div class="modal-dialog modal-sm" style="width: 450;" >  
                        <div class="modal-content" > 
                        <div class="modal-header"> 
                        <center><h4>Connexion<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</h4></center></button> 
                        </div>    
                        <div class="modal-body" > 
                        <div id="res"></div>
                        
                        <form  id="myForm" method="post">
                        <center>
                            <table>
                            <tr><td style="width: 150;">CIN : </td><td>
                                <input id="cin" class="form-control" type="text" name="cin"  value="<?php if(isset($_POST['cin'])) print $_POST['cin']; ?>"       maxlength="30" /></td></tr> 
                            <tr><td style="width: 150; padding-top:20px;">Code Client : </td><td style=" padding-top:20px;">
                                <input id="code" class="form-control" type="password" name="code_client" value="<?php if(isset($_POST['code_client'])) print $_POST['code_client']; ?>" maxlength="30"/></td></tr>
                            </table> 
                            
                        </div> 
                        <div class="modal-footer">
                        <center>
                            <a class="btn-primary btn"  style="min-width: 110;"  onclick="connecter();" >connexion</a>
                            <a data-dismiss="modal" aria-hidden="true" class="btn-info btn" style="min-width: 110;"   >annuler</a>
                            
                        </center>
                        </div>
                        </center> 
                        </form>
                        </div>  
                        </div>  
                        </div>  
                        
                        <script>
                            function connecter() { 
                                var cin = $("#cin").val();
                                var code_client = $("#code").val();  
                                $.post("/client/connecter/", { cin: cin, code_client: code_client  },
                                function(data) {  
                                     $('#res').html(data); 
                                });
                            }
                        </script> 
                        
                    <?php }else{ ?>
                        <li><a href="/client/deconnexion"><i class="fa fa-user"></i>Deconnexion</a></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4"> 
                <div class="header-right"> 
                    <ul class="list-unstyled list-inline">  
                    <span class="footer-social">
                    <a href="http://www.facebook.com/sopsi.agadir" target="_blank" id="social"><i class="fa fa-facebook"></i></a>
                    <a href="mailto:sopsi.agadir@gmail.com"  target="_blank" id="social"  style="background:blueviolet;border:aqua;"><i class="fa fa-google"></i></a>
                    <a href="http://www.youtube.com/sopsi.agadir"  target="_blank" id="social"  style="background:red;border:red;"><i class="fa fa-youtube"></i></a> 
                    </span>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area" style="padding-bottom:20px; ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo">
                    <div class="row" style="padding-top: 15px;">
                    <center>
                        <div class="col-md-2" style="width:150px;">
                        <style>#logo_site:hover{background-color: rgb(244,244,244);}</style>
                        <a href="/">
                        <img style="border-radius:5px;" id="logo_site" src="/public/images/sopsi/logo.png"  width="120" height="120" />
                        <!--
                        <div style="color:blue;border: solid; border-radius: 10px; display: table;" class="text-center"><span class="fa fa-laptop" style="font-size: 60;"></span><br /><span style="font-size: 20;">SOPSI</span></div>
                        --></a> 
                        </div>
                    </center>
                        
                        <div class="col-md-6" style="color: white;padding:0; padding-top: 50px;">
                        Vente et r&eacute;paration de mat&eacute;riel informatique au Maroc
                        </div>
                         
                        <div class="col-md-3 col-lg-push-1" style="padding:0;padding-top: 30px; width:320px;">
                        <form class="form-inline pull-right" method="post" action="" name="rch">
                        <input type="text" name="valeur" style="padding:3px;margin: 0;" placeholder="recherche produit..." /><input type="submit" name="rechercher" onclick="document.rch.action=('/produit/recherche/'+document.rch.valeur.value);" value="GO!" style="padding:4px;margin: 0;" class="btn-info"  />
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" style="background-image: url('/public/images/sopsi/7.JPG'); background-attachment: fixed; background-size: cover;"  >
                <ul class="nav navbar-nav" >
                    <li <?php if($_SESSION['control']=="")print'class="active"'; ?> ><a href="/">        Accueil             </a></li>
                    <li <?php if($_SESSION['control']=="Produit")print'class="active"'; ?> ><a href="/produit">     nos produits        </a></li>  
                    <li <?php if($_SESSION['control']=="Categorie")print'class="active"'; ?> ><a href="/categorie">   Cat&eacute;gories / Marques   </a></li> 
                    <!--<li><a href="panier.php">       Panier <span class="badge alert-danger">0</span>         </a></li>-->
                    <li <?php if($_SESSION['control']=="Sopsi")print'class="active"'; ?> ><a href="/sopsi">        SOPSI               </a></li>
                    <?php if(isset($_SESSION['id_client'])){ ?><li <?php if($_SESSION['control']=="Client")print'class="active"'; ?>><a href="/client/compte">Mon Compte</a></li> <li><a href="/client/demande_reparation/">Reparation</a></li> <?php } ?>
                    <li <?php if($_SESSION['control']=="Contact")print'class="active"'; ?> ><a href="/contact">      Contact             </a></li>  
                </ul>  
                <a class="shopping-item btn-default" href="/panier" style="margin: 0; margin-top: 8px;">
                    Panier <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php if(isset($_SESSION['produits'])) print count($_SESSION['produits']); else{$_SESSION['produits']=array();print 0;}  ?></span>
                </a>
            </div>  
        </div> 
    </div> 
</div> 
<?php require_once(dos.'mvc/v/js.html'); ?>

<script>
    $(document).bind('keypress', function(event) 
    {  
        if( event.which === 65 && event.shiftKey ) 
        {
            location.href="/admin";
        }
    });
</script>

<div class="clearfix"></div> 