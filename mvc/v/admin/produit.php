<html>
<title>Administrateur :: Produits</title>
<style> input[type='submit']{ margin-top: 20px; }  </style>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5" style="padding: 0; margin: 0;width:100%;"> 
<br /><br />
 
 
            
             
<div class="col-md-12">
            <?php include('menu.php'); ?>
            
            <div class="codl-md-9">
            <div class="panel panel-info"  >
            <h3 class="panel-heading text-center">Les produits</h3>
            <div class="panel-body" style="max-height: 600; overflow-y: auto;padding: 0;"> 
            <?php if(isset($_GET['_add'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Ajout reussit</div><?php } ?>
            <?php if(isset($_GET['_mod'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Modification reussit</div><?php } ?>
            <?php if(isset($_GET['_sup'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Supression reussit</div><?php } ?>
              
            <div>
                    <table class="table table-hover table-striped" >
                        <tr><th>id</th> <th>nom</th> <th>categorie</th> <th>marque</th> <th>prix(DHs)</th> <th>description</th> <th>Images</th> <th></th>  <th></th>  </tr>
                        
                        <tr class="alert-success"> 
                        <form action="/produit/ajouter/" method="post" enctype="multipart/form-data" >
                            <td></td> 
                            <td><input class="form-control" type="text" name="nom" /></td> 
                            <td><select class="form-control" name="categorie"> <?php foreach($categories as $categorie) echo "<option value='$categorie->id'>".htmlentities($categorie, ENT_QUOTES,'iso-8859-1')."</option>"; ?> </select></td> 
                            <td><select class="form-control" name="marque"><?php foreach($marques as $marque) echo "<option value='$marque->id'>$marque</option>"; ?></select></td> 
                            <td><input class="form-control" type="text" name="prix" /></td> 
                            <td><textarea style="height: 50;" name="description"></textarea></td> 
                            <td><input type="file" name="images[]" style="width: 90;" multiple="1" /></td> 
                            <td colspan="2" style="text-align: center;"><input style="margin: 0;" name="ajouter" value="+" class="btn-success btn" type="submit" /></td>
                        </form>
                        </tr>
                       
                       <style></style>
                        <?php if(count($produits)) foreach($produits as $produit){ ?>
                        <tr> 
                        <form action="/produit/modifier/" method="post" >
                            <td><input type="hidden" value="<?php echo $produit->id; ?>" name="id" /><?php echo $produit->id; ?></td> 
                            
                            <td><input class="form-control"  name="nom" value="<?php echo $produit->nom; ?>" /></td>
                            
                            <td  style="max-width: 100;">
                            <select class="form-control" name="categorie"><?php foreach($categories as $categorie) echo "<option value='$categorie->id' ".( ($categorie->id==$produit->categorie->id)?'selected':'' ).">".htmlentities($categorie, ENT_QUOTES,'iso-8859-1')."</option>"; ?> </select>
                            </td>
                            
                            <td>
                            <select class="form-control" name="marque"><?php foreach($marques as $marque) echo "<option  value='$marque->id' ".( ($marque->id==$produit->marque->id)?'selected':'' ).">$marque</option>"; ?></select>
                            </td>
                            
                            <td><input class="form-control"   name="prix" value="<?php echo $produit->prix; ?>" /></td> 
                            
                            <td><textarea name="description" style="height: 50; overflow-y: scroll;"><?php echo $produit->description; ?></textarea></td>  
                            
                            <td><a target="_blank" href="/admin/produit/images/<?php echo $produit->dossier; ?>">Images</a></td>
                            
                            <td>
                            <input style="margin:0;"   name="modifier" value="Modifier" type="submit"  class="btn-warning" /> 
                            </td>
                        </form>
                            
                            <td> 
                            <form action="/produit/suprimer/" method="post" >
                                <input type="hidden" name="id" value="<?php print $produit->id; ?>" /> 
                                <input style="margin:0;" name="suprimer" value="-" type="submit"  class="btn-danger btn" />
                            </form>
                            </td>
                            
                        </tr>
                        <?php } else echo "<div class='alert alert-warning'>Aucun produit !</div>"; ?>
                    
                    </table>     
            </div>
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
            
            </div>
            </div>
            
             
</div>

 
            
            
            
            

</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>