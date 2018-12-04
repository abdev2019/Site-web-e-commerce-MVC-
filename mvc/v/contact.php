<html>
<title>Contact</title>
<body>
<?php require_once(dos."mvc/v/head.php"); ?> 



<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Contact</h2></div></div></div></div></div>

            <div class="container" style="padding: 50px 100px;">
                <!--contact--> 
                <div class="contact-top" > 
                    <div class="col-md-4 contact-top-left">
                    <div style="margin-left: -45;padding-bottom: 80;"><a href="/"><img id="logo_site" src="/public/images/sopsi/logo.png" /></a></div>
                    
                        <div class="contact-top-one">
                        <h4>Adresse:</h4>
                        Agadir, 33 Rue Drarga Talborjt SOPSI     
                        </p>
                        </div><br />
                        <div class="contact-top-one">
                        <h4>T&eacute;l:</h4>
                        <p>
                        TEL : <a href="tel:0528824629">05-28-82-46-29</a><br/>FAX : <a href="tel:0528846505">0528-84-65-05</a>
                        </p>
                        </div><br/>
                        <div class="contact-top-one">
                        <h4>E-mail:</h4>
                        <p><a href="mailto:sopsi.agadir@gmail.com">sopsi.agadir@gmail.com</a></p>
                        </div>
                    </div>
                
                    <div class="col-md-8 contact-top-right" style="float: right;"> 
                                    <?php
                if(isset($test))
                {
                    if(strlen($test)==0)
                        echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok'></span> Votre Message Est Envoy&eacute;. Merci pour votre interet!</center></div>"; 
                    else echo "<div class='col-mdd-8 col-mdd-offset-4'>".$test."</div>";
                }
                ?>
                        <form action="#" method="post">
                        
                        <input name="nom" type="text" value="<?php if(isset($_POST['nom'])) print $_POST['nom']; ?>" required="" class="form-control"   placeholder="Nom" />
                        <br />
                        <input name="prenom" type="text" value="<?php if(isset($_POST['prenom'])) print $_POST['prenom']; ?>" required="" class="form-control"   placeholder="Prenom" />
                        <br />
                        <input name="email" type="text" required="" class="form-control" value="<?php if(isset($_POST['email'])) print $_POST['email']; ?>"  placeholder="E-mail" />
                        <br />
                        
                        <div style="border: solid 0.01em #ccc;">
                        <textarea name="des" required="" placeholder="description" class="btn-default" style="width:100%; height: 200px;border:none;" ><?php if(isset($_POST['des'])) print $_POST['des']; ?></textarea>
                        <div class="sub-button" style="padding-left: ;width:100%;"><input type="submit" name="envoyer" value="envoyer" class="btn-primary" style="width:100%;"/></div>
                        </div>
                        
                        </form>
                    </div>
                    
                    <div class="clearfix"> </div> 
                </div> 
            </div>
    
<?php require_once(dos."mvc/v/foot.php"); ?>
    
</body>
</html> 
