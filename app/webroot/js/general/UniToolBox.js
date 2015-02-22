//////////////////////////////////////////////////////////////////////////////
/////		START validation.js
//////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////
	// START validateClass()
	function validateClass(element){
		
		// Extract submit button
		this.submitButton = element;
		
		// Extract parent form
		this.getElementForm = function(nodeInQuestion){
			while(nodeInQuestion.tagName != "FORM"){
				nodeInQuestion = nodeInQuestion.parentNode;
			}
			// output form node
			return nodeInQuestion;
		};
		
		// Set formId
		this.form = this.getElementForm(element);
		this.formId = this.getElementForm(element).id;
		
		// extract all inputs
		this.allInputs = this.form.getElementsByTagName('input');
		this.allInputsCount = this.allInputs.length;
		//
		this.getInputIds = function(formInputs){
			this.tmpArray = new Array();
			this.tmpArrayTypes = new Array();
			this.tmpArrayIds = new Array();
			this.tmpArrayNames = new Array();
			this.tmpArrayValues = new Array();
			
			for(i = 0; i < this.allInputsCount; i++){
				
				this.tmpArrayTypes.push(formInputs[i].type);
				this.tmpArrayIds.push(formInputs[i].id);
				this.tmpArrayNames.push(formInputs[i].name);
				this.tmpArrayValues.push(formInputs[i].value);
				
			}
			
			// place in an array
			this.tmpArray.push(this.tmpArrayTypes);
			this.tmpArray.push(this.tmpArrayIds);
			this.tmpArray.push(this.tmpArrayNames);
			this.tmpArray.push(this.tmpArrayValues);
			
			return this.tmpArray;
		};
		
		// fire function extracting all form inputs
		this.inputIdsArr = this.getInputIds(this.allInputs);
		
		alert('Hello world !! - ' + this.formId + ' - ' + this.allInputs[7].id + ' => ' + this.inputIdsArr);
		
		this.form.submit();
		
	}

	//////////////////////////////////////////////////////////////////////////
	// START validateForm()
	function validateForm(element){
		
		var validation = new validateClass(element);
		
	}


//////////////////////////////////////////////////////////////////////////////
/////		END validation.js
//////////////////////////////////////////////////////////////////////////////
