mixedappseg
===========

Aplikasi yang dibuat dari Framework CodeIgniter 2.1.3, digunakan untuk contoh-contoh script / tutorial yang ada di www.citstudio.com.
<br/>

Setting / Konfigurasi XAMPP
=====================================================================
php.ini <br/>
short_open_tag = On <br/>

&gt; <b>httpd.cnf/.conf (Virtual hosts)</b> <br/>
uncomment vhosts<br/>
Include "conf/extra/httpd-vhosts.conf"<br/>

&gt; <b>conf/extra/httpd-vhosts.conf</b> <br/>
&lt;VirtualHost *:80&gt; <br/>
 ServerAdmin webmaster@localhost <br/>
 DocumentRoot D:/kerjaan/aplikasi/php/mixedappseg <br/>
 ServerName scripts.suhendra.com <br/>

 &lt;Directory "D:/kerjaan/aplikasi/php/mixedappseg"&gt; <br/>
 Options Indexes FollowSymLinks Includes ExecCGI <br/>
 AllowOverride All <br/>
 Order allow,deny <br/>
 Allow from all <br/>
 &lt;/Directory&gt; <br/>
&lt;/VirtualHost&gt;

&gt; <b> /application/config/config.php </b> <br/>
$config['base_url']	= "http://scripts.suhendra.com/";