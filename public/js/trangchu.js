function rotateFunction(){

}
function rotateFunction(){
  var min = 1024;
  var max = 9999;
  var deg = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById('box').style.transform = "rotate("+deg+"deg)";
}
  // Code that we wrote before...
  var element = document.getElementById('mainbox');
  element.classList.remove('animate');
  // Code that we wrote before...
  //...
  setTimeout(function(){
    element.classList.add('animate');
  }, 5000);

        // Hàm áp dụng bộ lọc
        function applyFilters() {
            const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
            const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
            const skinFilter = document.getElementById('skin-filter').value.toLowerCase();
            const products = document.querySelectorAll('.item');
            let found = false;

            products.forEach(product => {
                const productPrice = parseFloat(product.getAttribute('data-price'));
                const productSkin = product.getAttribute('data-skin').toLowerCase();

                // Lọc theo giá
                const priceMatch = productPrice >= minPrice && productPrice <= maxPrice;

                // Lọc theo skin
                const skinMatch = skinFilter === "" || productSkin.includes(skinFilter);

                // Hiển thị sản phẩm nếu thỏa mãn cả 2 điều kiện
                if (priceMatch && skinMatch) {
                    product.style.display = 'block';
                    found = true;
                } else {
                    product.style.display = 'none';
                }
            });

            if (!found) {
                alert('Không tìm thấy sản phẩm khớp với bộ lọc.');
            }
        }

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
