<html>
<title>Panier</title> 
<body>
<?php include('head.php'); ?>
    
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>Mon Panier</h2>
</div>
</div>
</div>
</div>
</div> <!-- End Page title area -->
    
    
<div class="single-product-area">
<div class="zigzag-bottom"></div>
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="single-sidebar">
<h2 class="sidebar-title">Rechercher un produit</h2>

<form method="post" action="" name="rch2">
<input type="text" placeholder="Recherche produit..." name="valeur" />
<input onclick="document.rch2.action=('/produit/recherche/'+document.rch2.valeur.value);" type="submit" value="Recherche" class="btn-info btn"  />
</form>

</div> 
</div> 

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce"> 
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr class="">
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Produit</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product-quantity">Quantit&eacute;</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <style> input[name='retirer_de_panier']{background-color: red; padding:0; width: 30px; height: 30px;  } </style>
                                    <input id="nbr" name="nbr" value="<?php print count($produits); ?>" type="hidden" />
                                    
                                    
                                    <form method="post" action="/commande/nouveau/" name="f1">
                                    <?php $i=0; if(count($produits)) foreach($produits as $produit){ ?> 
                                            <tr class="cart_item">
                                                <td class="product-remove"> 
                                                    <input type="hidden" name="id" value="<?php print $produit->id; ?>" />
                                                    <input
                                                        type="submit" class="img-circle close" 
                                                        style="float: none; font-size: 15px;"
                                                        name="retirer_de_panier" value='x'
                                                        onclick="document.f1.action='/panier/retirer/<?php print $produit->id; ?>/?ref=<?php print $_SERVER['REQUEST_URI']; ?>';"
                                                    />
                                                </td>
    
                                                <td class="product-thumbnail">
                                                    <a href="single-product.html">
                                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.png" />
                                                    </a>
                                                </td>
    
                                                <td class="product-name">
                                                    <a href="/produit/details/<?php print $produit->id; ?>"><?php print $produit->nom; ?></a> 
                                                </td>
    
                                                <td class="product-price">
                                                    <span id="prix<?php print $i; ?>" class="amount"><?php print $produit->prix; ?> DHs</span> 
                                                </td>
    
                                                <td class="product-quantity" >
                                                    <div class="quantity buttons_added" style="width: 120px;">
                                                        <input id="minus<?php print $i; ?>" type="button" class="minus" value="-" />
                                                        <input name="quantite<?php print $produit->id; ?>" id="nbr<?php print $i; ?>" type="number" size="4" class="input-text qty text" title="Qty" value="1" min="1" step="1" />
                                                        <input id="plus<?php print $i; ?>" type="button" class="plus" value="+"  />
                                                    </div>
                                                </td>
                                                
                                                <script> 
                                                    $("#nbr<?php print $i; ?>").click(function(){calculer(<?php print $i; ?>)});
                                                    $('#plus<?php print $i; ?>').click(function(){plus(<?php print $i; ?>)}); 
                                                    $('#minus<?php print $i; ?>').click( function(){minus(<?php print $i; ?>)});
                                                </script>
    
                                                <td class="product-subtotal">
                                                    <span id="total<?php print $i++; ?>" class="amount"><?php print $produit->prix; ?> DHs</span> 
                                                </td>
                                            </tr>
                                            
                                        <?php } else print "<tr><td class='alert-warning alert' colspan='6'>Votre panier est vide !</td></tr>"; ?> 
                                        <tr>
                                            <td class="alert-info" colspan="4" > 
                                                    <h4 style="display: inline;">
                                                    <label for="coupon_code">Prix total du panier :</label>
                                                    <span id="total">0</span> DHs
                                                    <input type="hidden" name="total_prix" id="total_prix"  />
                                                    </h4>
                                            </td> 
                                            <td class="alert-info" colspan="2" style="border-left: none;">
                                            <input value="Commander" type="submit" name="commander_etape_1" class="btn-primary" <?php if(!count($produits))echo 'style="cursor: not-allowed;"'; ?> />
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table> 
                                    </form>
                                <script src="/public/js/calcule.js"></script> 
                        </div>                        
                    </div>                    
                </div>
</div>
                        <center>
                        <h2 class="sidebar-title"><a class="sidebar-title" href="/produit">Produits...</a></h2>
                        <div class="latest-product"> 
                        <div class="product-carousel"> 
                        <?php foreach($suggests as $produit){ if( in_array($produit->id,$_SESSION['produits']) ) continue; ?> 
                            <div class="single-product">
                            <div class="product-f-image">
                            <img src="/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.png"  />
                            <div class="product-hover"> 
                            
                            <a href="/panier/ajouter/<?php print $produit->id; ?>/?ref=/panier/" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Ajouter</a>
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


<?php include('foot.php'); ?>
</body>
</html>