<table class="table table-hover table-striped" id="table1">
<div id="results" class="text-center"></div>
<tr><th>Entit&eacute;</th> <th>Valeur</th><th><i class="fa fa-cog"></i></th></tr>



<form  id="myForm" method="post">
 
        <tr>
            <td>nom</td>      
            <td><input id="nom" type='' name='' value='<?php echo $client->nom; ?>' /></td>     
            <td><a  id="submitFormData" onclick='SubmitFormData();' ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>prenom</td>   
            <td><input id="prenom" type='' name='' value='<?php echo $client->prenom; ?>' /></td>  
            <td><a id='mdf_p' onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>age</td>      
            <td><input id="age" type='' name='' value='<?php echo $client->age; ?>' /></td>     
            <td><a id='mdf_a' onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>adresse</td>  
            <td><input id="adresse" type='' name='' value='<?php echo $client->adresse; ?>' /></td> 
            <td><a id='mdf_ad' onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>cin</td>      
            <td><input id="cin" type='' name='' value='<?php echo $client->cin; ?>' /></td>     
            <td><a id='mdf_c' onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>e-mail</td>   
            <td><input id="email" type='' name='' value='<?php echo $client->email; ?>' /></td>   
            <td><a id='mdf_e' onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
                                    
                                    
                                    
        <tr><td>Num&eacute;ro t&eacute;l&eacute;phone</td> 
            <td><input id="tel" type='' name='' value='<?php echo $client->tel; ?>' /></td>
            <td><a  id='mdf_t' id="" onclick='SubmitFormData();'><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
        </tr>
        
</form>
</table>
<a class="btn-success btn pull-right" onclick='SubmitFormData();'>Modifier Tous</a> 
  
<script>
   function SubmitFormData() { 
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var age = $("#age").val();
    var email = $("#email").val();
    var adresse = $("#adresse").val();
    var cin = $("#cin").val();
    var tel = $("#tel").val();
    
    $.post("/client/modifier/", { nom: nom, prenom: prenom, age: age, email: email,adresse:adresse,cin:cin,tel:tel  },
    function(data) { 
	 $('#results').html(data); 
    });
    }
</script> 
<style> #table1 a{ cursor: pointer; } </style>