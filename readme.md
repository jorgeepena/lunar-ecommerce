<p align="center"><img style="width: 300px;" src="http://werkn.mx/img/logo-lunar.svg"></p>

<p align="center">
</p>

# About Lunar E-Commerce
#### A collective effort by the community

<strong>Lunar</strong> is an e-commerce solution developed with <a href="https://laravel.com">Laravel</a> using <a href="https://getbootstrap.com/">Bootstrap 4.0 </a>. The project main objective is to create a robust, multi-purpose and accesible e-commerce which, as a secondary objective, extends its functionality with the help of plugins that allows for flexible development.

### Working Modules

- [x] User Modules
	- User Login / Register
	- Search Functionality for Products, Categories, etc.
	- WishList Funcionality
	- User Profile Views
		- Profile Overview w/ stats
			- Order Summary (Limit of 5)
		- Order Summary
		- Multiple User Addressess (CRUD)
		- Wishlist View
		- Edit Account
		- Upload Profile Image

- [x] Store Module
	- Product
		- Catalog View
		- Detail View
	- Shopping Cart
	- Checkout Proccess w/ Payment with Stripe

- [x] Admin Module
	- SEO & Page Configuration
	- Admin Login / Register
	- Admin Dashboard
	- Product CRUD
	- Categories CRUD

### Working On

- [ ] Checkout Directly from Wishlist
- [ ] Sales & Cupons
- [ ] Multi-language (ES & US)
- [ ] Related Products on Product Detail
- [ ] Review & Comment Functionality
- [ ] Review & Comment Moderation for Admin

### To-do List

- Easy Package Installation for Laravel Applications
- Personalized Installation / Config (Page Name, SEO Options)
- Save Payment Methods on User Account (!!! Security concern here !!!)
- Roles & Permissions
- Theme Capability
- Plugin Capability
- Multiple Payment Gateways (Stripe for US / OpenPay for Latin America)

- - - -

# Local Install

### Step 1

Clone the repository using this command:

```
git clone https://github.com/Eggotron/lunar-ecommerce.git
```
### Step 2

Set up your .env, if key is missing use:

```
php artisan key:generate
```

### Step 3

Composer update/install

```
composer update
```

### Step 4

Migrate Databases

```
php artisan migrate
```

And you are ready now amigo!
Go ahead and use php artisan serve to use the development locally.

### Optional Step

Lunar has Database Seeds prepared for a quick demo. The following code will execute the seeder for Product Table, Admin Table and User Table.

```
php artisan db:seed
```

##### User / Admin Details

Access with the following login credentials after seeding your database.

User:
- user@lunar.com
- lunar12345

Admin:
- admin@lunar.com
- lunar12345


<strong>Admin Panel: [domain]/admin</strong>


# Server Install

### Recommended Server Settings and Requisites

- Ubuntu 14 - 16.4
- Apache2
- MySQL
- Composer
- Git

### Install Git, Unzip.

```
sudo apt-get install git
sudo apt-get install unzip
```

### Install CURL + Composer

```
sudo apt-get install curl php-curl php-mcrypt php-mbstring php-gettext
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Enable Mods

```
sudo phpenmod mcrypt
sudo phpenmod mbstring
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### Git CLONE of proyect on HTML folder

```
cd /var/www/html
git clone [PROYECT URL]
```

### Enable Rewrite for folder

```
sudo chmod -R 777 [FOLDER_NAME]

```

### Access folder

```
cd /[FOLDER_NAME]
```

### Update project with COMPOSER 

```
composer update
```

### Configure Project's Directory

/etc/apache2/sites-available/default.com.conf 

```
<VirtualHost *:80>
	ServerName [RUTA].com
	DocumentRoot /var/www/html/[ FOLDER_NAME ]/public

	<Directory /var/www/html/[ FOLDER_NAME ]/public>
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

### Restart Server

```
service apache2 reload
```

### Last touches

Set up your enviroment config file and update your app key.

```
lunar-ecommerce/.env

php artisan key:generate
```


## Contributing

Lunar E-Commerce is in active development. If you want to contribute to this project simply do the Pull Request!

Any bug or problem <a href="https://github.com/Eggotron/lunar-ecommerce/issues/new">raise an issue here</a>

## License

This project is open-sourced software licensed under the [GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/).
