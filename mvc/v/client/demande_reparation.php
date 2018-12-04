<html>
<title>Demande Une Reparation</title>
<body>
<?php require_once(dos."mvc/v/head.php"); ?> 



<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Demande Une Reparation</h2></div></div></div></div></div>

<div class="container vert-offset-top-4">
            <?php include('menu.php'); ?>
            
                <!--contact-->
                <div class="contact-top" >   
                    <div class="col-md-9 contact-top-right"> 
                    <div class="panel panel-info"> 
                    <h4 class="panel-heading" style="margin-bottom: 0;">Demande Une Reparation</h4>
                    <div class="panel-body" >
                        <?php
                            if(isset($test))
                            {
                                if(strlen($test)==0)
                                    echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok'></span> Votre Demande Est R&eacute;&ccedil;u ! un message de confirmation sera envoy&eacute; &agrave; votre adresse e-mail !</center></div>"; 
                                else echo "<div class='col-mdd-8 col-mdd-offset-4'>".$test."</div>";
                            }
                        ?>
                        <form action="#" method="post">
                        <b>
                        Categorie : <br /> 
                        <select class="form-control" name="categorie"> <?php foreach($categories as $categorie) echo "<option value='$categorie->nom'>".htmlentities($categorie, ENT_QUOTES,'iso-8859-1')."</option>"; ?> </select>
                        <br />
                        
                        Nom du materiel : <br />
                        <input name="materiel" type="text" value="<?php if(isset($_POST['materiel'])) print $_POST['materiel']; ?>" required="" class="form-control"   placeholder="Materiel" />
                        <br />  
                        
                        Description : <br /> 
                        <textarea name="des" required="" placeholder="description" class="form-control" style="width:100%; height: 200px;border-bottom:none" ><?php if(isset($_POST['des'])) print $_POST['des']; ?></textarea>
                        
                        <div style="border: solid 0.01em #ccc;"> 
                        <div class="sub-button" style="padding-left: ;width:100%;"><input type="submit" name="demande_reaparation" value="envoyer" class="btn-primary" style="width:100%;"/></div>
                        </div>
                        </b>
                        </form>
                    </div>
                    
                    </div>
                    </div>
                     
                </div>  
</div>
    
<?php require_once(dos."mvc/v/foot.php"); ?>
    
</body>
</html> 
