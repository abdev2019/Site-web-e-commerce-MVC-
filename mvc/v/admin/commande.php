<html>
<title>Administrateur :: Commandes</title>
<style> input[type='submit']{ margin-top: 20px; }  </style>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5" style="padding: 0; margin: 0;width:100%;"> 
<br /><br />

            
              
            
            <div class="col-md-12" >
            <?php include('menu.php'); ?>
            <div class="panel panel-info"  >
            <h3 class="panel-heading text-center">Les commandes</h3>
            <div class="panel-body" style="max-height: 600; overflow-y: auto;">  
            <div>          
                    <table class="table table-hover table-striped"   >
                        <tr><th>id</th> <th>Id client</th> <th>panier</th> <th>date</th> <th>manier vente</th> <th>valid&eacute;</th> <th></th> <th></th>  </tr>
                    
                        <?php if(count($commandes)) foreach($commandes as $commande){ ?>
                        <tr> 
                            <td><?php echo $commande->id; ?></td> 
                            <td><a href="/admin/gerer/client/<?php echo $commande->client; ?>" target="_blank">Client &numero; <?php echo $commande->client; ?></a></td> 
                            <td>
                                <form action="/client/panier/<?php echo $commande->id; ?>/" method="POST" target="_blank">  
                                    <input type="hidden" value="<?php echo $commande->id; ?>" name="id_cmd" /> 
                                    <input type="submit" value="details" name="afficher_panier" class="btn-info btn" style="margin: 0;padding:5" />
                                </form>
                            </td>
                            <td><?php echo $commande->date; ?></td>
                            <td><?php echo $commande->manier_vente; ?></td> 
                            <td><?php echo $commande->valide; ?></td>  
                            <form action="/commande/gerer/" method="POST"> 
                                <td><input value="<?php echo $commande->id; ?>" name="id" type="hidden" /><input value='Accepter' type="submit" class="btn-success btn" name="accepter" style="margin: 0;padding:5"  /> </td>
                                <td><input value='Refuser'  type="submit" class="btn-warning btn" name="refuser" style="margin: 0;padding:5"  /> </td>
                            </form>
                        </tr>
                        <?php } else echo "<div class='alert alert-warning'>Aucun commande !</div>"; ?>
                    
                </table>
                    
            </div>
            </div>
            </div>
            </div> 
            
            
            
            

</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>