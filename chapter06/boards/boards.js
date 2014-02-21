function getNewTotals() {
  var url = "getUpdatedSales.php";
  url = url + "?dummy=" + new Date().getTime();
  request.open("GET", url, true);
  request.onreadystatechange = updatePage;
  request.send(null);
}

function updatePage() {
  if (request.readyState == 4) {
    var newTotal = request.responseText;
    var boardsSoldEl = document.getElementById("boards-sold");
    var cashEl = document.getElementById("cash");
    replaceText(boardsSoldEl, newTotal);
    
    /* Figure out how much cash Katie has made */
    var priceEl = document.getElementById("price");
    var price = getText(priceEl);
    var costEl = document.getElementById("cost");
    var cost = getText(costEl);
    var cashPerBoard = price - cost;
    var cash = cashPerBoard * newTotal;

    /* Update the cash for the slopes on the form */
    cash = Math.round(cash * 100) / 100;
    replaceText(cashEl, cash);
  }
}