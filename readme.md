**Test Blog Installation Guide**
==================================
Installation:
----------------------
1 Copy all files and directories to your 

2 Write setting for database connection in file /Configs/dbconfig.php
```return [
         'host' => '', //address of MySQL Server;
         'dbname' => '', //name of your database(**It has been created yet!**);
         'user' =>'', //sername of MySQL database;
         'password' => '' //password for MySQl database user;
];
```
3 Open url (yourdomain.com/install.php)in your browser

4 If you see main page of Test Blog delete blog.sql and install.phph files.

5 There is 1 user with 'Writer' Role : data for sign in email: writer@domain.com, password: 6iGpkTeo

6 Rquirements: PHP >= 7.1, MySQL>= 5.6, apache >=2.4
