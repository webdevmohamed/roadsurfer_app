# Roadsurfer Fitness Activity App
This [web application](https://roadsurfer-app-5sxad.ondigitalocean.app/) is created in PHP vanilla with a MySQL database.

## Local Installation

- Download the project and store it in a folder of your choice.

- Move the created folder into the htdocs directory of an Apache server (in my case, I used XAMPP).

- Change the .htaccess file

from this:
```bash
RewriteEngine On
RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(?!public/)(.*)$ index.php [L]

RewriteCond %{REQUEST_URI} ^/public/
RewriteRule ^ - [L]
```
to this (replace "folder" with the name of the folder you chose previously):

```bash
RewriteEngine On
RewriteBase /folder

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(?!public/)(.*)$ index.php [L]

RewriteCond %{REQUEST_URI} ^/folder/public/
RewriteRule ^ - [L]
```

- Rename the .env.example file to .env and change the database variables as needed. URL_PREFIX should always be set to the directory of the created folder.
- You can use the roadsurfer_db.sql file located in the root of the project to generate an initial database. 
- Use the package manager [Composer](https://getcomposer.org/) to install the composer.json dependencies.
```bash
composer install
```

