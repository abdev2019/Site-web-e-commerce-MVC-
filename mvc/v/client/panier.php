<html>
<body>
<?php require_once(dos."mvc/v/head.php"); ?>
    <div class="product-big-title-area">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="product-bit-title text-center">
    <h2>Mon Compte</h2>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- End Page title area -->
    
<div class="container"> 
<div class="vert-offset-top-4">

    <?php //include('menu.php'); ?>

    <div role="tabpanel" class="tab-pane" id="cmd">
    <div class="col-md-12"> 
        <h3>
            Commande &numero; <?php echo $commande->id;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Date:<?php echo $commande->date;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Valid&eacute;:<?php echo $commande->valide;?> 
        </h3><br /><br />
        <div class="panel panel-info">
        <h4 class="panel-heading">Produits command&eacute;s</h4>
        <div class="panel-body" > 
        
                        <div class="product-content-right">
                        <div class="woocommerce"> 
                        <br />
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr class=""> 
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Produit</th>
                                        <th class="product-price">Prix</th>
                                        <th class="product-quantity">Quantit&eacute;</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead> 
                                <tbody>  
                                        <?php foreach($panier->produits as $produit){ ?> 
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a>
                                                <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="/mvc/v/produit/images/<?php print $produit['prd']->dossier; ?>/1.jpg" />
                                                </a>
                                            </td>
                        
                                            <td class="product-name">
                                                <a target="_blank" href="/produit/details/<?php print $produit['prd']->id; ?>"><?php print $produit['prd']->nom; ?></a> 
                                            </td>
                        
                                            <td class="product-price">
                                                <span class="amount"><?php print $produit['prd']->prix; ?> DHs</span> 
                                            </td>
                        
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                <?php print $produit['qte']; ?> 
                                                </div>
                                            </td> 
                        
                                            <td class="product-subtotal">
                                                <span class="amount"><?php print ($produit['prd']->prix * $produit['qte']) ; ?> DHs</span> 
                                            </td>
                                        </tr> 
                                        <?php } ?> 
                                    <tr>
                                    <thead>
                                        <th class="alert-insfo" colspan="4" >  
                                                <h4 style="display: inline;"> 
                                                <label for="coupon_code">TOTAL</label> 
                                                </h4>
                                        </th>
                                        
                                        <th class="alert-info" colspan="2"><?php print $panier->total; ?> DHs</th>
                                    </thead>
                                    </tr>
                                </tbody> 
                                </table> 
                        </div>                        
                        </div>
        
        </div>
        </div>
    </div>
    </div>
    
</div>
</div>

<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>