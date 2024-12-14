let isSpinning = false;

function rotateFunction() {
    if (isSpinning) return; // Nếu đã quay, không cho quay nữa.

    isSpinning = true;

    // Lấy ngẫu nhiên một giá trị trong khoảng từ 360 đến 720 độ (2 đến 4 vòng quay)
    let randomDegree = Math.floor(Math.random() * 360) + 360;
    
    // Tính toán vị trí góc dừng của vòng quay (360 độ chia đều cho 4 phần)
    let degreeToStop = (randomDegree % 360) + 360 * 4; // Đảm bảo vòng quay đủ lớn

    // Thêm hiệu ứng quay cho vòng quay
    const box = document.getElementById('box');
    
    // Xóa các hiệu ứng quay cũ
    box.style.transition = 'transform 3s ease-out';

    // Quay vòng theo độ ngẫu nhiên
    box.style.transform = `rotate(${degreeToStop}deg)`;

    // Sau khi quay xong, reset lại trạng thái quay
    setTimeout(() => {
        isSpinning = false;
        // Bạn có thể thêm hành động sau khi quay xong tại đây, ví dụ như hiển thị kết quả
    }, 3000); // 3s là thời gian quay vòng
}
