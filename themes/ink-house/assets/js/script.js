const hamMenu = document.querySelector('.ham-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const menuLinks = document.querySelectorAll('.off-screen-menu .link'); // Все ссылки в меню

// Функция для закрытия меню
function closeMenu() {
    hamMenu.classList.remove('active');
    offScreenMenu.classList.remove('active');
}

// Обработчик для бургер-меню
hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('active');
    offScreenMenu.classList.toggle('active');
});

// Обработчики для всех ссылок в меню
menuLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault(); // Предотвращаем стандартное поведение
        
        // Закрываем меню
        closeMenu();
        
        // Получаем ID целевого раздела из href ссылки
        const targetId = link.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        // Плавный скролл к целевому разделу
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.country');
    const cards = document.querySelectorAll('.swiper');

    function applyFilter(filter) {
        cards.forEach(card => {
            const country = card.getAttribute('data-country');

            if (filter === country) {
                card.classList.add('visible');
            } else {
                card.classList.remove('visible');
            }
        });
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');
            applyFilter(filter);
        });
    });

    // Применяем фильтр "Франция" по умолчанию
    applyFilter('france');
});




let cart = JSON.parse(localStorage.getItem("cart")) || [];

document.addEventListener("DOMContentLoaded", function () {
    let cartMenus = document.querySelectorAll(".cart-menu"); // Все корзины (мобильная + десктопная)
    let cartButtons = document.querySelectorAll(".cart"); // Все кнопки корзины
    let cartCloses = document.querySelectorAll(".cart-close"); // Все кнопки закрытия
    let cartCounts = document.querySelectorAll(".cart-count"); // Все счетчики товаров

    // Открытие / Закрытие корзины
    function toggleCart() {
        cartMenus.forEach(cartMenu => {
            cartMenu.classList.toggle("open");
        });
    }

    cartButtons.forEach(button => button.addEventListener("click", toggleCart));
    cartCloses.forEach(button => button.addEventListener("click", toggleCart));

    // Функция добавления товара в корзину
    function addToCart(event) {
        let card = event.target.closest(".card"); 
        let title = card.querySelector("h4").textContent;
        let price = parseInt(card.querySelector("h5").textContent.replace(/\D/g, ""));
        let image = card.querySelector("img").src;
        let id = title.toLowerCase().replace(/\s/g, "-");

        let item = cart.find(product => product.id === id);
        if (item) {
            item.quantity++;
        } else {
            cart.push({ id, title, price, quantity: 1, image });
        }

        saveCart();
        updateCartUI();
    }

    // Сохранение корзины в localStorage
    function saveCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    // Обновление корзины на странице
    function updateCartUI() {
        document.querySelectorAll(".cart-items").forEach(cartContainer => {
            cartContainer.innerHTML = "";
        });
    
        let total = 0;
        let itemCount = 0;
    
        if (cart.length === 0) {
            document.querySelectorAll(".empty-cart-text").forEach(el => el.style.display = "block");
            document.querySelectorAll(".buy-button").forEach(el => el.style.display = "none");
            document.querySelectorAll(".cart-total").forEach(el => el.textContent = "0");
    
            cartCounts.forEach(cartCount => {
                cartCount.textContent = "";
                cartCount.style.display = "none";
            });

            return;
        } else {
            document.querySelectorAll(".empty-cart-text").forEach(el => el.style.display = "none");
            document.querySelectorAll(".buy-button").forEach(el => el.style.display = "block");
        }

        cart.forEach(item => {
            total += item.price * item.quantity;
            itemCount += item.quantity;
    
            let itemHTML = `
            <li class="cart-wrapper" data-id="${item.id}">
                <div class="cart-container">
                    <img src="${item.image}"> 
                    ${item.title}
                </div>
                <div class="cat_button-container">
                    <strong class="price-cart">${item.price * item.quantity} руб</strong>
                    <div class="quantity-controls">
                        <button class="decrease">−</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="increase">+</button>
                    </div>
                    <button class="buy-cart">Купить</button>
                </div>
            </li>`;

            document.querySelectorAll(".cart-items").forEach(cartContainer => {
                cartContainer.innerHTML += itemHTML;
            });
        });

        document.querySelectorAll(".cart-total").forEach(el => el.textContent = total);

        cartCounts.forEach(cartCount => {
            cartCount.textContent = itemCount > 0 ? itemCount : "";
            cartCount.style.display = itemCount > 0 ? "block" : "none";
        });

        console.log("Обновлено: десктоп и мобильная корзина");
    }

    // Обработчик кликов в корзине
    document.querySelectorAll(".cart-items").forEach(cartContainer => {
        cartContainer.addEventListener("click", function (event) {
            let cartItem = event.target.closest("li");
            if (!cartItem) return;
            let id = cartItem.dataset.id;

            if (event.target.classList.contains("increase")) {
                let item = cart.find(product => product.id === id);
                if (item) {
                    item.quantity++;
                    saveCart();
                    updateCartUI();
                }
            }

            if (event.target.classList.contains("decrease")) {
                let item = cart.find(product => product.id === id);
                if (item) {
                    if (item.quantity > 1) {
                        item.quantity--;
                    } else {
                        cart = cart.filter(product => product.id !== id);
                    }
                    saveCart();
                    updateCartUI();
                }
            }
        });
    });

    // Удаление товара из корзины
    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        saveCart();
        updateCartUI();
    }

    document.querySelectorAll(".cart-items").forEach(cartContainer => {
        cartContainer.addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-item")) {
                let cartItem = event.target.closest("li");
                if (!cartItem) return;
                let id = cartItem.dataset.id;
                removeFromCart(id);
            }
        });
    });

    // Вешаем обработчики на кнопки "В корзину"
    document.querySelectorAll(".card-cart").forEach(button => {
        button.addEventListener("click", addToCart);
    });

    // Загружаем данные в UI при загрузке страницы
    updateCartUI();
});

setTimeout(() => {
    // Works START
    const swiperWorks = new Swiper('.swiper-works', {
        speed: 1000,
        slidesPerView: 4,
        scrollbar: {
            el: '.swiper-works .swiper-scrollbar',
            draggable: true,
            dragSize: 62,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
        }
    });

    // Init Masonry
    var jQuerygrid = jQuery('.masonry-grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
        gutter: 20
    })
    jQuerygrid.imagesLoaded().progress(function() {
        jQuerygrid.masonry('layout');
    });
    // Works END
}, 500)
