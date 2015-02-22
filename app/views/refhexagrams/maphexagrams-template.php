<div class="refhexagrams index">

	<h2><?php __('Refhexagrams');?></h2>
	<table border="1" cellspacing="0" cellpadding="0">
	  <tr>
	  	<?php 
			for($i = 8; $i >= 0;$i--){
				echo $trigramCells[$i];
			}
		?>
	  </tr>
	  	<?php
			foreach($mappedHexagrams as $row){
				echo '<tr>';
				foreach($row as $refhexagram){
					echo '<td style="text-align:center;"><table border="1" cellspacing="0" cellpadding="0">';
					// echo '<tr><td style="font-size:9px;text-align:center;">'.$refhexagram['Refhexagram']['infTrigram'].'</td><td style="font-size:9px;text-align:center;">'.$refhexagram['Refhexagram']['supTrigram'].'</td></tr>';
					echo '<tr><td>'.$refhexagram['Refhexagram']['level4branch'].'</td><td><strong>'.$refhexagram['Refhexagram']['id'].'</strong></td></tr>';
					echo '<tr><td>'.$refhexagram['Refhexagram']['level1branch'].'</td><td>'.$refhexagram['Refhexagram']['self'].' => '.$refhexagram['Refhexagram']['other'].'</td></tr>';
					echo '</table>';
					echo $refhexagram['Refhexagram']['element'].'<br/>';
					
					// Verifying Self / Other values 
					$x = $refhexagram['Refhexagram']['self'];
					if(($x + 3)>6){
						$x = (($x + 3) - 6);
					}else{
						$x = ($x + 3);
					}
					if ($x == $refhexagram['Refhexagram']['other']){
						$x = ($refhexagram['Refhexagram']['other'] - $x);
						echo $x.'<br/>';						
					}else{
						echo 'Error <br/>';
					}

					//
				}
				echo $trigramCells[$trigramIndex = $refhexagram['Refhexagram']['infTrigram']].'</tr>';
			}
		?>
	</table>

		<?php /*
			foreach($mappedHexagrams as $row){
				echo '<hr/>';
				foreach($row as $refhexagram){
					echo $refhexagram['Refhexagram']['supTrigram'].' => '.$refhexagram['Refhexagram']['infTrigram'].'<br/>';
				}
			} */
		?>
			
</div>

<?php 
	
		///
		
		$toBeMapped = array('refhexagrams' => $refhexagrams, 'mappedHexagrams' => $mappedHexagrams);

		echo $makenice->doDataMap($toBeMapped); 


?>
<!-- END Helper -->