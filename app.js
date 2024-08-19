const products = [
    { name: "Apple", price: 1.5, quantity: 100, image: "apple.jpg" },
    { name: "Banana", price: 1.0, quantity: 150, image: "banana.jpg" }
];
const inventory = [
    { name: "Apple", quantity: 100 },
    { name: "Banana", quantity: 150 }
];
const sales = [
    { product: "Apple", quantity: 5, total: 7.5 },
    { product: "Banana", quantity: 10, total: 10.0 }
];

document.addEventListener('DOMContentLoaded', () => {
    loadProducts();
    loadInventory();
    loadSales();
    updateDashboard();
});

function showProductForm() {
    document.getElementById('product-form').style.display = 'block';
}

function addProduct(event) {
    event.preventDefault();
    const name = document.getElementById('product-name').value;
    const price = document.getElementById('product-price').value;
    const quantity = document.getElementById('product-quantity').value;
    const image = document.getElementById('product-image').files[0];
    
    const reader = new FileReader();
    reader.onloadend = () => {
        const product = { name, price, quantity, image: reader.result };
        products.push(product);
        updateProductList();
        document.getElementById('product-form').style.display = 'none';
    };
    reader.readAsDataURL(image);
}

function updateProductList() {
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';
    products.forEach((product, index) => {
        const productItem = document.createElement('div');
        productItem.innerHTML = `
            <p>${product.name} - R${product.price} - ${product.quantity} units</p>
            <img src="${product.image}" alt="${product.name}">
            <button onclick="deleteProduct(${index})">Delete</button>
        `;
        productList.appendChild(productItem);
    });
}

function deleteProduct(index) {
    products.splice(index, 1);
    updateProductList();
}

function loadProducts() {
    updateProductList();
}

function loadInventory() {
    const inventoryList = document.getElementById('inventory-list');
    inventoryList.innerHTML = '';
    inventory.forEach(item => {
        const inventoryItem = document.createElement('div');
        inventoryItem.innerHTML = `<p>${item.name} - ${item.quantity} units in stock</p>`;
        inventoryList.appendChild(inventoryItem);
    });
}

function loadSales() {
    const salesList = document.getElementById('sales-list');
    salesList.innerHTML = '';
    sales.forEach(sale => {
        const saleItem = document.createElement('div');
        saleItem.innerHTML = `<p>Sold ${sale.quantity} units of ${sale.product} for R${sale.total}</p>`;
        salesList.appendChild(saleItem);
    });
}

function updateDashboard() {
    const dashboardContent = document.getElementById('dashboard-content');
    const totalSales = sales.reduce((sum, sale) => sum + sale.total, 0);
    dashboardContent.innerHTML = `<p>Total Sales: R${totalSales.toFixed(2)}</p>`;
}
