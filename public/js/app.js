"use strict";
let cart = [];

const countItemsInCart = document.querySelector('.count-items-in-cart');

// let getProduct = id => products.find(item => item.id === id);

function getProduct(id) {
    let products = JSON.parse(localStorage.getItem("products"));
    return products.find(product => product.id === +(id));
}

function render(obj) {
  return `
    <!-- product -->
                <div class="pb-5 product-wrapper">
                  <article class="mb-4 product" data-id=${obj.id}>
                    <!-- product -->
                    <span class="badge rounded-0 bg-${obj.bgBadge}">${obj.badge}</span>
                    <a href="detail.html">
                      <img src="${obj.image}" width=302 height=332 class="img-fluid" alt="text description" />
                    </a>
                    <div class="shadow btn-block d-inline-block">
                      <span class="product-btn" href=""><i class="fas fa-heart"></i></span>
                      <span class="product-btn product-view"><i class="fas fa-expand"></i></span>
                      <span class="product-btn add-to-cart"><i class="fas fa-dolly-flatbed"></i></span>
                    </div>
                    <h6 class="text-center"><a class="reset-anchor" href="detail.html">${obj.name}</a></h6>
                    <p class="text-center text-muted font-weight-bold">$${obj.price}</p>
                  </article>
                </div>
                <!-- /product -->
    `;
}

// wish-list
let wishListButtons = window.document.querySelectorAll(".wish-list");

for (let i = 0; i < wishListButtons.length; i++) {
  let item = wishListButtons[i];
  let iwith = document.querySelector(".iwith");
  item.addEventListener("click", function () {
    let v = +iwith.textContent;
    v++;
    iwith.textContent = v;
  });
}
// =============== Modal =====================
let modal = document.querySelector(".modal");

function toggleModal(params) {
  modal.style.display = params;
}

function renderModal(obj) {
  return `
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="border-0 modal-content rounded-0">
        <div class="p-0 overflow-hidden shadow modal-body" data-id=${obj.id}>
          <!-- row -->
          <div class="row align-items-stretch">

            <div class="col-lg-6 p-lg-0">
              <div class="bg-center bg-cover product-view d-block h-100" style="background: url(${obj.image})">
              </div>
            </div>

            <div class="col-lg-6">
              <button class="p-4 border-0 close modal-close" type="button"><i class="fas fa-times"></i></button>
              <div class="p-5 my-md-4">
                <ul class="mb-2 list-inline">
                  <li class="m-0 list-inline-item"><i class="fas fa-star small text-warning"></i></li>
                  <li class="m-0 list-inline-item"><i class="fas fa-star small text-warning"></i></li>
                  <li class="m-0 list-inline-item"><i class="fas fa-star small text-warning"></i></li>
                  <li class="m-0 list-inline-item"><i class="fas fa-star small text-warning"></i></li>
                  <li class="m-0 list-inline-item"><i class="fas fa-star small text-warning"></i></li>
                </ul>

                <h2 class="h5 text-uppercase">${obj.name}</h2>
                <p class="text-muted">$${obj.price}</p>
                <p class="mb-4 text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper
                  leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur
                  ridiculus mus. Vestibulum ultricies aliquam convallis.</p>

                <ul class="mb-4 list-inline">
                  <li class="list-inline-item me-3"><strong>Quantity</strong></li>
                  <li class="list-inline-item">
                    <div class="p-1 border d-flex align-items-center justify-content-between">
                      <div class="py-0 quantity">
                        <button class="p-0 dec-btn"><i class="fas fa-caret-left"></i></button>
                        <input class="p-0 border-0 form-control shadow-0 quantity-result" type="text" value="1">
                        <button class="p-0 inc-btn"><i class="fas fa-caret-right"></i></button>
                      </div>
                    </div>
                  </li>
                  <li class="list-inline-item"><a class="btn btn-primary add-to-cart">
                      Add to cart</a></li>
                </ul>
                <a class="p-0 reset-anchor" href="#">
                  <i class="far fa-heart me-2"></i>Add to wish list
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    `;
}

//

function countItem(cart){
  countItemsInCart.textContent = cart.reduce((prev, current) => prev + current.amount, 0);
}

function addProductToCart(product, amount=1){
  let inCart = cart.some(element => element.id === product.id);

  if(inCart){
    cart.forEach(item => {
      if(item.id === product.id){
        item.amount += amount;
      }
    })
  }else{
    let cartItem = {...product, amount: amount};
    cart = [...cart, cartItem];
  }
  saveCart(cart);
  countItem(cart);
}

