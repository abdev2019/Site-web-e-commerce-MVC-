<html> 
<title>Verfication</title>
<body>
<?php include('head.php'); ?>
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>Commande</h2>
</div>
</div>
</div>
</div>
</div> <!-- End Page title area -->
<div class="container" style="padding:20px ;border:solid;margin-top:50px; margin-bottom:50px;">

        
    <div class="col-md-5 contact-top-right">
    <table>
    <caption><h3>Informations:</h3></caption>
        <tr><td style="width: 100px;">Nom </td>        <td style="width: 50px;"> :</td>   <td><?php echo $_POST['nom']; ?></td>   </tr>      
        
        <tr><td>Prenom </td>     <td> :</td>   <td><?php echo $_POST['prenom']; ?></td>   </tr>  
        
        <tr><td>Age </td>        <td> :</td>   <td><?php echo $_POST['age']; ?></td>   </tr>   
        
        <tr><td>CIN </td>        <td> :</td>   <td><?php echo $_POST['cin']; ?></td>   </tr> 
        
        <tr><td>E-mail </td>     <td> :</td>   <td><?php echo $_POST['email']; ?></td>   </tr> 
        
        <tr><td>Adresse </td>    <td> :</td>   <td><?php echo $_POST['adresse']; ?></td>   </tr>
        
        <tr><td>Telephone </td>  <td> :</td>   <td><?php echo $_POST['tel']; ?></td>   </tr>
    </table>
    </div>
        
    <div class="col-md-7">
    <div class="product-content-right">
    <div class="woocommerce"> 
    <h3>Produits Command&eacute;s :</h3><br />
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
            <?php foreach($produits as $produit){ ?> 
                    <tr class="cart_item">
                        <td class="product-thumbnail">
                            <a href="single-product.html">
                            <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="/mvc/v/produit/images/<?php print $produit->dossier; ?>/1.jpg" />
                            </a>
                        </td>
    
                        <td class="product-name">
                            <a href="/produit/details/<?php print $produit->id; ?>"><?php print $produit->nom; ?></a> 
                        </td>
    
                        <td class="product-price">
                            <span class="amount"><?php print $produit->prix; ?> DHs</span> 
                        </td>
    
                        <td class="product-quantity">
                            <div class="quantity buttons_added">
                            <?php print $_SESSION['quantites'][$produit->id]; ?> 
                            </div>
                        </td> 
    
                        <td class="product-subtotal">
                            <span class="amount"><?php print $produit->prix * $_SESSION['quantites'][$produit->id]; ?> DHs</span> 
                        </td>
                    </tr>
                    
                <?php } ?> 
                <tr>
                    <td class="alert-info" colspan="4" > 
                            <h4 style="display: inline;">
                            <label for="coupon_code">TOTAL</label> 
                            </h4>
                    </td>
                    <td class="alert-info" colspan="2"><?php print $_SESSION['total_prix']; ?> DHs</td>
                </tr>
            </tbody> 
            </table> 
    </div>                        
    </div>                    
    </div> 
        
    <form action="/commande/valider/" method="post" name="f1">
        <input value="VALIDER"  name="valider_avec_nouveau_client"  class="btn-success" type="submit" />
        <input value="MODIFIER" name="modifier" onclick="document.f1.action='/commande/nouveau/';" class="btn-primary" type="submit" />
    </form>

 
</div>        
<?php include('foot.php'); ?>
</body>
</html>