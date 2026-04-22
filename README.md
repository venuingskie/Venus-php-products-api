# php-products-api

## API Endpoints Documentation

| HTTP Method | Route | Operation |
| :--- | :--- | :--- |
| `GET` | `/products` | Retrieve all inventory items |
| `GET` | `/products/{id}` | Search specific item by ID |
| `POST` | `/products` | Add a new item to inventory |
| `PUT` | `/products/{id}` | Update existing product details |
| `DELETE` | `/products/{id}` | Remove item from records |

## Response Structure (Example)
```json
{
  "status": "you have success",
  "item": {
    "product_id": 013,
    "name": "Laptop",
    "price": 999.00
  }
}
