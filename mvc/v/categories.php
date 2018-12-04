<html>
<title>Marques & Categories</title>
<body>
<?php  include('head.php'); ?>

                <div class="product-big-title-area">
                <div class="container">
                <div class="row">
                <div class="col-md-12">
                <div class="product-bit-title text-center">
                <h2>Cat&eacute;gories & Marques</h2>
                </div>
                </div>
                </div>
                </div>
                </div>
 
<div class="container"> 
 


                <div class="col-mds-6 " style="padding:0"> 
                <!-- <h1><u>Cat&eacute;gories :</u></h1>--><br /><br />
                <?php  foreach($categories as $cat){ ?> 
                
		<div class='col-md-2 text-center'style=' height:140px;'  > 
			<a href="/produit/categorie/<?php print $cat->id; ?>"> 

			<?php if( is_file("public/images/categorie/{$cat->id}.png") ){ ?>
				<img  src='/public/images/categorie/<?php echo $cat->id; ?>.png' style='width:100px; height:90px;' /><br>
				<?php print  htmlentities($cat->nom, ENT_QUOTES,'iso-8859-1'); ?>
			<?php }else{ ?>
				<img  src='/public/images/categorie/0.png' style='width:100px; height:50px;' /><br>
				<?php print  htmlentities($cat->nom, ENT_QUOTES,'iso-8859-1'); ?>
			<?php } ?>

			<br>
                	
                	</a>  
		</div> 

                <?php } ?>   
                </div>
        <div class="col-md-12 vert-offset-top-6">
        <div class="brand-wrapper">
        <div class="brand-list"> 
            <?php  foreach($marques as $marque){ ?> 
            <a href="/produit/marque/<?php echo $marque->id; ?>"><img src="/public/images/marque/<?php echo $marque->logo; ?>" alt="Oops !"/></a>  
            <?php } ?>                        
        </div> 
        </div>
        </div>
        
        
</div>

 
<?php  include('foot.php'); ?>
</body>
</html>