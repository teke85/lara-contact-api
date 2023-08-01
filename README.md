
# Testing API With Authentization , Authorization 

Contact App API for testing 


# Account Crud 

#### Login (Post)

```http
 {{base_url}}/login
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** 
 |
| `password` | `string` | **Required**  |


#### Register (Post)

```http
 {{base_url}}/register
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**  |
| `email` | `string` | **Required**  |
| `password` | `string` | **Required**  |
| `password_confirmation` | `string` | **Required**  |


### rest  Password (POST)

```http
   {{base_url}}/reset
```
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `emai` | `string` | **Required**  |

### Change Password (POST)

```http
   {{base_url}}/new-pw
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `new_password` | `string` | **Required**  |
| `password` | `string` | **Required**  |
| `email` | `string` | **Required**   |
| `otp` | `string` | **Required**  |


### New Password    (POST)

```http
   {{base_url}}/new-pw
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `new_password` | `string` | **Required** |
| `password` | `string` | **Required**  |
| `email` | `string` | **Required**  m |
| `otp` | `string` | **Required**  |



## Profile

### user-profile (POST)

```http
 {{base_url}}/user-profile

```


### Get User devices (GET)

```http
  {{base_url}}/devices
```




### Logout (POST)

```http
   {{base_url}}/logout
```

### Logout All  (POST)

```http
   {{base_url}}/logout-all
```



### Delete  Account  (GET)

```http
   {{base_url}}/delete-account
```


### Search Record 



### Search   Record  (GET)

```http
   {{base_url}}/search-record
```
### Search   Record  (Delete)

```http
  {{base_url}}/search-record/{id}
```



## Contact Crud -------------------------------


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
| `name` | `string` | **Required**  |
| `country_code` | `integer` | **Required** |
| `phone_number` | `string` | **Required**  |


### Update Contact(PUT)

```
  {{base_url}}/contact/{id}
```
  #### You can update with only singe Parameter or more
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**  |
| `country_code` | `integer` | **Required**  |
| `phone_number` | `string` | **Required**  |



### Partial  Update Contact(Patch)

```
  {{base_url}}/contact/{id}
```
  #### You can update with only singe Parameter or more
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **optional**  |
| `country_code` | `integer` | **optional**  |
| `phone_number` | `string` | **optional**  |





### Delete Contact (DELETE)

```http
 {{base_url}}/contact/39
```



### Force Delete Contact     (DELETE)

```http
 {{base_url}}/force-delete-all
```

### Restore All  (GET)

```http
 {{base_url}}/restore-all
```

### Multiple Delete  (POST)

```http
 {{base_url}}/multiple-delete
```


### Multiple Delete  (GET)

```http
 {{base_url}}/contact/restore/{id}
```





## fav crud ---------------------------------
### add favourite  (POST)

```http
   {{base_url}}/new-pw
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `new_password` | `string` | **Required**  |
| `password` | `string` | **Required**  |
| `email` | `string` | **Required**   |
| `otp` | `string` | **Required**  |


### delete favourite  (POST)

```http
  {{base_url}}/favourite/{id}
```


### gel all fav  (get)

```http
  {{base_url}}/favourite
```




