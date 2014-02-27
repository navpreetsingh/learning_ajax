function getBeverage(){
	//What beverage was selected
	var beverageGroup = document.forms[0].beverage;
	for(i=0; i < beverageGroup.length; i++){
		if (beverageGroup[i].checked == true){
			return beverageGroup[i].value;
		}
	}
}

function getSize(){
	//What size of cup was selected
	var sizeGroup = document.forms[0].size;
	for(i=0; i < sizeGroup.length; i++){
		if (sizeGroup[i].checked == true){
			return sizeGroup[i].value;
		}
	}
}

function orderCoffee(){
	//Take an order from the web form
	var name = document.getElementById("name").value;
	var beverage = getBeverage();	
	var size = getSize();
	coffeemakerStatusDiv1 = document.getElementById("coffeemaker1-status");	
	status = getText(coffeemakerStatusDiv1);	
	if (status == "Idle"){
		replaceText(coffeemakerStatusDiv1, "Brewing " + name + "'s " + 
			size + " " + beverage);
		document.forms[0].reset();
		var url = "coffeemaker.php?name=" + escape(name) + "&size=" +
			escape(size) + "&beverage=" + escape(beverage) + "&coffeemaker=1";
		sendRequest(request1, url);
	}
	else{
			coffeemakerStatusDiv2 = document.getElementById("coffeemaker2-status");
			status = getText(coffeemakerStatusDiv2);
			if (status == "Idle"){		
			replaceText(coffeemakerStatusDiv2, "Brewing " + name + "'s " + 
				size + " " + beverage);
			document.forms[0].reset();
			var url = "coffeemaker.php?name=" + escape(name) + "&size=" +
				escape(size) + "&beverage=" + escape(beverage) + "&coffeemaker=2";		
			sendRequest(request2, url);
			}	
			else{
				alert("Sorry! Both coffee makers are busy. Try again later");
			}
		}
	}	

function sendRequest(request, url){
	// Send a request to the Coffee Maker
	request.onreadystatechange = serveDrink;
	request.open("GET", url, true);	
	request.send(null);
}

function serveDrink(){
	//when the coffee maker is done, serve the drink
	if (request1.readyState == 4){		
		replaceText(document.getElementById("coffeemaker1-status"), "Idle");						
		if (request1.status == 200){
			var response = request1.responseText;			
			name1 = response.substring(2);			
			alert(name1 + ", your coffee is ready!")
		}else{
			alert("Error! Request status is " + request1.status);
		}
		request1 = createRequest();
	}else if (request2.readyState == 4){		
		replaceText(document.getElementById("coffeemaker2-status"), "Idle");						
		if (request2.status == 200){
			var response = request2.responseText;			
			name2 = response.substring(2);			
			alert(name2 + ", your coffee is ready!")
		}else{
			alert("Error! Request status is " + request2.status);
		}
		request2 = createRequest();
	}
}

