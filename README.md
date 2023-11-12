# First Steps

### Run:

```bash
composer install
```

### Configure:

Create a `.env` file. In this file, you will find the database configuration.

**MySQL:**
Create a MySQL database named as in the `.env` file.

### Run:

```bash
php artisan migrate --seed
php artisan migrate:fresh --seed
```

## API REQUESTS

### Endpoint:
```
/api/providers
```

### List of All Providers:
```
/api/providers
```

### Show Specific Provider By ID:
```
/api/providers/{id}
```
Example:
```
/api/providers/5
```

### Store: POST Method
```
/api/providers
```

#### Body Request Example:

```json
{
    "user_id": 2,
    "dni": "12345",
    "name": "Name",
    "description": "Description",
    "email": "email@email.com",
    "address": "Address",
    "phone": "300000000",
    "status": false
}
```

### Update: PUT/PATCH Method
```
/api/providers/{id}
```
Example:
```
/api/providers/5
```

#### Body Request Example:

```json
{
    "user_id": 2,
    "dni": "12345",
    "name": "New Name",
    "description": "New Description",
    "email": "newemail@newemail.com",
    "address": "New Address",
    "phone": "3003333333",
    "status": false
}
```

### Delete: DELETE Method
```
/api/providers/{id}
```
Example:
```
/api/providers/5
```
