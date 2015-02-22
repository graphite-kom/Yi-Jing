// JavaScript Document

		///////////////////////////////////////////////////////////////////////////////////////////
		// START Define variables
		
		var openingHtml;
		var closingHtml;
		
		// if value is filled out properly
		openingHtml = '<label for="QuestionEfficaceDescription">Efficace Description</label>';
		openingHtml += '<select name="data[Question][efficaceDescription]"  id="QuestionEfficaceDescription">';
		openingHtml += '<option value=""></option>';
		// else 
		openingHtmlEmpty = '<label for="QuestionEfficaceDescription">Efficace Description</label>';
		openingHtmlEmpty += '<select name="data[Question][efficaceDescription]"  id="QuestionEfficaceDescription" disabled>';
		openingHtmlEmpty += '<option value=""></option>';
			/*openingHtml += '<option value="wealth">Wealth</option>';
			openingHtml += '<option value="child">Child</option>';
			<option value="brother">Bother</option>
			<option value="parent">Parent</option>
			closingHtml = '<option value="official">Official</option>';*/
		closingHtml += '</select>';
		///////////////////////////////////////////////////////////////////////////////////////////
		//// START Arrays of values (depending on efficace utilitaire choisi)
		
		////// START Wealth
			var wealthArray = new Array();
			wealthArray = {'relationship' : 'Interpersonnal relationship', 'wealth' : 'Wealth, Work, Business'};	
		////// END Wealth
		
		////// START Child
			var childArray = new Array();
			childArray = {'opportunity' : 'Opportunity', 'child' : 'Children (family)'};
			// childArray{'' : '', '' : '', '' : '', '' : '', };
		////// END Child
		
		////// START Brother
			var brotherArray = new Array();
			brotherArray = {'brother' : 'Brother (family)', 'friendship' : 'Friendship', 'partnership' : 'Partnership'};
		////// END Brother
		
		////// START Parent
			

			var parentArray = new Array();
			parentArray = {'parent':'Parent (family)', 'guide':'Guidance', 'diploma':'Diploma', 'papers':'Official papers'};
		////// END Parent
		
		////// START Official
			var officialArray = new Array();
			officialArray = {'relationship':'Interpersonnal relationship', 'law':'Law', 'constraint':'Constraint'};
		////// END Official
		
		////// START Default
			var defaultArray = new Array();
			defaultArray = {'0':'XXXXXX'};
		////// END Default
		
	
		//// END Arrays of values
		// END Define variables
		///////////////////////////////////////////////////////////////////////////////////////////
		
		// Generate Options
		
		function generateOptions(arrayToUse){
			var optionsHtml = '';
			for (key in arrayToUse){
				if(arrayToUse[key] == 'XXXXXX'){
					optionsHtml += '<option value="">XXXXXX</option>';
				}else{
					optionsHtml += '<option value="'+key+'">'+arrayToUse[key]+'</option>';
				}
			}
			return optionsHtml;
		}
		
		// Generate HTML
		function generateHtml (newValue){
			
			switch(newValue){
				
				case 'wealth':
					arrayToUse = wealthArray;
					break;
				
				case 'child':
					arrayToUse = childArray;
					break;
				
				case 'brother':
					arrayToUse = brotherArray;
					break;
				
				case 'parent':
					arrayToUse = parentArray;
					break;
				
				case 'official':
					arrayToUse = officialArray;
					break;
				
				default:
					arrayToUse = defaultArray;

			}
			
			optionsHtml = generateOptions(arrayToUse);
			
						htmlresponse = openingHtml+optionsHtml+closingHtml;
						if(newValue == ''){
							htmlresponse = openingHtmlEmpty+optionsHtml+closingHtml;

						}else{
							htmlresponse = openingHtml+optionsHtml+closingHtml;
							
						}
			
			return htmlresponse;
			
		}
		//
	
		function setDefaultOptions(descDefaultValue){
				// See http://www.w3schools.com/jsref/prop_select_selectedindex.asp
				// and http://www.w3schools.com/js/js_ex_dom.asp
				// as documentation
				// get the list of select box values
				allOptions = document.getElementById('QuestionEfficaceDescription');
				// run loop to find out which one is identical to the extracted value
				// tracing : // txt="All options: ";
				for(i=0; i<allOptions.length;i++){
					// tracing : //  txt=txt + "\n" + allOptions.options[i].value;
					
					// for each compare option values with the extracted value
					if(allOptions.options[i].value == descDefaultValue){
						indexToSelect = i;
					}
					
				}
				document.getElementById('QuestionEfficaceDescription').selectedIndex = indexToSelect;
				document.getElementById('descDefaultValue').value = '';
				// tracing : // alert(txt);
		}
		//
		
		function changeOptions(){
			newValue = document.getElementById('QuestionEfficaceUtilitaire').value;
			htmlresponse = generateHtml(newValue);
			document.getElementById('efficaceDescriptionDiv').innerHTML = htmlresponse;
			
			///////////////////////////////
			// For Edit page
			// extract previously selected value from hidden input (filled out with PHP)
			descDefaultValue = document.getElementById('descDefaultValue').value;
			//Check if this value is not undefined
			//(in add page this value IS undefined)
			if(descDefaultValue != undefined || descDefaultValue != ''){
				// fire action to set the default selected option in select box
				// sending the extracted default value
				setDefaultOptions(descDefaultValue);
			}
		}
		
		/*function setDefaultOptions(){
			newValue = document.getElementById('QuestionEfficaceUtilitaire').value;
			htmlresponse = generateHtml(newValue);
			document.getElementById('efficaceDescriptionDiv').innerHTML = htmlresponse;
			//
			descDefaultValue = document.getElementById('descDefaultValue').value;
			if(descDefaultValue != undefined){
				// document.getElementById('QuestionEfficaceDescription').selected = descDefaultValue;
				alert(descDefaultValue);
			}
			// alert(newValue);
		
		}*/