<?php

	include('header.php');
	include_once('functions.php');

?>
<script type="text/javascript">
function goBack() {
    window.history.back()

}
</script>

<div class="container shadow">
	<div class="row clearfix">
		<div class="col-md-4 col">
			<?php
			$x = 1000;
			
			
				
				if(isset($_SESSION['usertype']) && $_SESSION['usertype']==2  || isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
					{
						$id = $_POST['id'];
                  		$ename=$_POST['ename'];
        	          	$evenue=$_POST['evenue'];
            	      	$edates=$_POST['edates'];
                	  	$edatee=$_POST['edatee'];
             	     	$ctr1=$ctr2=0;
             	     	
				
                	  	echo "<table class='table table-striped table-hover' align='left'><tr class='success'></br>
						<tr class='success'><td>Program Name: </td><td>".$ename."</td></tr>
						<tr class='success'><td>Program Venue: </td><td>".$evenue."</td></tr>
						<tr class='success'><td>Program Start Schedule:</td><td>".$edates."</td></tr>
						<tr class='success'><td>Program End Schedule: </td><td>".$edatee."</td></tr>
						";
					
					echo"	<tr class='success'><td>Program Participants: </td><td></td></tr>";
					$result = mysql_query("SELECT r.* FROM residents_programs rp left join resident r on rp.res_id = r.res_id where rp.prog_id = ".$id."");
					while($row = mysql_fetch_array($result,MYSQL_ASSOC))
					{
						$ctr1++;
						$fname = $row['res_fname'];
						$lname = $row['res_lname'];
						$resid = $row['res_id'];
						
				
				//		echo '<form action="action/attendance.php" role = "form" method="GET">';
						echo"<tr class='success'><td></td><td>".$fname." ".$lname."</td></tr>";
						
						/*echo'<input type="checkbox" class="form-control" placeholder="" name="'.$fname, $lname.'" id="inputDefault" value = '.$resid.'/></td>
							<input type="hidden" value="'.$id.'" name="id">
							';
						echo"</tr>";
					*/	
					
					}	
						echo "<tr class='success'><td>Nuber of Expected Participants:</td><td>$ctr1</td></tr>";
						echo"</table>";

					//echo'<table><tr><td><button class="btn btn-primary" name="attendance">Submit</button></form></td>
					
					
						echo'<td><button onClick="goBack()"  class="btn btn-default">Back</button></td></tr></table>
					<br><br><form><input type="button" onClick="window.print()" value="Print Report"></form>';
				

				
			$x++;
		}?>
		</div>
		
	</div>
</div>

<?php
	include('footer.php');
?>