function addToCart(){
  let addToCartButtons = document.querySelectorAll(".add-to-cart");
  addToCartButtons.forEach(item => {
    item.addEventListener('click', event => {
      console.log(event.target.closest(".product").dataset.id);
      let product = getProduct(+event.target.closest(".product").dataset.id);

      addProductToCart(product);
    })
  })
}
// ============ Storage =================
function saveStorageItem(key, item){
    localStorage.setItem(key, JSON.stringify(item));
}

function getStorageItem(key){
  return JSON.parse(localStorage.getItem(key));
}


function saveCart(cart){
  saveStorageItem('basket', cart)
}

function initStorage(key){
  try{
    let basket = localStorage.getItem(key) ?
    getStorageItem(key)
    :saveStorageItem(key, []);
    return basket;
  }catch (error) {
    if(error == QUOTA_EXCEEDED_ERR){
      console.error("Local Stotage Limit is exceeded");
    }
  }
}

// ================= populate ===========================
const productsWrapper = document.querySelector(".products-wrapper");
const categoriesChoice = document.querySelector('.categories-choice');
const shoppingCart = document.querySelector('.shopping-cart');

function populateProducts(products){
  let result = "";
  products.forEach(item => {
      result+=render(item);
  });
  return result;
}

function populateCategories(products){
  const uniques = products.map(item => item.category)
  .filter((item, index, arr)=>arr.indexOf(item)==index);

  let categoryItem = (uniques) => {
    let res = '';
    uniques.forEach(item => res+=`<li class="mb-2"><a href="#" class="reset-anchor">${item}</a></li>`)
    return res;
  }

  let categoriesList = () => `<h5 class="mb-4 text-center">Categories</h5>
     <ul class="list-unstyled text-muted">
      ${categoryItem(uniques)}
     </ul>
  `;
  return categoriesList();
}

function populateShoppingCart(cart){
  let res = '';
  cart.forEach(item => res+=renderCartItem(item))
  return res;
}

// ============= Render =================
function renderCartItem(product){
  return `
  <tr id="id${product.id}" class="cart-item">
    <th class="p-3 border-light" scope="row">
      <div class="d-flex align-items-center"><a class="reset-anchor d-block" href="detail.html"><img src="${product.image}" alt="${product.name}" width="70"></a>
        <div class="ms-3"><strong class="h6"><a class="reset-anchor" href="detail.html">${product.name}</a></strong></div>
      </div>
    </th>
    <td class="p-3 align-middle border-light">
      <p class="mb-0 small">$${product.price}</p>
    </td>
    <td class="p-3 align-middle border-light">
      <div class="border d-inline-block px-2">
        <div class="quantity">
          <button class="dec-btn p-0" data-id=${product.id}><i class="fas fa-caret-left"></i></button>
          <input class="form-control border-0 shadow-0 p-0 quantity-result" type="text" value="${product.amount}">
          <button class="inc-btn p-0" data-id=${product.id}><i class="fas fa-caret-right"></i></button>
        </div>
      </div>
    </td>
    <td class="p-3 align-middle border-light">
      <p class="mb-0 small product-subtotal">$${product.price}</p>
    </td>
    <td class="p-3 align-middle border-light"><a class="reset-anchor" href="#"><i class="fas fa-trash-alt small text-muted" data-id=${product.id}></i></a></td>
  </tr>
  `;
}

function setCartTotal(cart) {
    let tmpTotal = 0;
    cart.map(item => {
        tmpTotal = item.price * item.amount;
        shoppingCart.querySelector(`#id${item.id} .product-subtotal`).textContent=parseFloat(tmpTotal.toFixed(2));
    });
    document.querySelector('.cart-total').textContent = parseFloat(cart.reduce((previous, current) => previous + current.price * current.amount, 0).toFixed(2));
}

const filterItem = (cart, curentItem) => cart.filter(item => item.id !== +(curentItem.dataset.id));

const findItem = (cart, curentItem) => cart.find(item => item.id === +(curentItem.dataset.id));

const clear = () => {
    cart = [];
    shoppingCart.innerHTML = '';
    setCartTotal(cart);
    saveCart(cart);
    countItem(cart);
}

