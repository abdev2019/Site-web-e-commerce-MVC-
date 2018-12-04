<html>
<title>Produit :: <?php print $produit->nom; ?></title>
<body>
<?php  include(dos.'mvc/v/head.php'); ?>


<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2><?php print $produit->nom; ?></h2></div></div></div></div></div>
<div class="container" style="padding:50px;padding-left:0px;padding-right:0px;">

        <div class="col-md-3" style="width:210;">
        <div class="single-shop-product">
        <div class="product-upper">
        <img class='img-thumbnail' src='/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.png' />
        </div> 
        <div class="product-carousel-price"> 
        </div>   
        <div class="product-option-shop">
            <a class="add_to_cart_button" href="/panier/ajouter/<?php print $produit->id; ?>/?ref=/produit/details/<?php print $produit->id; ?>" >Ajouter au panier</a>
        </div>                       
        </div>
        </div>  
        
        <div class="col-md-3">
        <p><u><?php print $produit->nom; ?></u></p> 
        <table>
        <tr><td>Categorie   </td><td style="width: 16px;text-align: center;"> : </td><td> <?php echo($produit->categorie); ?></td></tr>
        <tr><td>Marque      </td><td style="width: 16px;text-align: center;"> : </td><td><?php echo($produit->marque); ?></td></tr>
        <tr><td>Prix        </td><td style="width: 16px;text-align: center;"> : </td><td><?php echo($produit->prix); ?> DHs<br /><del><?php print ($produit->prix+200); ?> DHs</del></td></tr>
        </table> 
        <br />
            <?php print $produit->description; ?>
        </div>   
        
        <div class="col-md-6"> 
        <div class="brands-area" > 
        <div class="zigzag-bottom" ></div> 
        <div class="row"> 
        <div class="brand-wrapper"> 
               <center>
            <div class="brand-list">  
            <?php for($i=0;$i<count($images);$i++) if( strchr($images[$i],'.') ) print "<a href='/mvc/v/produit/images/{$produit->dossier}/$images[$i]'><img  class='img-thudmbnail'    src='/mvc/v/produit/images/{$produit->dossier}/".$images[$i]."' /></a>&nbsp;&nbsp;&nbsp;&nbsp;"; ?>        
                </center>
            </div> 
                            
        </div> 
        </div> 
        </div>
        </div>
        
</div>



 
<?php  include(dos.'mvc/v/foot.php'); ?>
</body>
</html>