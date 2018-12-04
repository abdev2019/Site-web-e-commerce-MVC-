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

    <?php include('menu.php'); ?>

    <div role="tabpanel" class="tab-pane" id="cmd">
    <div class="col-md-9"> 
        <div class="panel panel-info">
        <h4 class="panel-heading">Mes commandes</h4>
        <div class="panel-body" > 
        <table class="table table-hover table-striped">
        <thead>
            <tr> <th>&numero;</th>  <th>Date</th>  <th>Produits</th>  <th>Manier vente</th> <th>Valid&eacute;</th> </tr>
        </thead>
        
            <?php if(count($commandes)) foreach($commandes as $cmd){ ?>
            <tr> 
                <td><b><?php echo $cmd->id; ?></b></td> 
                <td><?php echo $cmd->date; ?></td> 
                <td>
                    <form action="/client/panier/<?php echo $cmd->id; ?>/" method="POST" target="_blank"> 
                        <input type="hidden" value="<?php echo $cmd->id; ?>" name="id_cmd" />
                        <input type="submit" value="details" name="afficher_panier" class="btn-success btn" style="padding: 6;" />
                    </form>
                </td> 
                <td><?php echo $cmd->manier_vente; ?></td> 
                <td><?php echo $cmd->valide; ?></td> 
            </tr>
            <?php } else print("<tr><td colspan=\"5\" class=\"alert-info alert\">Aucune commande!</td></tr>"); ?>
        
        </table>
        </div>
        </div>
    </div>
    </div>
    
</div>
</div>

<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>