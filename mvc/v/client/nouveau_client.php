<html> 

<head> 
        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="/mvc/zebra/public/css/zebra_form.css"> 
        <!-- load Zebra_Form's JavaScript file -->
        <script src="/mvc/zebra/public/javascript/zebra_form.js"></script>
</head>

<body>
<?php include(dos.'mvc/v/head.php'); ?>
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>Nouveau Client</h2>
</div>
</div>
</div>
</div>
</div> <!-- End Page title area -->
<div class="container" style="padding:100px ;">




        <?php   if(isset($ok)){ ?> 
        <h3 class="alert-success alert" ><span class='fa fa-check' style='font-size:25;'></span> Inscription reuissite ! Veuillez consulter votre E-mail pour obtenir votre Code Client</h3><br />
        <?php }else{ ?>

<div class="panel panel-info">
    <h1 class="panel-heading">Nouveau Client</h1>
    <div class="panel-body">
    <?php echo isset($test)?$test:""; ?>
        <form  id="nv_clt" action="/client/nouveau/" method="post" style="margin-top: 20px;" > 
        <div style="padding: 5px;">
        <b>
        
        <div class="col-md-6">
            Nom :<br/>          <input required="" type="text" name="nom" class="form-control" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" />
            
            Prenom :<br/>       <input required="" type="text" name="prenom"  class="form-control"  value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>"/>
            
            Age :<br/>          <select required="" name="age" class="form-control"><?php for($i=20;$i<=70;$i++) echo"<option value='$i'> $i </option>"; ?></select>
            
            E-mail :<br/>      <input required="" type="text" name="email"  class="form-control"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
            
        </div>
        <div class="col-md-6">
            CIN :<br/>          <input required="" type="text" name="cin"  class="form-control"  value="<?php if(isset($_POST['cin'])) echo $_POST['cin']; ?>"/>
             
            Adresse :<br/>      <input required="" type="text" name="adresse"  class="form-control"  value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>"/>
        
            Telephone :<br/>    <input required="" style="margin-bottom: 15px;" type="text" name="tel"  class="form-control"  value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>"/>
            
            <input type="submit" name="ajouter_client" value="Confirmer" class="btn-primary" />  
            <input class="btn-info" type="submit" name="annuler" value="Annuler" />
        </div> 
        </b>
        </div>
        </form>
</div></div>
        
        <?php } ?> 
        
        
</div>        
<?php include(dos.'mvc/v/foot.php'); ?>
</body>
</html>