<html>
<title>Administrateur :: Clients</title>
<style> input[type='submit']{ margin-top: 20px; }  </style>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5" style="padding: 0; margin: 0;width:100%;"> 
<br /><br />
 
            
            
            <div class="col-md-12" >
            <?php include('menu.php'); ?>
            
            <div class="panel panel-info"  >
            <h3 class="panel-heading text-center">Les clients</h3>
            <div class="panel-body" style="max-height: 600; overflow-y: auto;">  
            <div> 
            
                    <table class="table table-hover table-striped"   >
                        <tr><th>id</th> <th>nom</th> <th>prenom</th> <th>E-mail</th> <th>adresse</th> <th>Telephone</th> <th>CIN</th> <th>Suprimer</th>  </tr>
                    
                        <?php if(count($clients)) foreach($clients as $client){ ?>
                        <tr> 
                        
                            <td><?php echo $client->id; ?></td> 
                            <td><?php echo $client->nom; ?></td>
                            <td><?php echo $client->prenom; ?></td>
                            <td><?php echo $client->email; ?></td>
                            <td><?php echo $client->adresse; ?></td> 
                            <td><?php echo $client->tel; ?></td>
                            <td><?php echo $client->cin; ?></td>  
                            <td>
                            <form action="/client/suprimer/" method="post">
                                <input value="<?php echo $client->id; ?>" name="id" type="hidden" />
                                <input value="Suprimer" name="suprimer" type="submit" class="btn-danger btn" style="margin: 0;padding:5" />
                            </form>
                            </td> 
                        </tr>
                        <?php } else echo "<div class='alert alert-warning'>Aucun client !</div>"; ?>
                    
                    </table>
                     
            </div>
            </div>
            </div>
            </div>
              
            
            
            
            

</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>