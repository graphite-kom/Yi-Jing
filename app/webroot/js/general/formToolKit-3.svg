//////////////////////////////////////////////////////////////////////////////
/////		START formToolKit.js
//////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////
	///	START other event functions

	//////////////////////////////////////////////////////////////////////////////
	///	START formAction
	
	function formAction(){
		$.ajax({
			data:$("#formSubmit").closest("form").serialize(), 
			dataType:"html",
			beforeSend:function(){
				// console.info("Processing validation");
			},
			success:function (data, textStatus) {
				// console.warn("Validation returned");
				$("#feedbackDiv").html(data);
			},
			type:"post", 
			
			url:"\/eclipse-prototypes\/mockdatas\/response"
			
		});
	}
	
	/*
	function formAction(){
			
		submitButtonID = $("#formSubmit");
		
		this.formObj = this.buildFieldMap(submitButtonID);
		
		this.JsonObj = JSON.stringify(this.formObj);
		
		
		$.ajax({
			data:this.JsonObj, 
			contentType: 'application/json; charset=utf-8',
			dataType:"html",
			beforeSend:function(){
				// console.info("Processing validation");
			},
			success:function (data, textStatus) {
				// console.warn("Validation returned");
				$("#feedbackDiv").html(data);
			},
			type:"post", 
			
			url:"\/eclipse-prototypes\/XmlHtmlRequest\/getResponsePosition\/Mockdata"			
		});
	}*/
	///	END formAction
	
	
	
	//////////////////////////////////////////////////////////////////////////////
	///	START DomReady functions
	
	
		//////////////////////////////////////////////////////
		/// START DomReady variables
		loadGif = {
			img: 'loadinfo.gif', 
			alt: 'Loading', 
			styleCl: 'loadinfo', 
			msg: 'Loading'
		};
		/// END DomReady variables
		
		//////////////////////////////////////////////////////
		/// START getIconHtml
		function getIconHtml(iconPath, iconName){
			
			this.divHtml = "<div class=\"" + iconName.styleCl + "\"><img src=\"http://" + iconPath + iconName.img + "\" alt=\"" + iconName.alt + "\" /><div>" + iconName.msg + "</div></div>";
			
			return this.divHtml;
			
		}
		/// END getIconHtml
	
		//////////////////////////////////////////////////////
		/// START loadIcons
		/*
		function loadIcons(iconPath, iconName){
			
			myIcon = getIconHtml(iconPath, iconName);
			
		}*/
		/// END loadIcons
	
		//////////////////////////////////////////////////////
		/// START matchDBfields
		function matchDBfields(iconPath, modelName, submitButtonID, methodName, formObj){
			
			JsonObj = JSON.stringify(formObj);
			
			$.ajax({
				
				data:JsonObj, 
				
				contentType: 'application/json; charset=utf-8',
				
				dataType:"html",
				
				beforeSend:function(){
					submitButtonID.after(getIconHtml(iconPath, loadGif));
				},
				
				success:function (data, textStatus) {
					$("#feedbackDiv").html(data);
				},
				
				type:"post", 
								
				url:"\/eclipse-prototypes\/XmlHtmlRequest\/getResponsePosition\/"+modelName
			});
			
		}
		/// END matchDBfields
		
		//////////////////////////////////////////////////////
		/// START mapFieldAttributes // deprecated
		/*
		function mapFieldAttributes(fieldType){
	
			this.fieldMap = [];
			
			for(i = 0; i<fieldType.length;i++){
				this.tmpObj = {
					id: 	fieldType[i].id,
					name: 	fieldType[i].name,
					type: 	fieldType[i].type
				};
				*/
				// same as above
				/*this.tmpObj = {};
				this.tmpObj["id"] = fieldType[i].id;
				this.tmpObj["name"] = fieldType[i].name;
				this.tmpObj["type"] = fieldType[i].type;*/
				/*
				this.fieldMap[i] = this.tmpObj;			
			}
			
			return this.fieldMap;
		}*/
		/// END mapFieldAttributes
		
		//////////////////////////////////////////////////////
		/// START buildFieldMap
		function buildFieldMap(submitButtonID){
			
			this.fieldMap = [];
			this.formObj = {};
			
			this.currentForm = submitButtonID.closest("form")[0].getElementsByTagName('*');
					
			this.fieldCount = this.currentFormInputs+this.currentSelects+this.currentTextareas;
			
			y = 0;
			
			for(i=0;i<this.currentForm.length; i++){
				
				if(this.currentForm[i].tagName == 'INPUT' || this.currentForm[i].tagName == 'SELECT' || this.currentForm[i].tagName == 'TEXTAREA'){
					this.tmpObj = {
						id: 	this.currentForm[i].id,
						name: 	this.currentForm[i].name,
						type: 	this.currentForm[i].type,
						tag: 	this.currentForm[i].tagName,
						value: 	this.currentForm[i].value,
						checked: 	this.currentForm[i].checked
						
					};
					this.fieldMap[y] = this.tmpObj;
					y++;
				}

				
			}
			
			return this.fieldMap;
		}
		/// END buildFieldMap
		
		//////////////////////////////////////////////////////
		/// START loadFormElements
		function loadFormElements(iconPath, modelName, submitButtonID, methodName){
			
			this.formObj = this.buildFieldMap(submitButtonID);
			
			// match DB fields with page form fields
			this.fieldSet = this.matchDBfields(iconPath, modelName, submitButtonID, methodName, this.formObj);

		}
		/// END loadFormElements

		
		
	///	END DomReady functions
	//////////////////////////////////////////////////////////////////////////////
	