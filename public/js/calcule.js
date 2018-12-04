var t=0;
for(i=0; i<$('#nbr').val();i++) 
$('#total').html( t = parseFloat($('#total').html()) + parseFloat( $('#total'+i).html() )  );
$('#total_prix').val(t); 

function plus(i)
{ 
$('#nbr'+i).val( parseInt($('#nbr'+i).val())+1 ); 
calculer(i);
}
function minus(i)
{
if(parseInt($('#nbr'+i).val())>1)
{
$('#nbr'+i).val( parseInt($('#nbr'+i).val())-1 ); 
calculer(i,true);
}
}
function calculer(i,min=false)
{
var prix = parseFloat( $('#prix'+i).html() ); 
var nbr  = parseInt(   $('#nbr'+i ).val() );  
$('#total'+i).html( (prix*nbr)+' DHs' ); 
if(min) $('#total').html( prix = parseFloat($('#total').html()) -  prix );
else $('#total').html( prix = parseFloat($('#total').html()) +  prix ); 
$('#total_prix').val(prix); 
}