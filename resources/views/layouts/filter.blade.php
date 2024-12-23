<div class="filter-bar">
    <div class="filter-item">
        <label for="max-price">Giá tối đa</label>
        <input type="number" id="max-price" placeholder="Giá tối đa" />
    </div>
    <div class="filter-item">
        <label for="skin-filter">Số tướng</label>
        <select id="skin-filter">
            <option value="">Tất cả</option>
            <option value="0-100">0 - 100</option>
            <option value="101-200">101 - 200</option>
            <option value="201-300">201 - 300</option>
            <option value="300">300 trở lên</option>
        </select>
    </div>
    <button onclick="applyFilters()">Áp dụng bộ lọc</button>
</div>