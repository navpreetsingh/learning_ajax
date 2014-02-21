function getNewTotals() {
  var url = "getUpdatedSales.php";
  url = url + "?dummy=" + new Date().getTime();
  request.open("GET", url, true);
  request.onreadystatechange = updatePage;
  request.send(null);
}

function updatePage() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      // Get the updated totals from the JSON response
      var jsonData = eval('(' + request.responseText + ')');

      var totalBoards = jsonData.totals[0].boardsSold + 
                        jsonData.totals[1].boardsSold +
                        jsonData.totals[2].boardsSold + 
                        jsonData.totals[3].boardsSold;
      var totalBoots = jsonData.totals[0].bootsSold + 
                       jsonData.totals[1].bootsSold +
                       jsonData.totals[2].bootsSold + 
                       jsonData.totals[3].bootsSold;
      var totalBindings = jsonData.totals[0].bindingsSold + 
                          jsonData.totals[1].bindingsSold +
                          jsonData.totals[2].bindingsSold + 
                          jsonData.totals[3].bindingsSold;

      // Update the page with new totals
      var boardsSoldEl = document.getElementById("boards-sold");
      var bootsSoldEl = document.getElementById("boots-sold");
      var bindingsSoldEl = document.getElementById("bindings-sold");
      var cashEl = document.getElementById("cash");
      replaceText(boardsSoldEl, totalBoards);
      replaceText(bootsSoldEl, totalBoots);
      replaceText(bindingsSoldEl, totalBindings);

      // Figure out how much cash Katie has made on boards
      var boardsPriceEl = document.getElementById("boards-price");
      var boardsPrice = getText(boardsPriceEl);
      var boardsCostEl = document.getElementById("boards-cost");
      var boardsCost = getText(boardsCostEl);
      var cashPerBoard = boardsPrice - boardsCost;
      var cash = cashPerBoard * totalBoards;

      // Figure out how much cash Katie has made on boots
      var bootsPriceEl = document.getElementById("boots-price");
      var bootsPrice = getText(bootsPriceEl);
      var bootsCostEl = document.getElementById("boots-cost");
      var bootsCost = getText(bootsCostEl);
      var cashPerBoot = bootsPrice - bootsCost;
      var cash = cash + (cashPerBoot * totalBoots);

      // Figure out how much cash Katie has made on bindings
      var bindingsPriceEl = document.getElementById("bindings-price");
      var bindingsPrice = getText(bindingsPriceEl);
      var bindingsCostEl = document.getElementById("bindings-cost");
      var bindingsCost = getText(bindingsCostEl);
      var cashPerBinding = bindingsPrice - bindingsCost;
      var cash = cash + (cashPerBinding * totalBindings);

      // Update the cash for the slopes on the web form
      cash = Math.round(cash * 100) / 100;
      replaceText(cashEl, cash);
    } else {
      var message = request.getResponseHeader("Status");
      if ((message.length == null) || (message.length <= 0)) {
        alert("Error! Request status is " + request.status);
      } else {
        alert(message);
      }
    }
  }
}
