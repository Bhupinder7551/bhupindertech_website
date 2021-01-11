<section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Download bhupinder CV !</h2>
                <?php
				 include './CV download/config.php';
			$qy = "SELECT * FROM upload order by id desc";
			$log = mysqli_query($conn,$qy);
			
			while($row = mysqli_fetch_assoc($log)){	
				?> 
				<?php	
				if(!isset($_SESSION['username'])):?>
			  <a class="btn btn-light btn-xl" href="http://bhupindertech.com/login.php" data-toggle="tooltip" data-placement="top" title="To download CV Please Login your detail">Download Now!</a>
				             <?php else: ?>    
				
			  <a class="btn btn-light btn-xl" href="./CV download/download.php?filename=<?php echo $row['name']?>">Download Now!</a>
				<?php endif; ?>
     
			<?php }?>
                     </div>
        </section>
	<?php	
		