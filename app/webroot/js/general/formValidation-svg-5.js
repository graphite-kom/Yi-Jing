//////////////////////////////////////////////////////////////////////////////
/////		START formValidation.js
//////////////////////////////////////////////////////////////////////////////
	
	

	//////////////////////////////////////////////////////
	/// START getFormMap
	function getObjMap(domElement, validateMethod){
		
		if(validateMethod == "all"){
			this.objToMap = {};
			this.objToMap = domElement.closest("form")[0].getElementsByTagName('*');
		}else if(validateMethod == "each"){
			this.objToMap = new Array();
			this.objToMap[0] = window.document.getElementById(domElement[0]["id"]);
		}
		
		this.fieldMap = [];

		y = 0;
		
		this.getLabelText = function(elementId){
			// debugger;
			this.IELabelText = $("label[for = " + elementId + "]").attr("innerText");
			this.FFLabelText = $("label[for = " + elementId + "]").attr("textContent");
			
			if (typeof(this.IELabelText) != "undefined") {
				this.labelText = this.IELabelText;
			} else if (typeof(this.FFLabelText) != "undefined") {
				this.labelText = this.FFLabelText;
			} else if (typeof(this.FFLabelText) == "undefined") {
				this.labelText = "";
			}
			
			
			return this.labelText;
			
		};
		
		for(i=0;i<this.objToMap.length; i++){
			
			if(this.objToMap[i].tagName == 'INPUT' || this.objToMap[i].tagName == 'SELECT' || this.objToMap[i].tagName == 'TEXTAREA'){
				
				this.tmpObj = {
					id: 	this.objToMap[i].id,
					name: 	this.objToMap[i].name,
					type: 	this.objToMap[i].type,
					tag: 	this.objToMap[i].tagName,
					value: 	this.objToMap[i].value,
					checked: 	this.objToMap[i].checked,
					labelText: this.getLabelText(this.objToMap[i].id)
					
				};
				
				this.fieldMap[y] = this.tmpObj;
		
				y++;
				
			}

			
		}
			
		return this.fieldMap;		
		
	}/// END buildFieldMap
	
	//////////////////////////////////////////////////////
	/// START serverSend
	function serverSend(formObj){
		
		// var response;					// method 3
			
		this.jsonObj = JSON.stringify(formObj);
		
		$.ajaxSetup({
			
			contentType: 'application/json; charset=utf-8'
			
		});
	
		
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////	OPTION 1 for writing ajax call 
////	read below on how to extract server response "data" in success : function(data)
		
		$.ajax({
			
			// async: false,					// method 3
			
			data: this.jsonObj,
			
			dataType: "html",
			// dataType: "json",
			
			beforeSend:function(){
				// submitButtonID.after(getIconHtml(iconPath, loadGif));
			},
			
			//////////////////////////////////////////////////////////////
			// data can be passed 3 ways :
			//
			//
			// 1 - either by ajaxSuccess method
			// by extracting result from XmlHtmlRequest.responseText
			//
			// - - - - - - - - - > this can be done asynchronously
			// using ajaxSuccess registers an event/action
			// so it keeps waiting for the success state before 
			// triggering
			//
			//
			// 2 - by sending to an element on the page through a dom call :
			// $("myElement").html(data)
			//
			// - - - - - - - - - > this can be done asynchronously
			// data loads to dom element when it gets there
			// event is registered
			// 
			//
			// 3 - by setting the results 'data' to a global variable
			// returning that variable as the function's return value :
			// response = data; // return response
			// In doing that make sure to reinitialize that variable 
			// at the top of the function : var response; this will 
			// empty it
			//
			// - - - - - - - - - > this CANNOT be done asynchronously
			// because the code continues to execute while 
			// server response has not been received yet
			//
			// by doing this synchronously, the code and page stays 
			// static while waiting for server response
			// 
			
			/*
			success:function (data, textStatus, XMLHttpRequest) {
				response = data; 				// method 3
				// $("#feedbackDiv").html(data);	// method 2 // works for html data
			},
			 */
			
			type:"post", 
							
			url:"\/eclipse-prototypes\/XmlHtmlRequest\/getValidationResponse\/"
		});
////		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////	OPTION 2
////	how to extract server response as .responseText property
////	REQUIRES synchronous set up	: $.ajaxSetup({async:false});
//		
//		this.url = "\/eclipse-prototypes\/XmlHtmlRequest\/getValidationResponse\/";
//		
//		$.ajaxSetup({async:false});
//		
//		response = $.post(this.url, this.jsonObj, "html").responseText;
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// return response;						// method 3
		
		// in method 1 no return value is necessary
		// get returned data in ajaxSuccess event 
		// as XmlHtmlRequest.responseText
		
	}/// END serverSend
	
	//////////////////////////////////////////////////////
	/// START formValidate
	function formValidate(formParameters){
	
	
	// function formValidate(domElement, validateMethod, displayMethod, responseLocation, iconPath){
		/////////////////////////////////////////////////////////////////////////
		//	ajaxSuccess method
		/////////////////////////////////////////////////////////////////////////
		// works with asynchronous ajax calls
		// 
		// de-register event handler from previous executions of the function
		// if not de-registered, the ajaxSuccess action will register one 
		// more time each time the function is executed. So ajaxSuccess action 
		// runs x++ times each time it is called
		$("#feedbackDiv").unbind('ajaxSuccess', returnValues);
		//
		// Re-register event handler
		// Description of event handler function
		var returnValues = function(e,xhr,opt){
			if (opt.url == "/eclipse-prototypes/XmlHtmlRequest/getValidationResponse/") {
				$("#feedbackDiv").html(xhr.responseText);
				// alert("AJAX request successfully completed \n"+xhr.responseText);
			};
		};
		// Actual registration
		$("#feedbackDiv").bind('ajaxSuccess', returnValues);
		
		if (formParameters.validateMethod == "each") {
			this.formObj = this.getObjMap(formParameters.submitButtonId, "all");
			this.serverParse = serverSend(this.formObj);
		} else if (formParameters.validateMethod == "all"){
			this.formObj = this.getObjMap(formParameters.submitButtonId, formParameters.validateMethod);
			this.serverParse = serverSend(this.formObj);
		}
		

		//alert(this.serverParse);
	}/// END formValidate

	//////////////////////////////////////////////////////
	/// START validateElement
	function validateElement(element, formParameters){
		
		/////////////////////////////////////////////////////////////////////////
		//	ajaxSuccess method
		/////////////////////////////////////////////////////////////////////////
		// works with asynchronous ajax calls
		// 
		// de-register event handler from previous executions of the function
		// if not de-registered, the ajaxSuccess action will register one 
		// more time each time the function is executed. So ajaxSuccess action 
		// runs x++ times each time it is called
		$("body").unbind('ajaxSuccess', returnValues);
		//
		// Re-register event handler
		// Description of event handler function
		var returnValues = function(e,xhr,opt){
			if (opt.url == "/eclipse-prototypes/XmlHtmlRequest/getValidationResponse/") {
				// displayResponse(xhr.responseText, formParameters);
				
				$("#feedbackDiv").html(xhr.responseText);
				
			};
		};
		// Actual registration
		$("body").bind('ajaxSuccess', returnValues);
		
		this.elementObj = getObjMap(element, formParameters.validateMethod);
		this.serverParse = serverSend(this.elementObj);
		
	}/// END validateElement
	
	//////////////////////////////////////////////////////
	/// START registerEvents
	function registerEvents(element, eventType, formParameters){
		
		switch(eventType){
			
			case "onBlur":
				var elementId;
				elementId = "#"+element.id;
				$(elementId).blur(function(){
					validateElement($(elementId), formParameters);
				});
				break;
				
			case "onChange":
				var elementId;
				elementId = "#"+element.id;
				$(elementId).change(function(){
					validateElement($(elementId), formParameters);
				});
				break;
			
			case "onClick":
				var elementId;
				elementId = "#"+element.id;
				$(elementId).click(function(){
					validateElement($(elementId), formParameters);
				});
				break;
			
			
		}

		
	}/// END registerEvents
	
	//////////////////////////////////////////////////////
	/// START loadFormElements
	function loadFormElements(formParameters){
		
		this.formObj = this.getObjMap(formParameters.submitButtonId, "all");
		
		for(x=0; x<this.formObj.length; x++){
			
			// this.tracer += this.formObj[x].type + ", \r";
			
			switch(this.formObj[x].type){
			
				case "text":
					this.registerEvents(this.formObj[x], "onBlur", formParameters);
					break;
					
				case "textarea":
					this.registerEvents(this.formObj[x], "onBlur", formParameters);
					break;
					
				case "password":
					this.registerEvents(this.formObj[x], "onBlur", formParameters);
					break;
					
				case "select-one":
					this.registerEvents(this.formObj[x], "onChange", formParameters);
					break;
					
				case "select-multiple":
					this.registerEvents(this.formObj[x], "onChange", formParameters);
					break;
					
				case "file":
					this.registerEvents(this.formObj[x], "onChange", formParameters);
					break;
					
				case "checkbox":
					this.registerEvents(this.formObj[x], "onChange", formParameters);
					break;
					
				case "radio":
					this.registerEvents(this.formObj[x], "onChange", formParameters);
					break;
					
				/*
				case "submit":
					// this.registerEvents(this.formObj[x], "onClick", formParameters);
					break;
					
				case "button":
					// this.registerEvents(this.formObj[x], "onClick", formParameters);
					break;
					
				case "reset":
					// this.registerEvents(this.formObj[x], "onClick", formParameters);
					break;
				*/
			}
			
		}
						
	}/// END loadFormElements
	
	
//			types :
//		
//				text
//		
//				textarea
//		
//				password
//		
//				checkbox
//		
//				radio
//		
//				select-one
//		
//				select-multiple
//		
//				submit
	
		//	todos
		//	- check to see if response var is reset when 
		//	re-intialized at the top of the 
		//	function "var response;"  							
		//	------------------------------------------------>	// Ok
		//	
		//	- see about ajaxSuccess with  
		//	asynchronous request 								
		//	------------------------------------------------>	// Works well
		//	
		//	- set up each onDomReady (loadFormElements 
		//	function) through form > input, 
		//	form > select and 
		//	form > textarea selectors
		//	
		//	- see about multiple selectors						
		//	------------------------------------------------>	// $("div, .class-selector, #id-selector")
		//	
		//	- see about direct selectors and 
		//	the difference between form > input, 
		//	form input and form * input
		//	
		//	------------------------------------------------>	
		//														body > div{	/*direct children*/
		//															background-color:#00CC33;
		//														}
		//														
		//														body * div{ /*direct grand-children*/
		//															background-color:#006666;
		//														}
		//														
		//														body div{ /*all descendants*/
		//															background-color:#006633;
		//														}
	
	