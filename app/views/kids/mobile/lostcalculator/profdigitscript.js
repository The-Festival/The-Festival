
function showElement(elementId) {
    var element = document.getElementById(elementId);
    if (element) {
      element.style.display = 'block';
      checkSumComplete()
    }
  }

function hideElemnt(elementId) {
    document.getElementById(elementId).style.display = 'none';
}

function checkSumComplete(){
    if(isElementVisible("sum9") && isElementVisible("sum+") && isElementVisible("sum10") && isElementVisible("sum=") && isElementVisible("sum19"))
    {
        if(!isElementVisible("goodjobContainer"))
        {
            showElement("goodjobContainer");
            showElement("hiddenButton");
        }
    }
}

function isElementVisible(elementId) {
    var element = document.getElementById(elementId);
    var style = getComputedStyle(element);
    return style.display !== 'none' && style.visibility !== 'hidden';
  }