clear
echo "Borrando cache..... clear-cache"
composer clear-cache
echo "Ejecutando comando de preparación....... dump-autoload"
composer dump-autoload
echo "Limpiando bd...... migrate:reset"
php artisan migrate:reset
echo "Migrando tablas...... migrate"
php artisan migrate
echo "Creando data en tablas....... db:seed"
php artisan db:seed
# echo "Creando data en tablas... "
# php artisan db:seed
# echo "Creando data en tabla libros... "
# php artisan db:seed --class=LibrosTableSeeder
# echo "Exito... "