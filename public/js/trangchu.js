function rotateFunction() {

}
function rotateFunction() {
    var min = 1024;
    var max = 9999;
    var deg = Math.floor(Math.random() * (max - min)) + min;
    document.getElementById('box').style.transform = "rotate(" + deg + "deg)";
}
// Code that we wrote before...
var element = document.getElementById('mainbox');
element.classList.remove('animate');
// Code that we wrote before...
//...
setTimeout(function () {
    element.classList.add('animate');
}, 5000);

// Load saved filter values on page load
document.addEventListener('DOMContentLoaded', function () {

    const maxPrice = localStorage.getItem('maxPrice');
    const skinFilter = localStorage.getItem('skinFilter');

    if (maxPrice) {
        document.getElementById('max-price').value = maxPrice;
    }

    if (skinFilter) {
        document.getElementById('skin-filter').value = skinFilter;
    }
});

// Save filter values and apply filters
function applyFilters() {
    var maxPrice = document.getElementById('max-price').value;
    var skinFilter = document.getElementById('skin-filter').value;

    // Save values to localStorage
    localStorage.setItem('maxPrice', maxPrice);
    localStorage.setItem('skinFilter', skinFilter);

    var queryString = '?';


    if (maxPrice) {
        queryString += 'max_price=' + maxPrice + '&';
    }

    if (skinFilter) {
        queryString += 'skin_filter=' + skinFilter + '&';
    }

    queryString = queryString.slice(0, -1);

    window.location.href = '/products/filter' + queryString;
    setTimeout(function() { 
        var resultsDiv = document.getElementById('results'); 
        resultsDiv.scrollIntoView({ behavior: 'smooth' }); 
    }, 1000);
}


document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.querySelector('#template-mo-zay-hero-carousel');
    var items = carousel.querySelectorAll('.carousel-item');
    var currentIndex = 0;
    var totalItems = items.length;

    function showSlide(index) {
        items.forEach((item, i) => {
            item.classList.remove('active');
            if (i === index) {
                item.classList.add('active');
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        showSlide(currentIndex);
    }

    document.querySelector('.carousel-control-next').addEventListener('click', nextSlide);
    document.querySelector('.carousel-control-prev').addEventListener('click', prevSlide);

    // Auto-slide every 3 seconds
    setInterval(nextSlide, 500);
});



// Hàm tìm kiếm theo ID
function searchProduct() {
    const input = document.getElementById('search-input').value.trim().toLowerCase();
    const products = document.querySelectorAll('#list-products .item');
    let found = false;

    products.forEach(product => {
        const productId = product.getAttribute('data-id').toLowerCase();
        if (productId === input || input === "") {
            product.style.display = 'block';
            found = true;
        } else {
            product.style.display = 'none';
        }
    });

    if (!found) {
        alert(`Không tìm thấy sản phẩm với ID: ${input}`);
    }
}
