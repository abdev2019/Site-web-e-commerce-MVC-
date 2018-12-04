<html>
<title>Administrateur :: connexion</title>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5">
 
            <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
            <h2 class="panel-heading text-center">Connexion</h2>
            <div class="panel-body"> 
            <b>  
            <div> 
                        <span id="con"></span>
                        
                        <form  id="myForm" method="post">
                        <center>
                            <table>
                            <tr>
                                <td>Nom d'utilisateur &nbsp;&nbsp;&nbsp; </td><td> 
                                <input id="nom_utilisateur" class="form-control" type="text" name="nom_utilisateur"  value="<?php if(isset($_POST['cin'])) print $_POST['cin']; ?>"       maxlength="30" />
                                </td>
                            </tr> 
                            
                            <tr>
                                <td style="padding-top:30;">Mot de passe &nbsp;&nbsp;&nbsp; </td><td  style="padding-top: 30;">
                                <input id="mot_de_passe" class="form-control" type="password" name="mot_de_passe" value="<?php if(isset($_POST['code_client'])) print $_POST['code_client']; ?>" maxlength="30"/></td>
                            </tr>
                            </table>  
                        <center class="vert-offset-top-3">
                            <a class="btn-primary btn"  style="min-width: 110;"  onclick="connecter();" >connexion</a> 
                            <a href="/" class="btn-info btn" style="min-width: 110;"   >annuler</a> 
                        </center> 
                        </center> 
                        </form> 
                        
                        <script>
                            function connecter() { 
                                var nom_utilisateur = $("#nom_utilisateur").val();
                                var mot_de_passe = $("#mot_de_passe").val();  
                                $.post("/admin/connecter/", { nom_utilisateur: nom_utilisateur, mot_de_passe: mot_de_passe  },
                                function(data) {   
                                        $('#con').html(data); 
                                });
                            }
                        </script>
                        
            </b>
            </div>
            </div>
            </div>
            </div>
            

</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>