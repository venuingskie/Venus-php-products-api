const express = require('express');
const app = express().use(express.json());

let products = [
    { id: 1, product: 'Laptop', price: 999.99 },
    { id: 2, product: 'Mouse', price: 25.50 }
];

// Routes
app.get('/api/products', (req, res) => res.json(products));

app.get('/api/products/:id', (req, res) => {
    const item = products.find(p => p.id == req.params.id);
    item ? res.json(item) : res.status(404).send('Not found');
});

app.post('/api/products', (req, res) => {
    const newP = { id: products.length + 1, ...req.body };
    products.push(newP);
    res.status(201).json(newP);
});

app.put('/api/products/:id', (req, res) => {
    const i = products.findIndex(p => p.id == req.params.id);
    if (i < 0) return res.status(404).send('Not found');
    products[i] = { id: parseInt(req.params.id), ...req.body };
    res.json(products[i]);
});

app.delete('/api/products/:id', (req, res) => {
    products = products.filter(p => p.id != req.params.id);
    res.status(204).send();
});

app.listen(3000, () => console.log('Server running on port 3000'));
