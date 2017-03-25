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

### Parameters
| Name     | Value         |
|:---------|:--------------|
| username | Your username |
| password | Your password |

### Response

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



## [WIP] CRUD User 

If your account is an administrator you can easily manipulate all user's credential

## 
```
GET /api/v1/users
```

### Parameters
| Name     | Value         |
|:---------|:--------------|
| username | Your username |
| password | Your password |
