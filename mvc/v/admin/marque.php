<html>
<title>Administrateur :: Marques</title>
<style> input[type='submit']{ margin-top: 20px; }  </style>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5" style="padding: 0; margin: 0;width:100%;">
<br /><br />

            
             
   
         
             
<div class="col-md-12">
            
            <?php include('menu.php'); ?>
            
            <div class="codl-md-8" >
            <div class="panel panel-info"  >
            <h3 class="panel-heading text-center">Les marques</h3>
            <div class="panel-body" style="max-height: 600; overflow-y: auto;">
            <?php if(isset($_GET['_add'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Ajout reussit</div><?php } ?>
            <?php if(isset($_GET['_mod'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Modification reussit</div><?php } ?>
            <?php if(isset($_GET['_sup'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Supression reussit</div><?php } ?>
               
            <div>   
                <table class="table table-hover table-striped"   >
                    <tr><th>id</th> <th>nom</th> <th>logo</th> <th></th> <th></th> </tr>
                    
                    <tr>
                    <form action="/marque/ajouter/" method="post" enctype="multipart/form-data">
                        <td></td>
                        <td><input class="form-control"  type="text" name="nvnom" /></td>
                        <td><input type="file" name="fichier" style="width: 200px;" /></td>
                        <td colspan="2" align=center><input style="margin:0;"  name="ajouter" value="+" type="submit"  class="btn-success btn" /></td>
                    </form>
                    </tr>
                    
                    <?php foreach($marques as $marque){ ?>
                    <tr> 
                        <td><?php echo $marque->id; ?></td> 
                        <form action="/marque/modifier/" method="post"> 
                            <td><input class="form-control" value="<?php echo $marque->nom; ?>" name="nom" /></td> 
                            <td style="padding: 0;"><img  width="200" src="/public/images/marque/<?php echo $marque->logo; ?>" /></td> 
                    
                            <td  style="width: 10;">  
                            <input type="hidden" name="id" value="<?php print $marque->id; ?>" />  
                            <input style="margin:0;"  name="modifier" value="Modifier" type="submit"  class="btn-warning" /> 
                        </form>
                        </td>  
                        
                        <td  style="width: 10;">
                            <form action="/marque/suprimer/" method="post" >
                            <input type="hidden" name="id" value="<?php print $marque->id; ?>" />
                            <input style="margin:0;" name="suprimer" value="-" type="submit"  class="btn-danger btn" />
                            </form>
                        </td>  
                    
                    </tr>
                    <?php } ?>
                    
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