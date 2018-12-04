<html> 
<title>Commande</title>
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
<div class="container" style="padding:20px ;">

    <div class="col-md-7">
    <div class="product-content-right">
    <div class="woocommerce"> 
    <h3>Veuillez verifier votre panier :</h3><br />
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
                            <a>
                            <img width="145" height="145" alt="" class="shop_thumbnail" src="/mvc/v/produit/images/<?php echo $produit->dossier; ?>/1.png" />
                            </a>
                        </td>
    
                        <td class="product-name">
                            <a target="_blank" href="/produit/details/<?php print $produit->id; ?>"><?php print $produit->nom; ?></a> 
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
                <thead>
                    <th class="alert-insfo" colspan="4" >  
                            <h4 style="display: inline;"> 
                            <label for="coupon_code">TOTAL</label> 
                            </h4>
                    </th>
                    
                    <th class="alert-info" colspan="2"><?php print $_SESSION['total_prix']; ?> DHs</th>
                </thead>
                </tr>
            </tbody> 
            </table> 
    </div>                        
    </div>                    
    </div>
 
    <div class="col-md-5 contact-top-right">
    <style> input,select{ margin-bottom: 20px; } </style>
    <h3>&nbsp;</h3><br />
    
    <div id="ccc" class="panel panel-info">
        <h2 class="panel-heading">Confirmation</h2>
        <div class="panel-body">
            <form method="post" id="ddd">
            <b>  
            <div style="padding: 5px;"> 
            <div id="is"></div>
                    CIN : <br />
                    <input id="cinc" name="cin" type="text" class="form-control"  />
                    Code client :<br />
                    <input id="codec" name="code_client" type="password" class="form-control"  /> 
                    
                    <input onclick="validerCommande();"  name="commander_etape_2" type="button" class="btn-success btn " value="VALIDER" /> 
                    
                    <?php if(!isset($_SESSION['id_client'])){ ?><a target="_blank" href="/client/oublier/">Oubli&eacute; ?</a><?php } ?>
                </b>
            </div>
            </form>
        </div> 
    </div>
    <script>
        function validerCommande() { 
            var cin = $("#cinc").val();
            var code_client = $("#codec").val();   
            $.post("/commande/valider/", { cin: cin, code_client: code_client  },
            function(data) {  
                
                 $('#is').html(data); 
            });
        }
    </script> 
        

    
    
    <?php if(!isset($_SESSION['id_client'])){ ?><a href="/client/nouveau" target="_blank" id="btn_nv_clt">Nouveau Client</a> <?php } ?>
    </div>
    <div class="clearfix"></div> 
    <br /><br />


        
</div>         
<?php include('foot.php'); ?>  
</body>
</html>