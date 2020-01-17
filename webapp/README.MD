# WEB APP

# Introduction
This sub directorty contains all the source code related to web application that is fetching the data from database and displaying it to the user via graphs as well as controlling user sessions to store who is logged in.

Recommended IDE: PHPStorm from JetBrains (https://www.jetbrains.com/phpstorm/download/#section=windows)
You can definitely make use of another PHP IDE or a text editor that can edit .php files. (Ex. Sublime Text)

To work along with this tutorial, you'll need the following:

* [PHP IDE] (Recommended: PHPStorm)
* [XAMPP or other alternatives](https://www.apachefriends.org/xampp-files/7.4.1/xampp-windows-x64-7.4.1-0-VC15-installer.exe)
* A modern browser (Ex. FireFox: https://www.mozilla.org/en-US/firefox/download/thanks/)

Third party libraries that have been used:
- Bootstrap
- ApexCharts

# Getting started:
After cloning this repository you can launch the project in PHPStorm directly without any changes. This can be done to edit the source code or learn from it.

## Getting started with XAMPP
1. Download and Install XAMPP
2. Run the Installer to Install XAMPP 
3. Select components
4. Select installation folder (this is where you will place this repository in)
5. You are ready to install
6. Installation Complete
7. Select your XAMPP Install Language
8. XAMPP is now Installed, run it (Apache and MySQL)

Now you can place this repository in htdocs folder inside XAMPP's directory.

## Logging in
You need to sign up as a new user in order to log in. However, software developers are lazy and we know that. So there is a superuser account. Credentials can be found below:

* Username: superuser
* Password: superuser
* Email: superuser[at]test[dot]com

Note: you can login using username instead of email as well.

# Database

#### Measurements
In this table all the measurements from the LoPy are stored in.
Every measurement has an id that is stored in order of meausrement
The broker splits the data from the LoPy into: temperature, humidity, pressure and light.
It also stores the date of the measured data.
```sql
CREATE TABLE `measurements` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `pressure` float NOT NULL,
  `light` float NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Login webapp
In this table all the information of the created accounts from the webapp are stored.
Every user has it's own id. Uid is the chosen name of the user, email is their email adress and pwd is their password.
```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

License
----

