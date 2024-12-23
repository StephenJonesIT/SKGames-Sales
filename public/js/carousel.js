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
    setInterval(nextSlide, 3000);
});

