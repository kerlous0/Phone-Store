var storedProductsArray = localStorage.getItem("productsArray");
var productsArray;
if (storedProductsArray) {
  productsArray = JSON.parse(storedProductsArray);
  console.log(productsArray);
  fetchData(productsArray);
}

function fetchData(productsArray) {
  // Get the container element
  const container = document.querySelector(".container");

  // Check if the container exists
  if (!container) {
    console.error("Container not found.");
    return;
  }

  // Clear existing content

  // Iterate over each product in the productsArray and create HTML for it
  productsArray.forEach((item) => {
    let card = `
    <div class="item">
        <div class="img">
            <img src="${item.img}">
        </div>
        <div class="name">
            <p>${item.name}</p>
        </div>
        <div class="quantity">
            <p>${item.quantity}</p>
        </div>
        <div class="price">
            <p>${item.price * item.quantity}</p>
        </div>
    </div>
    `;

    // Append the generated HTML to the container
    container.innerHTML += card;
  });
}

function buyProduct(product) {
  var productId = product.id; // Get the product ID
  var quantity = product.quantity; // Get the quantity

  // Send an AJAX request to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_stock.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      localStorage.clear();
      window.location.reload();
    }
  };
  xhr.send("product_id=" + productId + "&quantity=" + quantity);
}

function buyAllProducts() {
  productsArray.forEach((product) => {
    buyProduct(product);
  });
}
