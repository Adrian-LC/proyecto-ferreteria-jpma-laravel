window.addEventListener('load', function(){

  fetch('http://localhost:8000/productCategories')
    .then(function(response){
      return response.json()
    })
    .then(function(data){
      //console.log(data)
      let productCategories = document.getElementById('productCategories')
      productCategories.classList.add('d-none')
      for(productCategory of data){
        if(productCategory.state_pc == 1){
          productCategories.classList.remove('d-none')
          productCategories.classList.add('d-inlineblock')
          let newA = document.createElement('a')
          newA.innerText = productCategory.name_pc
          newA.classList.add('dropdown-item')
          let newLi = document.createElement('li')
          newLi.append(newA)
          productCategories.append(newLi)
        }
      }
    })
    .catch(function(error){
      console.log("The error was: " + error)
    })

})
