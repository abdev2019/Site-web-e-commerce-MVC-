<html>
<body>
<?php  include(dos.'mvc/v/head.php'); ?>
 
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>
Nos Produits :: <?php echo $type; ?>
</h2>
</div>
</div>
</div>
</div>
</div>


<div class="container text-center"> 
<?php
$n = count($produits);

if(isset($rech)) print "<div class='alert-success alert'><h3>Resultats recherche par ' ".str_replace('%20',' ',$rech)." ' : ".ProduitM::$nbr." resultats</h3></div>";

if($n) 
foreach($produits as $produit)
{
?> 
 
        <div class="col-md-3 col-sm-6  <?php if($n==1)print"col-md-offset-4";else if($n==2)print "col-sm-offset-2"; ?>" style="height: 450;word-break: break-all;word-wrap: break-word;">
        <div   class="single-shop-product">
        <div class="product-upper">
            <img   src="/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.png" class="img-thumbnail" alt="" />
        </div> 
        <h2><a href="/produit/details/<?php print $produit->id; ?>"><?php print $produit->nom; ?></a></h2>
        <div class="product-carousel-price">
            <ins><?php print $produit->prix; ?> DHs</ins> <del><?php print ($produit->prix+200); ?> DHs</del>
        </div>  
        
        <div class="product-option-shop">
        <?php if( !isset($_SESSION['produits']) || isset($_SESSION['produits'])&&!in_array($produit->id,$_SESSION['produits']) ){ ?>
        
            <form action="/panier/ajouter/<?php print $produit->id; ?>/?ref=<?php print $_SERVER['REQUEST_URI']; ?>" method="post" >
                <input type="hidden" name="id" value="<?php print $produit->id; ?>" />
                <input type="hidden" name="nom" value="<?php print $produit->nom; ?>" />
                <input
                    type="submit"
                    class="btn btn-success"
                    name="ajouter_au_panier"
                    value='Ajouter au panier' 
                />
            </form>
        
        <?php }else{ ?>
        
                <div class="alert-success col-md-5" style="padding-bottom:11;padding-top:11;"><i class="glyphicon glyphicon-ok"></i> Ajout&eacute;</div>
                <form action="/panier/retirer/<?php print $produit->id; ?>/?ref=<?php print $_SERVER['REQUEST_URI']; ?>" method="post" >
                <input type="hidden" name="id" value="<?php print $produit->id; ?>" />
                <input 
                    type="submit"
                    class="btn-danger" 
                    name="retirer_de_panier"
                    value='Retirer'
                />
                </form>
                
        <?php } ?>
        </div>                       
        </div>
        </div>  
 
<?php
}
else echo "<br><div class='alert-warning alert text-center'>Aucun produit !</div>";
?>  

</div>

    <?php if(!isset($_SERVER['page']))$_SERVER['page']=1; ?>
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav>
                <ul class="pagination">
                <li>
                <a href="<?php print "?page="; if($_SERVER['page']>1) print $_SERVER['page']-1; else print $_SERVER['page']; ?>" aria-label="Next">
                <span aria-hidden="true">&laquo;</span>
                </a>
                </li> 
               
                <?php for($i=1;$i<=ceil(ProduitM::$nbr/12);$i++) print '<li><a href="?page='.$i.'">'.$i.'</a></li>';  ?> 

                <li>
                <a href="<?php  print "?page="; if($_SERVER['page']<ceil(ProduitM::$nbr/12)) print $_SERVER['page']+1; else print $_SERVER['page']; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
                </li> 
                </ul>
                </nav>                        
            </div>
        </div> 
 
 
 
<?php  include(dos.'mvc/v/foot.php'); ?>
</body>
</html>