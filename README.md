mixedappseg
===========

Aplikasi yang dibuat dari Framework CodeIgniter 2.1.3, digunakan untuk contoh-contoh script / tutorial yang ada di www.citstudio.com.
<br/>

Setting / Konfigurasi XAMPP
=====================================================================
php.ini
short_open_tag = On

#httpd.cnf/.conf (Virtual hosts)
uncomment vhosts
Include "conf/extra/httpd-vhosts.conf"

conf/extra/httpd-vhosts.conf
&lt;VirtualHost *:80&gt; <br/>
 ServerAdmin webmaster@localhost <br/>
 DocumentRoot D:/kerjaan/aplikasi/php/mixedappseg <br/>
 ServerName scripts.suhendra.com <br/>

 &lt;Directory \"D:/kerjaan/aplikasi/php/mixedappseg\"&gt; <br/>
 Options Indexes FollowSymLinks Includes ExecCGI <br/>
 AllowOverride All <br/>
 Order allow,deny <br/>
 Allow from all <br/>
 &lt;/Directory&gt; <br/>
&lt;/VirtualHost&gt;

# /application/config/config.php
$config['base_url']	= "http://scripts.suhendra.com/";