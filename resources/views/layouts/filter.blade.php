<div class="filter-bar">
    <div class="filter-item">
        <label for="min-price">Giá tối thiểu</label>
        <input type="number" id="min-price" placeholder="Giá tối thiểu" />
    </div>
    <div class="filter-item">
        <label for="max-price">Giá tối đa</label>
        <input type="number" id="max-price" placeholder="Giá tối đa" />
    </div>
    <div class="filter-item">
        <label for="skin-filter">Số tướng</label>
        <select id="skin-filter">
            <option value="">Tất cả</option>
            <option value="tướng 192">Tướng 192</option>
            <option value="tướng 165">Tướng 165</option>
            <option value="tướng 164">Tướng 164</option>
            <option value="tướng 192">Tướng 1665</option>
            <!-- Bạn có thể thêm các loại skin khác ở đây -->
        </select>
    </div>
    <button onclick="applyFilters()">Áp dụng bộ lọc</button>
</div>