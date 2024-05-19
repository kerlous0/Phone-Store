function increaseCount(button) {
  var countElement = button.parentElement.querySelector(".num");
  var stockNum =
    button.parentElement.nextElementSibling.nextElementSibling.querySelector(
      ".stock span"
    );
  var currentCount = parseInt(countElement.textContent);
  var stock = parseInt(stockNum.textContent);
  console.log(stock);
  if (currentCount < stock) {
    var newCount = currentCount + 1;
    countElement.textContent = newCount;
  }
}

function decreaseCount(button) {
  var countElement = button.parentElement.querySelector(".num");
  var currentCount = parseInt(countElement.textContent);

  if (currentCount > 0) {
    var newCount = currentCount - 1;
    countElement.textContent = newCount;
  }
}

// Declare an array to store products
var productsArray = [];

function addToCart(button) {
  var productInfo = button.parentElement;

  var name = productInfo.querySelector(".name p").innerText;
  var price = parseFloat(productInfo.querySelector(".stock span").innerText);
  var img = button.parentElement.parentElement.querySelector(".img img").src;
  var id = button.getAttribute("data-productid");
  var quantity = parseInt(productInfo.querySelector(".num").innerText);

  if (quantity > 0) {
    var product = {
      id: id,
      name: name,
      price: price,
      img: img,
      quantity: quantity,
    };

    productsArray.push(product);
  }
  console.log(productsArray);
  localStorage.setItem("productsArray", JSON.stringify(productsArray));
}
