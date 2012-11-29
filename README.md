mixedappseg
===========

Aplikasi yang dibuat dari Framework CodeIgniter 2.1.3, digunakan untuk contoh-contoh script / tutorial yang ada di www.citstudio.com.
<br/>

Setting / Konfigurasi XAMPP
=====================================================================
# php.ini
short_open_tag = On

#httpd.cnf/.conf (Virtual hosts)
#uncomment vhosts
Include "conf/extra/httpd-vhosts.conf"

# conf/extra/httpd-vhosts.conf
<VirtualHost *:80>
 ServerAdmin webmaster@localhost
 DocumentRoot D:/kerjaan/aplikasi/php/mixedappseg
 ServerName scripts.suhendra.com

 <Directory "D:/kerjaan/aplikasi/php/mixedappseg">
 Options Indexes FollowSymLinks Includes ExecCGI
 AllowOverride All
 Order allow,deny
 Allow from all
 </Directory>
</VirtualHost>

# /application/config/config.php
$config['base_url']	= "http://scripts.suhendra.com/";