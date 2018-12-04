    <div class="col-md-3"> 
    <div class="panel panel-info">
    <h4 class="panel-heading">Menu</h4>
    <div class="panel-body">
    <ul class="nav nav-pills  nav-stacked nav-tabs" role="tablist"  style="border: none;">
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Mes Informations <span class="caret"></span></a>
            <ul class="dropdown-menu"> 
                <li role="presentation"><a href="/client/#compte"  aria-controls="compte" role="tab" data-toggle="<?php if( !isset($acc) )echo"a"; ?>tab"> Mes Informations </a></li>
                <li role="presentation"><a href="/client/#modifier"  aria-controls="modifier" role="tab" data-toggle="<?php if( !isset($acc) )echo"a"; ?>tab"> Modifier </a></li>
                <li role="presentation"><a href="/client/#suprimer"  aria-controls="suprimer" role="tab" data-toggle="<?php if( !isset($acc) )echo"a"; ?>tab"> suprimer Mon Compte </a></li>
            </ul>
        </li>  
        
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Mes commandes <span class="caret"></span></a>
            <ul class="dropdown-menu"> 
                <li role="presentation"><a  href="/client/commandes/"   > Tous </a></li>
                <li role="presentation"><a  href="/client/commandes/valide"     > valid&eacute; </a></li>
                <li role="presentation"><a  href="/client/commandes/non_valide" > Non valid&eacute; </a></li> 
            </ul>
        </li>
        <li><a href="/client/demande_reparation/">Demande une reparation</a></li>  
        
        
        
        <li role="presentation"><a href="/client/#modifier_code" aria-controls="modifier_code" role="tab" data-toggle="<?php if( !isset($acc) )echo"a"; ?>tab">Modifier Code Client</a></li>  
        
        <hr/>
        <li role="presentation"><a href="/client/deconnexion">Deconnexion</a></li> 
    </ul> 
    </div>
    </div>
    </div>
