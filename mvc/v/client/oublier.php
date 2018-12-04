<html> 
<body>
<?php include(dos.'mvc/v/head.php'); ?>
<div class="product-big-title-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-bit-title text-center">
<h2>Recuperation du compte</h2>
</div>
</div>
</div>
</div>
</div> <!-- End Page title area -->
<div class="container" style="padding:100px ;">

 
<div class="panel panel-info  col-md-6  col-md-offset-3" style="padding: 0;">
    <h1 class="panel-heading">Code client oublie !</h1>
    <div class="panel-body ">
    <?php if(isset($ok)) echo $ok; ?>
        <form  id="nv_clt" action="/client/oublier/" method="post" style="margin-top: 20px;" > 
     
        <b>
         
            CIN :<br/>          <input type="text" name="cin" class="form-control"   />
             
            E-mail :<br/>      <input type="text" name="email"  class="form-control"   />
             
            <input type="submit" name="oublier" value="Confirmer" class="btn-primary" />  
            <input class="btn-info" type="submit" name="annuler" value="Annuler" /> 
        </b>
 
        </form>
</div>
</div>
         
        
        
</div>        
<?php include(dos.'mvc/v/foot.php'); ?>
</body>
</html>