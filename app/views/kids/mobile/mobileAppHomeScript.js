window.addEventListener('load', function() {
    printSessionStorageItems();
    // Check if "foundCalculator" value is in session storage
    if (sessionStorage.getItem('foundCalculator')) {
      // For example, display a message to the user
      document.getElementById("redCircle3").style.background = "green";
    }
  });

  function printSessionStorageItems() {
    for (let i = 0; i < sessionStorage.length; i++) {
      const key = sessionStorage.key(i);
      const value = sessionStorage.getItem(key);
      console.log(`${key}: ${value}`);
    }
  }