const express = require('express');
const app = express();
const PORT = 3000;

app.use(express.json());

// Simulated 'products' table
let products = [
    { id: 1, product: 'Laptop', price: 999.99 },
    { id: 2, product: 'Mouse', price: 25.50 }
];

// 1. GET all products
app.get('/api/products', (req, res) => {
    res.status(200).json(products);
});

// 2. GET product by ID
app.get('/api/products/:id', (req, res) => {
    const item = products.find(p => p.id === parseInt(req.params.id));
    if (!item) return res.status(404).send('Product not found');
    res.json(item);
});

// 3. POST new product
app.post('/api/products', (req, res) => {
    const newProduct = {
        id: products.length + 1,
        product: req.body.product,
        price: req.body.price
    };
    products.push(newProduct);
    res.status(201).json(newProduct);
});

// 4. PUT (Update) product
app.put('/api/products/:id', (req, res) => {
    const item = products.find(p => p.id === parseInt(req.params.id));
    if (!item) return res.status(404).send('Product not found');

    item.product = req.body.product;
    item.price = req.body.price;
    res.json(item);
});

// 5. DELETE product
app.delete('/api/products/:id', (req, res) => {
    products = products.filter(p => p.id !== parseInt(req.params.id));
    res.status(204).send();
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
