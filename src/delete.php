<?php
				$repId = $values["Repas"];
				
				$sqldelet = "DELETE FROM commande WHERE Repas ='$repId'";
				
				if(mysqli_query($connect,$sqldelet)){
					echo 'Success';
				}
				
				else{
					mysqli_error($connect);
				}

?>