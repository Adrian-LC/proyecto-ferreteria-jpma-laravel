window.addEventListener('load', function(){

  fetch('http://localhost:8000/countCart')
    .then(function(response){
      return response.json()
    })
    .then(function(data){
      if(data){
        //console.log(data)
        let cart = document.getElementById('cart')
        let count = cart.children[1];
        count.innerText = "(" + data + ")"
      }
    })
    .catch(function(error){
      console.log("The error was: " + error)
    })

})
