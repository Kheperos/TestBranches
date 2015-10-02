#!/usr/bin/env bash
[9/21/2015 3:48:32 PM] Alexandru Zamfir: #!/bin/sh
WEBROOT="/var/www/exchange_app/public"
VHOSTDIR="/usr/local/zend/etc/sites.d/"
EXTENSION=""
RESTARTCMD="/usr/bin/sudo /etc/init.d/httpd restart"
if [ "$1" != '' ]; then
if [ ! -f "$VHOSTDIR$1" ]; then
cp "$VHOSTDIR/skeleton" "$VHOSTDIR/vhost_http_$1_80.conf$EXTENSION"
echo "created $VHOSTDIR$1$EXTENSION"
else
mv "$VHOSTDIR$1.conf" "$VHOSTDIR$1$EXTENSION.bak"
cp "$VHOSTDIR/skeleton" "$VHOSTDIR$1$EXTENSION"
echo "created $VHOSTDIR$1$EXTENSION and made a backup of the existing conf"
fi
find "$VHOSTDIR/vhost_http_$1_80.conf$EXTENSION" -type f -exec sed -i "s/SKELETON/$1/" {} \;
$RESTARTCMD
echo "subdomain created"
fi
[9/21/2015 3:49:18 PM] Alexandru Zamfir: skeletondev
# Created by Zend Server
<VirtualHost *:80>
DocumentRoot "/var/www/exchange_app/public"
<Directory "/var/www/exchange_app">
Options +Indexes +FollowSymLinks
DirectoryIndex index.php
Order allow,deny
Allow from all
AllowOverride All
</Directory>
ServerName SKELETON:80
# include the folder containing the vhost aliases for zend server deployment
#     Include "/usr/local/zend/etc/sites.d/http/SKELETON/80/*.conf"
</VirtualHost>