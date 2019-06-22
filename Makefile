init:
	composer install
	make create-db

create-db:
	php bin/console d:d:c --if-not-exists
	php bin/console d:s:u --force
	php bin/console d:f:l --no-interaction