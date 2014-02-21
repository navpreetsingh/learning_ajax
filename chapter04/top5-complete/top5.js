function addOnClickHandlers() {
  var cdsDiv = document.getElementById("cds");
  var cdImages = cdsDiv.getElementsByTagName("img");
  for (var i=0; i<cdImages.length; i++) {
    cdImages[i].onclick = addToTop5;
  }
}

function addToTop5() {
  var imgElement = this;
  var top5Element = document.getElementById("top5");
  var numCDs = 0;

  for (var i=0; i<top5Element.childNodes.length; i++) {
    if (top5Element.childNodes[i].nodeName.toLowerCase() == "img") {
      numCDs = numCDs + 1;
    }
  }
  if (numCDs >= 5) {
    alert("You already have 5 CDs. Click \"Start Over\" to try again.");
    return;
  }

  top5Element.appendChild(imgElement);
  imgElement.onclick = null;

  var newSpanElement = document.createElement("span");
  newSpanElement.className = "rank";
  var newTextElement = document.createTextNode(numCDs + 1);
  newSpanElement.appendChild(newTextElement);
  top5Element.insertBefore(newSpanElement, imgElement);
}

function startOver() {
  var top5Element = document.getElementById("top5");
  var cdsElement = document.getElementById("cds");
  while (top5Element.hasChildNodes()) {
    var firstChild = top5Element.firstChild;
    if (firstChild.nodeName.toLowerCase() == "img") {
      cdsElement.appendChild(firstChild);
    } else {
      top5Element.removeChild(firstChild);
    }
  }

  addOnClickHandlers();
}
