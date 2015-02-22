	//////////////////////////////////////////////////////
	/// START displayResponse		
		/*
		// formParameters :
		// formParameters.submitButtonId,
		// formParameters.validateMethod,
		// formParameters.displayMethod,
		// formParameters.responseLocation,
		// formParameters.iconPath,
		
		// responseText :
		// [{"id":"MockdataMockdatafield7","name":"data[Mockdata][mockdatafield7]","type":"textarea","tag":"TEXTAREA","value":""}]
		
		
		result = JSON.parse(responseText);
		
		alert(
			formParameters.submitButtonId + "\n\n" + 
			formParameters.validateMethod + "\n\n" + 
			formParameters.displayMethod + "\n\n" + 
			formParameters.responseLocation + "\n\n" + 
			formParameters.iconPath + "\n\n" + 
			result
		);*/
	function displayResponse(responseText, formParameters){
		
		responseObj = JSON.parse(responseText)[0];
		
		this.duration = 1000;
		
		switch(formParameters.displayMethod){
			case "each":
				showEach(responseObj, formParameters, this.duration);
				break;
			
			case "all":
				showAll(responseObj, formParameters, this.duration);
				break;
		}
		
	}/// END displayResponse
	
	
	//////////////////////////////////////////////////////
	/// START buildResponseMessage
	function buildResponseMessage(responseObj){
		
		this.fieldLabel = responseObj.labelText;
		
		if (responseObj.validationMessage == "Ok") {
			if (typeof this.fieldLabel == "undefined") {
				this.responseMessage = "";
			}else if(this.fieldLabel.search(/[A-z0-9]/) == -1){
				this.responseMessage = "";
			}else {
				this.responseMessage = this.fieldLabel  + " : ";
			}
		} else {
			if (typeof this.fieldLabel == "undefined") {
				this.responseMessage = "Please check the following fields : ";
			}else if(this.fieldLabel.search(/[A-z0-9]/) == -1){
				this.responseMessage = "Please check the following fields : ";
			}else {
				this.responseMessage = "Please check field \"" + this.fieldLabel  + "\" : ";
			}
		}
		
		this.responseMessage += responseObj.validationMessage;
		
		return this.responseMessage;
		
	}/// END buildResponseMessage
	
	
	//////////////////////////////////////////////////////
	/// START determineDivClass
	function determineDivClass(responseObj){
		
		switch(responseObj.validationStatus){
			
			case "Ok":
				this.divClass = "responseDivOk";
				break;
	
			case "Warning":
				this.divClass = "responseDivWarning";
				break;
	
			case "Error":
				this.divClass = "responseDivError";
				break;
			
		}
		
		return this.divClass;
		
	}/// END determineDivClass
	
	//////////////////////////////////////////////////////
	/// START getRespDivId (for radio fields only)
	function getRespDivId(fieldObj){
		
		this.radioName = fieldObj.attr("name");
		this.extractName = this.radioName.split("[");
		this.extractName = this.extractName[this.extractName.length-1].replace("]", "");
		this.respDivId = this.extractName + "RespDiv";
		return this.respDivId;
		
	}/// END getRespDivId
	
	//////////////////////////////////////////////////////
	/// START showEach
	function showEach(responseObj, formParameters, duration){

		if(responseObj.value.search(/[a-zA-Z0-9.@²&é~"#'(-è`_çà)=+£$%ù*µ<>?,;.:!\/]/) == -1){
			
			// field is empty
			// throw out white spaces
			
			$("#" + responseObj.id).attr("value", "");			
			
		}
		
		///
		this.fieldObj = $("#" + responseObj.id);					// the verified field selector
		
		if (responseObj.type == "radio") {							// the response DIV id (hypothetical, for checking if exists)
			this.responseDivId = this.getRespDivId(this.fieldObj);
		}else{
			this.responseDivId = responseObj.id + "RespDiv";
		}
					

		this.responseDivObj = $("#" + this.responseDivId);			// the response DIV selector (hypothetical, for checking if exists)
		
		this.divContent = $("#" + this.responseDivId)[0];			// the response DIV selector object elements
		
		this.responseMessage = this.buildResponseMessage(responseObj); // Build Response Message from responseObj
		
		this.divClass = this.determineDivClass(responseObj);		// Determine DIV Class to implement
		
		this.currentClass = this.responseDivObj.attr("class");		// Determine current DIV Class
		
		if(formParameters.responseLocation == "div"){				// check display method (case 'DIV')
			
			if(typeof this.divContent == "undefined"){				// check if responseDiv already exists
				if (responseObj.type == "radio") {
					this.targetElement = this.fieldObj.closest("fieldset");
					this.targetElement.after('<div id="' + this.responseDivId + '" class="responseDivProto">' + this.responseMessage + '</div>');
					$("#" + this.responseDivId).switchClass( "responseDivProto", this.divClass, duration );
				}else if(responseObj.type == "checkbox"){
					$("label[for='" + responseObj.id + "']").after('<div id="' + this.responseDivId + '" class="responseDivProto">' + this.responseMessage + '</div>');
					$("#" + this.responseDivId).switchClass( "responseDivProto", this.divClass, duration );
				} else {
					this.fieldObj.after('<div id="' + this.responseDivId + '" class="responseDivProto">' + this.responseMessage + '</div>');
					$("#" + this.responseDivId).switchClass( "responseDivProto", this.divClass, duration );
				}
				
			}else{
				
				$("#" + this.responseDivId).switchClass( this.currentClass, "responseDivProto", duration );
				setTimeout('$("#" + this.responseDivId)[0].innerHTML = this.responseMessage', (duration));
				setTimeout('$("#" + this.responseDivId).switchClass( "responseDivProto", this.divClass, duration )', (duration*1.5));
				
			}
			
		}else if(formParameters.responseLocation == "bubble"){
			
	
			
		}
		///
		
	}/// END showEach
	
	
	//////////////////////////////////////////////////////
	/// START showAll
	function showAll(responseObj, formParameters, duration){
		
		this.formDomElement = $("#" + formParameters.submitButtonId.closest("form")[0].id );
		
		this.divContent = $("#formResponse")[0];
		
		// if(responseObj.value.search(/[a-zA-Z0-9.@²&é~"#'(-è`_çà)=+£$%ù*µ<>?,;.:!\/]/) != -1){
		
		if(typeof this.divContent == "undefined"){
			
			if(formParameters.responseLocation == "before"){
				this.formDomElement.before('<div id="formResponse" class="responseProto"><div>Please check the following fields :<ul></ul></div></div>');
				this.formDomElement.before('<div id="responseSpacer" class="responseSpacerProto"></div>');
			}else if(formParameters.responseLocation == "after"){
				this.formDomElement.after('<div id="formResponse" class="responseProto"><div>Please check the following fields :<ul></ul></div></div>');
				this.formDomElement.after('<div id="responseSpacer" class="responseSpacerProto"></div>');
			}
			
			$( "#formResponse" ).switchClass( "responseProto", "responseDisplayed", duration );
			$( "#responseSpacer" ).switchClass( "responseSpacerProto", "responseSpacer", duration );
			$("#formResponse div ul").append('<li class="responseProto">' + responseObj.value + '</li>');
			setTimeout('$("#formResponse div ul li.responseProto").switchClass( "responseProto", "responseDisplayed", duration )', (duration*1.5));
		
		}else{
			
			$("#formResponse div ul").append('<li class="responseProto">' + responseObj.value + '</li>');
			$("#formResponse div ul li.responseProto").switchClass( "responseProto", "responseDisplayed", duration );
			
		}
		
		/*}else{
			
			$("#" + responseObj.id).attr("value", "");			
			
		}*/

	}/// END showAll