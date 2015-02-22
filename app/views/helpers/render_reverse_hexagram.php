<?php
	
	class RenderReverseHexagramHelper  extends AppHelper{


		// Inverser les valeurs de l'hexagramme
		function reverseValues($hexagram){

			$local_array = array();

			$hexagram_traits = $hexagram['Trait'];

			$i = 0;

			foreach($hexagram_traits as $trait){

				//

				$trait_position 					= $trait["traitPosition"];

				$trait_value 						= $trait["traitValue"];

				// 

				switch ($trait_value) {
					
					case 6:
						$trait_final_value = 6;
						break;


					case 7:
						$trait_final_value = 8;
						break;

					
					case 8:
						$trait_final_value = 7;
						break;

					
					case 9:
						$trait_final_value = 9;
						break;

					
				}

				//

				$local_array[$i]["traitPosition"] 	= $trait_position;

				$local_array[$i]["traitValue"] 		= $trait_final_value;

				$i++;

			}

			return $local_array;

		}


		// retourner les valeurs mutées de l'hexagramme inversé
		function getReverseMutatedHexagram($reverse_values_array){

			$local_array = array();

			$i = 0;

			foreach ($reverse_values_array as $trait) {
				
				// echo $trait["traitPosition"]." = ".$trait["traitValue"]."<br/>";

				$trait_position = $trait["traitPosition"];

				$trait_value = $trait["traitValue"];

				switch ($trait_value) {
					
					case 6:
						$trait_final_value = 7;
						break;


					case 7:
						$trait_final_value = 7;
						break;

					
					case 8:
						$trait_final_value = 8;
						break;

					
					case 9:
						$trait_final_value = 8;
						break;
					
				}

				$local_array[$i]["traitPosition"] = $trait_position;

				$local_array[$i]["traitValue"] = $trait_final_value;

				$i++;

			}

			return $local_array;

		}


		function doRenderReverseHexagram($hexagram){

			$reverse_values_array = $this->reverseValues($hexagram);

			//

			$reverse_mutated_values_array = $this->getReverseMutatedHexagram($reverse_values_array);

			//

			foreach ($reverse_values_array as $key => $value) {
				
				echo $value["traitPosition"]." = ".$value["traitValue"]."<br/>";

			}

		}
		
	}

?>