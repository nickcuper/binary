dir=$(dirname $0)
. $dir/common.sh
env=${1:-"dev"}

# Setup directory permissions
chmod 777 ./admin/www/assets
chmod 777 ./manager/www/assets
chmod 777 ./api/www/assets
chmod 777 ./mapi/www/assets
chmod 777 ./runtime
chmod 777 ./runtime/cache
chmod 777 ./uploads
chmod 777 ./uploads/temp
chmod 755 ./yiic

# Create local config file if not exits
test -f ./common/config/main-local.php || cp ./common/config/main-local.example.php ./common/config/main-local.php

# Composer install
if [ $env = "prod" ] ; then
    php ./composer.phar install --no-dev --optimize-autoloader
else
    php ./composer.phar install --dev
fi

./vendor/bin/bowerphp install

yiic="php $appdir/yiic"
$yiic migrate up --interactive=0

rm -rf ./admin/www/assets/*
rm -rf ./manager/www/assets/*
rm -rf ./api/www/assets/*
rm -rf ./,api/www/assets/*
rm -f ./runtime/cache/*
