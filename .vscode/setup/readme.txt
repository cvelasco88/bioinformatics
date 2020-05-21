
# install composer
# then install libraries of composer.json with:
composer update

# set writable permissions

sudo chmod -R 0777 ./runtime/
sudo chmod -R 777 ./web/assets
sudo chmod -R 777 ./uploads

# to debug the application
# install xdebug if not included in xampp and set the right path

[xDebug]
zend_extension=/usr/lib/php/20190902/xdebug.so

xdebug.profiler_output_dir = "/tmp/xdebug/"
xdebug.profiler_enable = On
xdebug.remote_enable=1
xdebug.remote_autostart=1
xdebug.remote_host="127.0.0.1"
xdebug.remote_port=9000
xdebug.remote_handler="dbgp"
xdebug.idekey = VSCODE