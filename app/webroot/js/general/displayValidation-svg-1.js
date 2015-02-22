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
	/// START showEach
	function showEach(responseObj, formParameters, duration){
		
		// debugger;
		
		if(responseObj.value.search(/[a-zA-Z0-9.@²&é~"#'(-è`_çà)=+£$%ù*µ<>?,;.:!\/]/) != -1){
			
			///
			this.fieldObj = $("#" + responseObj.id);
			
			this.responseDivId = responseObj.id + "RespDiv";

			this.responseDivObj = $("#" + this.responseDivId);
			
			this.divContent = $("#" + this.responseDivId)[0];
			
			this.fieldLabel = $("label[for = " + responseObj.id + "]");
			
			if(formParameters.responseLocation == "div"){
				
				if(typeof this.divContent == "undefined"){
					if (responseObj.type == "radio" || responseObj.type == "checkbox") {
						
						$('input[name="' + responseObj.name + '"] ~ div.responseHolder div.responseDivCheckableDisplayed').fadeOut(duration);
						setTimeout('$("input[name=\"" + responseObj.name + "\"] ~ div.responseHolder").remove()', duration);
						this.fieldLabel.after('<div class="responseHolder"><div id="' + this.responseDivId + '" class="responseDivCheckableProto">Please check the following fields : ' + responseObj.value + '</div></div>');
						$("#" + this.responseDivId).switchClass( "responseDivCheckableProto", "responseDivCheckableDisplayed", duration );
					} else {
						this.fieldObj.after('<div id="' + this.responseDivId + '" class="responseDivProto">Please check the following fields : ' + responseObj.value + '</div>');
						$("#" + this.responseDivId).switchClass( "responseDivProto", "responseDivDisplayed", duration );
					}
					
				}else{
					$("#" + this.responseDivId).switchClass( "responseDivDisplayed", "responseDivProto", duration );
					setTimeout('$("#" + this.responseDivId)[0].innerHTML = "Please check the following fields : " + responseObj.value + " again"', (duration));
					setTimeout('$("#" + this.responseDivId).switchClass( "responseDivProto", "responseDivDisplayed", duration )', (duration*1.5));
				}
				
			}else if(formParameters.responseLocation == "bubble"){
				
		
				
			}
			///
			
			
		}else{
			
			// field is empty
			// throw out white spaces
			
			$("#" + responseObj.id).attr("value", "");
			
		}
		
	}/// END showEach
	
	
	//////////////////////////////////////////////////////
	/// START showAll
	function showAll(responseObj, formParameters, duration){

		this.formDomElement = $("#" + formParameters.submitButtonId.closest("form")[0].id );
		
		this.divContent = $("#formResponse")[0];
		
		if(responseObj.value.search(/[a-zA-Z0-9.@²&é~"#'(-è`_çà)=+£$%ù*µ<>?,;.:!\/]/) != -1){
		
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
		
		}else{
			
			$("#" + responseObj.id).attr("value", "");			
			
		}

	}/// END showAll