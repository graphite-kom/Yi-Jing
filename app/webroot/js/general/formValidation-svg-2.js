//////////////////////////////////////////////////////////////////////////////
/////		START formValidation.js
//////////////////////////////////////////////////////////////////////////////

	/*
	function formValidateToolBox(submitButtonId, method, responseLocation, iconPath){
		
		this.submitButtonId = submitButtonId;
		this.method = method;
		this.responseLocation = responseLocation;
		this.iconPath = iconPath;
			
		if (method == "all") {
			this.objToMap = this.submitButtonId.closest("form")[0].getElementsByTagName('*');
			
		} else {
			
		}
		
		//////////////////////////////////////////////////////
		/// START buildFieldMap
		this.getFieldMap = function(objToMap){
			
			this.fieldMap = [];

			y = 0;
			
			for(i=0;i<objToMap.length; i++){
				
				if(objToMap[i].tagName == 'INPUT' || objToMap[i].tagName == 'SELECT' || objToMap[i].tagName == 'TEXTAREA'){
					
					this.tmpObj = {
						id: 	objToMap[i].id,
						name: 	objToMap[i].name,
						type: 	objToMap[i].type,
						tag: 	objToMap[i].tagName,
						value: 	objToMap[i].value,
						checked: 	objToMap[i].checked
						
					};
					
					this.fieldMap[y] = this.tmpObj;
			
					y++;
					
				}

				
			}
			
			return this.fieldMap;
			
		};
		/// END buildFieldMap
		
		//////////////////////////////////////////////////////
		/// START matchDBfields
		this.matchDBfields = function(submitButton, methodName, responseLocation, iconPath, formObj){
			
			// objToMap = submitButton.closest("form");
			
			// objToMap.before('<div class="formResponse">LOADING</div>');
			
			objToMap = $("#"+submitButton.closest("form")[0].id);
			
			objToMap.before('<div class="formResponse">LOADING</div>');
			
			this.jsonObj = JSON.stringify(formObj);
			
			$.ajaxSetup({
				
				contentType: 'application/json; charset=utf-8'
				
			});
			
			$.ajax({
				
				data: this.jsonObj,
				
				dataType: "html",
				
				beforeSend:function(){
					// submitButtonID.after(getIconHtml(iconPath, loadGif));
				},
				
				success:function (data, textStatus, XMLHttpRequest, currentForm) {
						
					$("div.formResponse").html(data);
					$("div.formResponse").slideDown(5000);
					
				},
				
				type:"post", 
								
				url:"\/eclipse-prototypes\/XmlHtmlRequest\/getResponsePosition\/"
			});
			
			
			
		};
		/// END matchDBfields
		
		// this.formObj = this.getFieldMap(this.submitButtonId);
		
		// this.matchDBfields(this.submitButtonId, this.method, this.responseLocation, this.iconPath, this.formObj);

	}*/
	
	//////////////////////////////////////////////////////
	/// START getFormMap
	function getObjMap(domElement, method){
		
		if(method == "all"){
			this.objToMap = domElement.closest("form")[0].getElementsByTagName('*');
		}
		
		this.fieldMap = [];

		y = 0;
			
		for(i=0;i<this.objToMap.length; i++){
			
			if(this.objToMap[i].tagName == 'INPUT' || this.objToMap[i].tagName == 'SELECT' || this.objToMap[i].tagName == 'TEXTAREA'){
				
				this.tmpObj = {
					id: 	this.objToMap[i].id,
					name: 	this.objToMap[i].name,
					type: 	this.objToMap[i].type,
					tag: 	this.objToMap[i].tagName,
					value: 	this.objToMap[i].value,
					checked: 	this.objToMap[i].checked
					
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
		
		// debugger;
		
		//////////////////////////////////////////////////////
		/// START parseData
		parseData = function(mydata){
			debugger;
			output = mydata;
			
			return output;
			
		};
		/// END parseData
		
		$("#MockdataAddForm").before('<div class="formResponse">LOADING</div>');
		
		this.jsonObj = JSON.stringify(formObj);
		
		$.ajaxSetup({
			
			contentType: 'application/json; charset=utf-8'
			
		});
		
		$.ajax({
			
			data: this.jsonObj,
			
			dataType: "html",
			
			beforeSend:function(){
				// submitButtonID.after(getIconHtml(iconPath, loadGif));
			},
			
			success:function (data, textStatus) {

				$("div.formResponse").html(data);
				$("div.formResponse").slideDown(5000);
				// alert(data);
				parseData(data);
				
			},
			
			type:"post", 
							
			url:"\/eclipse-prototypes\/XmlHtmlRequest\/getResponsePosition\/"
		});
		
		return output;
		
	}/// END serverSend
	
	function formValidate(domElement, method, responseLocation, iconPath){
		debugger;
		this.formObj = this.getObjMap(domElement, "all");
		this.serverParse = this.serverSend(this.formObj);
		alert(this.serverParse);
		
	}
	
	
	
	
	
	function loadFormElements(submitButtonId, method, responseLocation, iconPath){

		formValidate(submitButtonId, method, responseLocation, iconPath);
			
	}
	