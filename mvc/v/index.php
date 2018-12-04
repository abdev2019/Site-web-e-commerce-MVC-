<html>
<title>Accueil</title>
<body>  
<?php require_once(dos."mvc/v/head.php"); ?>
 
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>
Bienvenue
</h2>
</div>
</div>
</div>
</div>
</div>

    
    <div class="slider-area" ><!-- Slider -->
    <div class="block-slider block-slider4">
    <ul class="" id="bxslider-home4">
                            <li>
                            <img src="/public/images/sopsi/h4-slide.png" alt="Slide" />
                            <div class="caption-group">
                                <h2 class="caption title">
                                iPhone <span class="primary">6 <strong>Plus</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Dual SIM</h4>
                                <a class="caption button-radius" href="/panier/ajouter/1"><span class="icon"></span>Shop now</a>
                            </div>
                            </li>
                            
                            <li class="text-center">
                            <img style="width: 800px;" src="/public/images/sopsi/P1.png" alt="Slide"/> 
                            </li>
                            
                            <li class="text-center">
                            <img style="width: 800px;" src="/public/images/sopsi/P2.png" alt="Slide"/> 
                            </li>
                            
                            <li><img src="/public/images/sopsi/h4-slide3.png" alt="Slide"/>
                            <div class="caption-group">
                                <h2 class="caption title">
                                Apple <span class="primary">Store <strong>Ipod</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Select Item</h4>
                                <a class="caption button-radius" href="/panier/ajouter/2"><span class="icon"></span>Shop now</a>
                            </div>
                            </li>
                            
                            <li><img src="/public/images/sopsi/h4-slide4.png" alt="Slide"/>
                            <div class="caption-group">
                                <h2 class="caption title">
                                Apple <span class="primary">Store <strong>Ipod</strong></span>
                                </h2>
                                <h4 class="caption subtitle">& Phone</h4>
                                <a class="caption button-radius" href="/panier/ajouter/3"><span class="icon"></span>Shop now</a>
                            </div>
                            </li>
    </ul>
    </div><!-- ./Slider -->
    </div> <!-- End slider area -->


    <div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container"> 
    <div class="row">  
                            <center><h1 style="color: black;">Promotions</h1></center>
                            <div class="col-md-3 col-sm-6">
                            <div class="single-promo promo3">
                            <i class="fa fa-lock"></i>
                            <p>Paiement S&eacute;curis&eacute;</p>
                            </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 ">
                            <a id="pr1"><img src="/public/images/sopsi/promo2.png" /></a> 
                            </div> 
                            
                            <div class="col-md-3 col-sm-6 ">
                            <a  id="pr2"><img src="/public/images/sopsi/promo1.png" /></a>                      
                            </div> 
                            
                            <div class="col-md-3 col-sm-6">
                            <div class="single-promo promo4">
                            <i class="fa fa-gift"></i>
                            <p>Nouveau Produits</p>
                            </div>
                            </div>  
                            <br class=" vert-offset-top-12" />
                            
                            
                            <div style="display: none;" id="det1" class="col-md-12 alert-info alert">
                            <h2>Gestion Commerciale R&eacute;seau</h2>
                            
                            <div class="col-md-2 col-offset-2">
                            <img src="/public/images/sopsi/11.jpg"  style="width:150;" /><br />
                            <del>9600.00 DH</del>
                            <br />
                            7680.00 DH
                            </div>
                            
                            <div class="col-md-6 col-offset-2">
                                Gestion Commerciale SOPSI (DEMO GRATUITE) Gestion des stocks, Gestion des ventes, Facturation directe ou par 
                                s&eacute;l&eacute;ction de BLs,Gestion des factures clients, Gestion des encaissements clients, Gestion des 
                                factures fournisseurs, Gestion des r&egrave;glements fournisseurs, Gestion des banques, Gestion de la caisse, Statistiques 
                                d&eacute;taill&eacute;es, Extraits des comptes clients, Extraits des comptes fournisseurs - Etats de TVA ( Version r&eacute;seau )
                            </div>
                            <br />
 
                            </div>
                            
                            
                            <div style="display: none;" id="det2" class="col-md-12 alert-info alert">
                            <h2>Gestion Commerciale Monoposte</h2>
                            

                            <div class="col-md-2 col-offset-2">
                            <img src="/public/images/sopsi/11.jpg"  style="width:150;" /><br />
                            <del>7200.00 DH</del>
                            <br />
                            5760.00 DH
                            </div>
                            
                            <div class="col-md-6 col-offset-2">
                                Gestion Commerciale SOPSI (DEMO GRATUITE) Gestion des stocks, Gestion des ventes, 
                                Facturation directe ou par s&eacute;l&eacute;ction de BLs,Gestion des factures clients, 
                                Gestion des encaissements clients, Gestion des factures fournisseurs, 
                                Gestion des r&egrave;glements fournisseurs, Gestion des banques, Gestion de la caisse, 
                                Statistiques d&eacute;taill&eacute;es, Extraits des comptes clients, Extraits des comptes fournisseurs - Etats de TVA 
                                ( Version monoposte )
                            </div>
                            
                            </div>
                            
                            <script>
                                $(document).ready(function(){
                                    $("#pr1").click(function(){
                                        $("#det1").show(500);
                                        $("#det2").hide(1);
                                    });
                                });
                                
                                $(document).ready(function(){
                                    $("#pr2").click(function(){
                                        $("#det1").hide(1);
                                        $("#det2").show(500);
                                        
                                    });
                                });
                            </script>
                            
                            
                            
    </div>
    </div>
    </div> <!-- End promo area -->
    
    
    
    
    
    <div class="maincontent-area vert-offset-top-12">
    <div class="zigzag-bottom"></div>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="latest-product">
                        <h2 class="section-title">R&eacute;cent Produits</h2>
                        <center>
                        <div class="product-carousel"> 
                        <?php foreach($recent as $produit){ ?> 
                            <div class="single-product">
                            <div class="product-f-image">
                            <img src="/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.png"  />
                            <div class="product-hover"> 
                            
                            <a href="/panier/ajouter/<?php print $produit->id; ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Ajouter</a>
                            <a href="/produit/details/<?php print $produit->id; ?>" class="view-details-link"><i class="fa fa-link"></i>D&eacute;tails</a>
                            </div>
                            </div> 
                            <h2><a><?php print $produit->nom; ?></a></h2> 
                            <div class="product-carousel-price">
                            <ins><?php print $produit->prix; ?> DHs</ins> <del><?php print $produit->prix + 100; ?> DHs</del>
                            </div> 
                            </div>    
                        <?php } ?>
                        </div>
                        </center>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- End main content area -->
    
    
    <style>.brand-wrapper .brand-list img:hover{ background-color: rgb(244,244,244); }</style>
    <div class="brands-area vert-offset-top-12">
    <h1 class="text-center" style="color: black;">Marques</h1>
    <div class="zigzag-bottom"></div>
    <div class="container">
    <div class="row"> 
    <div class="col-md-12">
    <div class="brand-wrapper">
                     
                            <div class="brand-list"> 
                                <?php  foreach($marques as $marque){ ?> 
                                <a href="/produit/marque/<?php echo $marque->id; ?>"><img src="/public/images/marque/<?php echo $marque->logo; ?>" alt="Oops !"/></a>  
                                <?php } ?>                        
                            </div> 
                        
    </div>
    </div>
    </div>
    </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
    <div class="row">  
    
    </div>
    </div>
    </div> <!-- End product widget area -->
    
   
   
   
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html> 
