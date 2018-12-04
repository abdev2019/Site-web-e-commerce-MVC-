<html>
<title>Client</title>
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
     
    <div class="tab-content">
    
    <div  role="tabpanel" class="tab-pane <?php if(!isset($non))echo 'active'; ?>" id="compte">
    <div class="col-md-9"> 
            <div class="panel panel-info"> 
            <h4 class="panel-heading" style="margin-bottom: 0;">Informations</h4>
            <div class="panel-body" style="padding: 0;"  >
            <table class="table table-hover table-striped"   >
                    <tr><th>Entit&eacute;</th> <th>Valeur</th></tr>
                    <?php
                    echo "<tr><td>nom</td> <td>".$client->nom."</td></tr>";
                    echo "<tr><td>prenom</td> <td>".$client->prenom."</td></tr>";
                    echo "<tr><td>age</td> <td>".$client->age."</td></tr>";
                    echo "<tr><td>adresse</td> <td>".$client->adresse."</td></tr>";
                    echo "<tr><td>cin</td> <td>".$client->cin."</td></tr>";
                    echo "<tr><td>e-mail</td> <td>".$client->email."</td></tr>";
                    echo "<tr><td>Num&eacute;ro t&eacute;l&eacute;phone</td> <td>".$client->tel."</td></tr>";
                    ?>
            </table>
            </div>
            </div>
    </div>
    </div> 
      
    <div role="tabpanel" class="tab-pane" id="modifier">
    <div class="col-md-9">
        <div class="panel panel-info">
        <h4 class="panel-heading"  style="margin-bottom: 0;">Modificaton</h4>
        <div class="panel-body" style="padding: 0;">
        <?php include(dos.'mvc/v/client/modifier.php'); ?>
        </div>
        </div>
    </div>
    </div>
     
    <div role="tabpanel" class="tab-pane <?php if(isset($non))echo 'active'; ?>" id="suprimer">
    <div class="col-md-9"> 
        <div class="panel panel-info">
        <h4 class="panel-heading">Supression de compte</h4>
        <div class="panel-body" > 
            
            <form  id="nv_clt" action="/client/suprimer/#suprimer" method="post" style="margin-top: 20px;" > 
            <div style="padding: 5px;">
            <b> 
            <div class="col-md-6 col-md-offset-3">
            <?php if(isset($non)) echo '<div class="alert-warning alert"><span class="fa fa-exclamation-triangle fa-lg"></span> &nbsp;Code client incorect !</div>'; ?>
                Code client :<br/><input type="password" name="code_client" class="form-control" />
                 <br /><br />
                <input type="submit" name="suprimer" value="Suprimer" class="btn-danger" />  
                <a class="btn-info" style="padding: 12;" href="/client">Annuler</a>
            </div> 
            </b>
            </div>
            </form>  
        </div>
        </div>
    </div>
    </div>
    
    <div role="tabpanel" class="tab-pane <?php if(isset($non))echo 'active'; ?>" id="modifier_code">
    <div class="col-md-9"> 
        <div class="panel panel-info">
        <h4 class="panel-heading">Modifier Code Client</h4>
        
        <div class="panel-body" > 
        
            <form  id="nv_clt" action="/client//#" method="post" style="margin-top: 20px;" > 
            <div style="padding: 5px;"> 
            <b> 
            
            <div class="col-md-6 col-md-offset-3">
            <div id="res"></div> 
                Ancien code client :<br/><input type="password" name="code" class="form-control" id="code" /><br/>
                Nouveau code client :<br/><input type="password" name="ncode" class="form-control" id="ncode" /><br/>
                R&eacute;p&eacute;ter le nouveau code client :<br/><input type="password" name="rncode" id="rncode" class="form-control" />
                 <br /><br />
                <a onclick="modifier_code();" class="btn-danger btn">Modfier</a> 
                <a href="/client" class="btn-primary btn" >Annuler</a>
            </div> 
            </b>
            </div>
            </form>  
        </div>
        </div>
    </div>
    </div> 
    <script>
        function modifier_code() { 
            var code = $("#code").val();
            var ncode = $("#ncode").val();
            var rncode = $("#rncode").val(); 
            
            $.post("/client/modifier_code/", { code: code, ncode: ncode, rncode: rncode },
            function(data) { 
            $('#res').html(data); 
            });
        }
    </script> 
      
    </div>
    
</div> 

<script>
    $(document).ready(function(){
        if(window.location.hash=='') window.location.hash='#compte';
        activaTab(window.location.hash); 
        window.scrollTo(0, 200);
    }); 
    function activaTab(tab){
        $('.nav-tabs a[href="/client/' + tab + '"]').tab('show');
    };
</script>
 
</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html> 
