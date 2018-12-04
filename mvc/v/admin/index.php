<html>
<title>Administrateur</title>
<style> input[type='submit']{ margin-top: 20px; }  </style>
<body>
<?php require_once(dos."mvc/v/admin/head.php"); ?>  
<div class="product-big-title-area"><div class="container"><div class="row"><div class="col-md-12"><div class="product-bit-title text-center"><h2>Administration</h2></div></div></div></div></div>

<div class="container vert-offset-top-5" style="padding: 0; margin: 0;width:100%;"> 
<br /><br />

   
             
             
             
            <div class="col-md-12">
            <?php include('menu.php'); ?>
            <div class="panel panel-info">
            <h4 class="panel-heading" style="margin-bottom: 0;">Administrateur : Informations</h4>
            <div class="panel-body" style="padding: 0;"  >
            <div id="resultat"></div>
             
            <?php if(isset($_GET['_mod'])){ ?><br /><div class='alert-success alert text-center'><span class='fa fa-check' style='font-size:20;'></span> Modification Reuissite</div><?php } ?>
           
            
            <table class="table table-hover table-striped"   >
                    <tr><th>Entit&eacute;</th> <th>Valeur</th> <th>Nouvelle valeur</th> <th></th> </tr>
                    <?php
                        echo "<tr><td>nom</td> <td>".$admin->nom."</td> <td><input id='nom' class='form-control' value='$admin->nom' name='' type='text' /></td><td><a  id='submitFormData' onclick='modifier();' ><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a></td> </tr>";
                        echo "<tr><td>prenom</td> <td>".$admin->prenom."</td> <td><input id='prenom' class='form-control'  value='$admin->prenom'  name='' type='text' /></td><td><a  id='submitFormData' onclick='modifier();' ><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a></td> </tr>";
                        echo "<tr><td>age</td> <td>".$admin->age."</td> <td><input id='age' class='form-control'  value='$admin->age'  name='' type='text' /></td><td><a  id='submitFormData' onclick='modifier();' ><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a></td> </tr>";
                        echo "<tr><td>E-mail</td> <td>".$admin->email."</td> <td><input id='email' class='form-control'  name='' value='$admin->email'  type='text' /></td><td><a  id='submitFormData' onclick='modifier();' ><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a></td> </tr>"; 
                    ?>
            </table>
            </div>
            </div>
            </div>  
            <script>
               function modifier() { 
                var nom = $("#nom").val();
                var prenom = $("#prenom").val();
                var age = $("#age").val();
                var email = $("#email").val(); 
                
                $.post("/admin/modifier/", { nom: nom, prenom: prenom, age: age, email: email },
                function(data) { 
            	 $('#resultat').html(data); 
                });
                }
            </script> 
            

</div>
<?php require_once(dos."mvc/v/foot.php"); ?> 
</body>
</html>