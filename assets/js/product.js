
// let products= [
//     {
//         nama:"Asus 249QGR",
//         gambar:"../asset/img/asus249qgr.jpeg",
// },{
//         nama:"AOC 24EG2E5",
//         gambar:"../asset/img/aoc24eg2e5.jpeg",
// },{
//         nama:"Koorui 24e4",
//         gambar:"../asset/img/koorui.jpeg",
// },{
//         nama:"MSI G241VC",
//         gambar:"../asset/img/msig241vc.jpeg",
// },{
//         nama:"Samsung CR24F390",
//         gambar:"../asset/img/samsungcr24f390.jpeg",
// },{
//         nama:"Samsung SR35",
//         gambar:"../asset/img/samsungsr35.jpeg",
// }
// ]

const productApi ='https://fakestoreapi.com/products'

fetch(productApi)
.then(response=>response.json())
.then(data=>{

  let element =document.getElementById("card")
  html = ""
    data.forEach(product=>{
      html +=`
              <div class="card m-2" style="width: 18rem;">
                  <img src="${product.image}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">${product.title}</h5>
                    <p class="card-text">${product.description}</p>
                  </div>
              </div>
        `;


    })
    element.innerHTML=html
  }
)

