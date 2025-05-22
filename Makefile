.PHONY: brain-calc brain-even brain-games install validate lint dump-autoload
install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

dump-autoload:
	composer dump-autoload