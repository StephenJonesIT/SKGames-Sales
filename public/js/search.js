document.getElementById('search-btn').addEventListener('click', searchProduct);

function searchProduct() {
    const input = document.getElementById('search-input').value.trim(); // Lấy giá trị từ ô input
    const products = document.querySelectorAll('#list-products .item'); // Lấy danh sách sản phẩm
    let found = false;

    // Duyệt qua tất cả sản phẩm
    products.forEach(product => {
        const productId = product.getAttribute('data-id'); // Lấy ID của sản phẩm
        if (productId === input) {
            product.style.display = 'block'; // Hiển thị sản phẩm khớp
            found = true;
        } else {
            product.style.display = 'none'; // Ẩn sản phẩm không khớp
        }
    });

    // Nếu không tìm thấy sản phẩm nào
    if (!found) {
        alert(`Không tìm thấy sản phẩm với ID: ${input}`);
    }
}
