# Basic Ecommerce Template - Installation Guide
## Basic Explanation of the site
This is a basic ecommerce template, with basic features of adding and displaying products.
It uses basic search to help user find the product.
'Type' is a table as you will learn below, which is used for categorizing the product.

#### Please note that the template does not use 'Buy Now' option, instead it uses 'Check Availability' which leads to a Whatsapp Chat with the admin [sub-admin, or the one whose Phone number was specified]
#### Also note that 'Sub-admin' is not restricted, it will be covered in future updates!

## Use of Database
A ecommerce.sql file is included in the zip, you will have to create a database called 'ecommerce' and import the file into the database.
There are three tables in the database namely - admins, products and type.
'admins' table includes all the admin users' entries.
'type' table includes the name of types of products. For eg: Shoes, Mobiles, etc
'products' table includes all the product entries.
## Admin Side
Put '/admin' infront of the site's url to access the admin login page. For eg: localhost/ecommerce/admin

#### Login credentials (You can make another user once you are inside)

#### Username: admin
#### Password: admin
### There are 5 options in the admin page

Add Product - While adding products, you have to specify a phone number to redirect the user to incase he/she wants to buy the product
Manage Product - Admin can edit product details or delete a product here
Manage Product Types - Types will be seen as categories to the consumer, every product belongs to a type. For eg: Shoes
Take An Order - When the consumer orders a product, admin has to enter a record in order to keep track of the stock
Manage Users - Admin can create new admins or sub-admins
## Some conventions to be followed
The images uploaded should be preferably 512 x 384 px
The images should be in png format with white background (white or no background images will look better on site)
## Future Updates
Sub-admin is to be restricted to only specified actions
Use of tags to search a product
Integrate 'Buy' option if possible
The 'Only Basics' E-commerce template A simple and basic e-commerce template An admin panel to create and manage products Simple systematic page to view the products
