# Projeto de API Rest com Symfony
Esse projeto é uma API Rest desenvolvida com Symfony, Doctrine e PHP. Que é utilizada no projeto SimplificaFinancasFront. 

## 1 - Iniciando o projeto
```bash 
docker network create symfony
```
```bash
docker compose up -d --build
```

## 2 - Acessando o container
```bash
docker compose exec app /bin/bash
```
## 3 - Instalando as dependências
```bash
composer install
```
## 4 - Criando o banco de dados
```bash
bin/console doctrine:migrations:generate

bin/console doctrine:migrations:migrate
```
## 5 - Gerando Passphrase
```bash
openssl rand -base64 32
```
Copie o resultado e cole no arquivo .env na variável JWT_PASSPHRASE

## 6 - Criando chaves JWT
```bash
mkdir config/jwt
```
```bash
openssl genrsa -out config/jwt/private.pem -aes256 4096
```
Digite a passphrase gerada no passo 5

```bash
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
Digite a passphrase gerada no passo 5

Após atualize as permissões:
```bash
chmod 600 config/jwt/private.pem
chmod 644 config/jwt/public.pem
chown -R www-data:www-data config/jwt
```
