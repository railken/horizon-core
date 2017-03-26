# Horizon: Core

This is the core of Horizon.

Horizon is a multi-service web project and this is the core.

The core will provide OAuth2 authentication for all services connected with it.

What kind of service is providing Horizon? (What's Today, Music Player)

# Install

1) Clone the repository
```
$ git clone https://github.com/railken/horizon-core [directory]
```
2) Install with composer
```
$ composer install
```
3) Configure your .env (Remember APP_URL, it's important!!!)

4) [WIP] Add Admin user + OAuth Client

# Routes

## Authentication

```
POST /api/v1/sign-in
```

#### Parameters
| Name     | Value         |
|:---------|:--------------|
| username | Your username |
| password | Your password |

#### Response

```json
{
  "status": "success",
  "data": {
    "token_type": "Bearer",
    "expires_in": 3600,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI",
    "refresh_token": "ZiT8UDY3BvR+LoPWQDOjm5SfACT5AHy71oQWtOMeV9"
  }
}
```



## CRUD User 

If your account is an administrator you can easily manipulate all user's credential

## Retrieve all users
```
GET /api/v1/admin/users
```

#### Parameters
| Name     | Value         |
|:---------|:--------------|
| page     | Current page of listing |
| show     | Number of maximum records to retrieve |
| search   | Basic array search, the key corresponds to the name field |

#### Response

```json
{
  "status": "success",
  "message": "ok",
  "data": {
    "resources": [
      {
        "id": 1,
        "name": "admin",
        "email": "admin@admin.com",
        "created_at": "2017-03-25 22:53:59",
        "updated_at": "2017-03-25 22:53:59",
        "username": "admin",
        "role": "admin"
      }
    ],
    "pagination": {
      "query": {},
      "page": 1,
      "take": "1",
      "show": "1",
      "total": 1,
      "max_results": "1",
      "first_result": 0,
      "from": 0,
      "to": 1,
      "pages": 1
    },
    "sort": {
      "field": "id",
      "direction": "desc"
    },
    "search": []
  }
}
```


## Add a user
```
POST /api/v1/admin/users
```

#### Parameters
| Name     | Value         |
|:---------|:--------------|
| username | Username (Unique) |
| email    | Email (Unique) |
| password | Password |
| role 	   | Role (admin or user) |

#### Response

```json
{
  "status": "success",
  "message": "ok",
  "data": {
    "resource": {
      "id": 1,
      "username": "admin",
      "email": "admin@admin.com"
    }
  }
}
```

## Edit a user
```
PUT /api/v1/admin/users/1
```

#### Parameters
| Name     | Value         |
|:---------|:--------------|
| username | Username (Unique) |
| email    | Email (Unique) |
| password | Password |
| role 	   | Role (admin or user) |

#### Response

```json
{
  "status": "success",
  "message": "ok",
  "data": {
    "resource": {
      "id": 1,
      "username": "admin",
      "email": "admin@admin.com"
    }
  }
}
```

### Show a user
```
GET /api/v1/admin/users/1
```

#### Response

```json
{
  "status": "success",
  "message": "ok",
  "data": {
    "resource": {
      "id": 1,
      "username": "admin",
      "email": "admin@admin.com"
    }
  }
}
```

## Delete users

You can delete multiple resource at once
```
DELETE /api/v1/admin/users/1;2
```

### Response

```json
{
  "status": "success",
  "message": "ok"
}
```