function renderCart() {
    document.querySelector('.clear-cart').addEventListener("click", () => clear());
    shoppingCart.addEventListener("click", event => {
        // event.preventDefault();
        if (event.target.classList.contains("fa-trash-alt")){
            cart = filterItem(cart, event.target);
            event.target.closest('.cart-item').remove();
            setCartTotal(cart);
            saveCart(cart);
            countItem(cart);

        } else if (event.target.classList.contains("inc-btn")) {
            let tempItem = findItem(cart, event.target);

            tempItem.amount = tempItem.amount + 1;
            event.target.previousElementSibling.value = tempItem.amount;
            setCartTotal(cart);
            saveCart(cart);
            countItem(cart);
        } else if (event.target.classList.contains("dec-btn")) {
            let tempItem = findItem(cart, event.target);
            if (tempItem !== undefined && tempItem.amount > 1) {
                tempItem.amount = tempItem.amount - 1;
                event.target.nextElementSibling.value = tempItem.amount;

            } else {
                cart = filterItem(cart, event.target);
                event.target.closest('.cart-item').remove();

            }
            setCartTotal(cart);
            saveCart(cart);
            countItem(cart);
        }
    });
}

function renderModalWindow() {
    let modalBody = document.querySelector('.modal-body');
    let modalAmount = document.querySelector('.modal-body .quantity-result');

    modalBody.addEventListener("click", event => {
        if (event.target.classList.contains("inc-btn")) {
            modalAmount.value++;
        } else if (event.target.classList.contains("dec-btn")) {
            if (modalAmount.value !== undefined && modalAmount.value > 1) {
                modalAmount.value--;
            }
        }
    });

    let addToCartButton = modalBody.querySelector(".add-to-cart");
    addToCartButton.addEventListener('click', event => {
        let product = getProduct(+modalBody.dataset.id);
          addProductToCart(product, +modalAmount.value);
          document.location.replace('cart.html');
    })
}

async function fetchData(resourse) {
    const url = `https://my-json-server.typicode.com/couchjanus/db/${resourse}`;

    await fetch(url)
        .then((response) => {
            if (response.status !== 200) {
                console.log('Looks like there was a problem. Status Code: ' + response.status);
                return;
            }
            response.json().then((json) => {
                saveStorageItem(resourse, json)
            });
        })
        .catch((err) => {
            console.log('Fetch Error :-S', err);
        });
}


const carouselItem = (data) =>`
    <div class="carousel-item">
        <a class="category-item" href="#" data-category="${data.name}">
            <img src="${data.image}" alt="${data.name}" height="100" width="250" class="category-item"  data-category="${data.name}"><strong
            class="category-item category-item-title" data-category="${data.name}">${data.name}</strong></a>
</div>`;

function makeCarousel(categories) {
    let result = '';
    categories.forEach(item => {
        result+=carouselItem(item);
    });
    result += result;
    return result;

}

function renderCategory(selector){
    const categoryItems = document.querySelectorAll(selector);

    categoryItems.forEach(item => item.addEventListener('click', function(e){
        if (e.target.classList.contains('category-item')) {
            const category = e.target.dataset.category;

            const categoryFilter = items => items.filter(item => item.category.includes(category));
            productsWrapper.innerHTML = populateProducts(categoryFilter(getStorageItem('products')));
        } else {
                productsWrapper.innerHTML = populateProducts(getStorageItem('products'));
        }
        addToCart();
        // renderShowcase();
    }))
}

document.addEventListener('DOMContentLoaded', () => {
  fetchData('products');

  if(cart = initStorage('basket')){
    countItem(cart);
    if(productsWrapper){
      productsWrapper.innerHTML = populateProducts(getStorageItem('products'));
      if(categoriesChoice){
        categoriesChoice.innerHTML = populateCategories(getStorageItem('products'));
      }
      let productViewButtons = [...document.querySelectorAll(".product-view")];

      const categories = [...new Map(getStorageItem('products').map(item =>
          [item['category'], item])).values()].map(item => (
          {
              name: item.category,
              image: item.image
          }
      ));
      // console.log(categories);
      document.body.style.setProperty( "--categories-length", categories.length);

      const carouselTrack = document.querySelector('.carousel-track');
      if (carouselTrack){
          carouselTrack.innerHTML = makeCarousel(categories);
          renderCategory('.carousel-track .carousel-item');

      }


      productViewButtons.forEach((button) =>
        button.addEventListener("click", e => {
          let item = getProduct(+e.target.closest(".product").dataset.id);
          let modWin = renderModal(item);
          modal.innerHTML = modWin;
          toggleModal("block");
          modal.classList.add("show");
          renderModalWindow();
          modal
            .querySelector(".close")
            .addEventListener("click", () => toggleModal("none"));
        })
      );
      addToCart();

    }
    if(shoppingCart){
      shoppingCart.innerHTML = populateShoppingCart(cart);
      setCartTotal(cart);
      renderCart();
    }
  }
});
