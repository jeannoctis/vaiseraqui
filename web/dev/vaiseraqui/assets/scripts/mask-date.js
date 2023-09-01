(function(){
  // Mascara para Date
  const inputElements = document.querySelectorAll('.dateInput');
  
  inputElements.forEach(inputElement => {
    inputElement.addEventListener('input', function(event) {
      const inputValue = event.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
      if (inputValue.length > 0) {
        let formattedValue = '';
        
        if (inputValue.length >= 1) {
          formattedValue += inputValue.substring(0, 2);
        }
        
        if (inputValue.length >= 3) {
          formattedValue += '/' + inputValue.substring(2, 4);
        }
        
        if (inputValue.length >= 5) {
          formattedValue += '/' + inputValue.substring(4, 8);
        }

        event.target.value = formattedValue;
      }
    });
  })  
})()