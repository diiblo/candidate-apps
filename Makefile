SHELL := /bin/bash
.DEFAULT_GOAL := help

DC ?= docker compose
PHP ?= php

# Paths (si ton code Symfony est dans ./backend)
BACK_DIR ?= backend
CONTAINER_BACK_DIR ?= /var/www/backend

# Symfony
SYMFONY_VERSION ?= 8.0.*

.PHONY: help
help:
	@echo ""
	@echo "Commandes:"
	@echo "  make up            # démarre les conteneurs"
	@echo "  make down          # stop + supprime conteneurs"
	@echo "  make restart       # redémarre"
	@echo "  make ps            # état des services"
	@echo "  make logs          # logs"
	@echo "  make sh            # shell dans php"
	@echo ""
	@echo "Symfony:"
	@echo "  make symfony-new   # crée Symfony skeleton dans ./backend (FORCE=1 si dossier non vide)"
	@echo "  make symfony-webapp # ajoute le pack webapp"
	@echo "  make install       # composer install"
	@echo "  make console ARGS='...'  # ex: make console ARGS='cache:clear'"
	@echo "  make migrate       # doctrine migrations migrate"
	@echo ""

.PHONY: up down restart ps logs sh
up:
	$(DC) up -d --build

down:
	$(DC) down

restart:
	$(DC) restart

ps:
	$(DC) ps

logs:
	$(DC) logs -f --tail=200

sh:
	$(DC) exec $(PHP) sh

# --- Symfony helpers
.PHONY: symfony-new symfony-webapp install console migrate

symfony-new:
	@if [ ! -d "$(BACK_DIR)" ]; then \
		echo "❌ Dossier $(BACK_DIR) introuvable. Crée-le (mkdir -p $(BACK_DIR)) ou change BACK_DIR."; exit 1; \
	fi
	@if [ "$(FORCE)" != "1" ] && [ -n "$$(ls -A $(BACK_DIR) 2>/dev/null)" ]; then \
		echo "❌ $(BACK_DIR) n'est pas vide. Vide-le ou relance avec FORCE=1"; exit 1; \
	fi
	$(DC) exec -T $(PHP) sh -lc 'cd $(CONTAINER_BACK_DIR) && composer create-project symfony/skeleton:"$(SYMFONY_VERSION)" .'

symfony-webapp:
	$(DC) exec -T $(PHP) sh -lc 'cd $(CONTAINER_BACK_DIR) && composer require webapp'

install:
	$(DC) exec -T $(PHP) sh -lc 'cd $(CONTAINER_BACK_DIR) && composer install'

console:
	@if [ -z "$(ARGS)" ]; then echo "Usage: make console ARGS='cache:clear'"; exit 1; fi
	$(DC) exec $(PHP) sh -lc 'cd $(CONTAINER_BACK_DIR) && symfony console $(ARGS)'

migrate:
	$(DC) exec -T $(PHP) sh -lc 'cd $(CONTAINER_BACK_DIR) && php bin/console doctrine:migrations:migrate --no-interaction'
