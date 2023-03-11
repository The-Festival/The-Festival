
function makeElementWiggle(id) {
    // Get the element by ID
    var element = document.getElementById(id);
  
    // Add a class to trigger the animation
    element.classList.add("wiggle");
  
    // Remove the class after the animation is finished
    setTimeout(function() {
      element.classList.remove("wiggle");
    }, 1000); // Change the duration of the animation as needed
  }