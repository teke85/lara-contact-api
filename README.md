
# Testing API With Authentization , Authorization 

Contact App API for testing 


## API Reference

#### Login (Post)

```http
 {{base_url}}/login
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** htut@gmail.com
 |
| `password` | `string` | **Required** 1111 |


#### Register (Post)

```http
 {{base_url}}/register
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** htut |
| `email` | `string` | **Required** htut@gmail.com |
| `password` | `string` | **Required** 1111 |
| `password_confirmation` | `string` | **Required** 1111 |




### Get Contacts (Get)

```http
 {{base_url}}/register
```


### Get Single Contact (Get)

```http
  {{base_url}}/contact/1
```

### Create Contact(POST)

```http
  {{base_url}}/contact
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `country_code` | `integer` | **Required** +959 |
| `phone_number` | `string` | **Required** post@gmail.com |


### Update Contact(PUT)

```
  {{base_url}}/contact/2
```
  #### You can update with only singe Parameter or more
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `country_code` | `integer` | **Required** +959 |
| `phone_number` | `string` | **Required** post@gmail.com |

### Delete Contact (DELETE)

```http
 {{base_url}}/contact/39
```








### Get User devices (GET)

```http
  {{base_url}}/devices
```

### rest  Password (POST)

```http
   {{base_url}}/reset
```
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `emai` | `string` | **Required** htut@gmail.com |

### Change Password (POST)

```http
   {{base_url}}/new-pw
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `new_password` | `string` | **Required** 1111 |
| `password` | `string` | **Required** 1111 |
| `email` | `string` | **Required**  htut@gmail.com |
| `otp` | `string` | **Required**  12345678|



### Logout (POST)

```http
   {{base_url}}/logout-all
```



### Another Features 



### add favourite  (POST)

```http
   {{base_url}}/new-pw
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `new_password` | `string` | **Required** 1111 |
| `password` | `string` | **Required** 1111 |
| `email` | `string` | **Required**  htut@gmail.com |
| `otp` | `string` | **Required**  12345678|


### delete favourite  (POST)

```http
  {{base_url}}/favourite/{id}
```


### gel all fav  (get)

```http
  {{base_url}}/favourite
```



### delete user account   (GET)

```http
 {{base_url}}/delete-account
```

|you just need to login   |


### user-profile (POST)

```http
 {{base_url}}/user-profile

```

