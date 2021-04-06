# ElectroCom
### Electronical devices comparisson web page

## Topics involved:
- Model View Controller pattern with Php
- Templates management with Smarty engine
- Custom routing
- Different authorization levels for users

## Steps to get started:
**Prerequisites:** A local web server installed. I will use [Xampp](https://www.apachefriends.org/es/index.html) in this example
which is the most famous but you could use any other. [Some examples for you here](https://www.emezeta.com/articulos/15-aplicaciones-para-montar-servidores-web-en-local)
- Clone the repo in the htdocs folder of your Xampp download. The path should be like ``C:\xampp\htdocs\yourCutePage``
- Open Xampp and click *Start* of Apache and MySql
- Open your broser and go to ``localhost\phpMyAdmin`` and create a database named ... and another one called ...
- In your users db create, at least, one user, the one who will be your admin. It will have to use the mail "..."
- In your browser, go to ``localhost\yourCutePage``
- Have fun with the marvels of programming!

**Note:** you can create products manually with the admin aaccount or you can add them with ...

## Actions in the page:
### The page allows the user to do actions according to their authorization levels

If the user enters as visitor, it will be able to:
- See the categories and details of products
- See the comments of a specific product
- Sort comments

If the user is logged in, it could:
- Perform the same actions of a visitor
- Add a score and a comment for a product

If the user is logged in with the admin account, it will be able to:
- Do the same things a common user can
- Delete comments
- Add, delete and modify categories
- Add, delete and modify products as well
