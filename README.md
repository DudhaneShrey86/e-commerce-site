<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Guide</title>
    <style media="screen">
      li{
        margin: 5px auto;
      }
    </style>
  </head>
  <body>
    <h1>Basic Ecommerce Template - Installation Guide</h1>
    <ul>
      <li>
        <h2>Basic Explanation of the site</h2>
        <p>This is a basic ecommerce template, with basic features of adding and displaying products.<br> It uses search to help user find the product.<br>'Type' is a table as you will learn below, which is used for categorizing the product. </p>
        <b>Please note that the template does not use 'Buy Now' option, instead it uses 'Check Availability' which leads to a Whatsapp Chat with the admin [sub-admin, or the one whose Phone number was specified]</b>
        <p><b>Also note that 'Sub-admin' does not have restricted access, it will be covered in future updates!</b></p>
      </li>
      <li>
        <h2>Use of Database</h2>
        <ol>
          <li>The database used for this project is phpMyAdmin [MySQL]</li>
          <li>An ecommerce.sql file is included in the folder, create a database called 'ecommerce' and import the file into the database.</li>
          <li>There are three tables in the database namely - admins, products and type.</li>
          <li><b>'admins'</b> table includes all the admin users' entries.</li>
          <li><b>'type'</b> table includes the name of types of products. For eg: Shoes, Mobiles, etc </li>
          <li><b>'products'</b> table includes all the product entries.</li>
        </ol>
      </li>
      <li>
        <h2>Admin Side</h2>
        <p>Put '/admin' infront of the site's url to access the admin login page. For eg: localhost/ecommerce/admin</p>
        <p><b>Login credentials (You can make another user once you are inside)</b></p>
        <b>Username: admin</b><br>
        <b>Password: admin</b>
        <p>There are 5 options in the admin page</p>
        <ol>
          <li><b>Add Product</b> - While adding products, you have to specify a phone number to redirect the user to incase he/she wants to buy the product</li>
          <li><b>Manage Product</b> - Admin can edit product details or delete a product here</li>
          <li><b>Manage Product Types</b> - Types will be seen as categories to the consumer, every product belongs to a type. For eg: Shoes</li>
          <li><b>Take An Order</b> - When the consumer orders a product, admin has to enter a record in order to keep track of the stock</li>
          <li><b>Manage Users</b> - Admin can create new admins or sub-admins</li>
        </ol>
      </li>
      <li>
        <h2>Some conventions to be followed</h2>
        <ol>
          <li>The images uploaded should be preferably 512 x 384 px</li>
          <li>The images should be in png format with white background (white or no background images will look better!)</li>
        </ol>
      </li>
    </ul>
  </body>
</html>
