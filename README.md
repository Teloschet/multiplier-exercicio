# Exércicio CRUD - Multiplier
**Sistema de gerenciamento de Produtos.**

### Requisitos

- Sistema Operacional Debian >= 10 / Ubuntu
- PostgreSQL >= 11 (preferencialmente) ou MySQL/MariaDB
- PHP >= 7.1.3
- NGNIX ou Apache
- Composer
- Git

### Instalação
```bash
git clone https://github.com/Teloschet/multiplier-exercicio.git multiplier
cd multiplier
composer install
cp .env.example .env
php artisan key:generate
```

- Para configurar a conexão com o postgreSQL edite o arquivo .env:
```bash
DB_CONNECTION=pgsql or mysql
DB_HOST=127.0.0.1
DB_PORT=5432(postgresql) or 3306(mysql) / 3007(mariadb)
DB_DATABASE=multiplier
DB_USERNAME=postgres or laravel or root
DB_PASSWORD=*****
```

- Para enviar email de ativação da conta e ouvidoria
```bash
MAIL_DRIVER=smtp
MAIL_HOST=10.**.**.**
MAIL_PORT=25
MAIL_USERNAME=***@***.multiplier.com.br
MAIL_PASSWORD=*******
MAIL_ENCRYPTION=null
```

- Para criar as tabelas no banco de dados
```bash
php artisan migrate
```
- Para inserir a carga inicial de dados
```bash
php artisan db:seed
``` 

- Para criar um link simbólico de storage/app/public para dentro public/storage
```bash
php artisan storage:link
```

##### Testar aplicação localmente.
```bash
php artisan serve
```

##### That's all. Enjoy.

### Change log
##### v 1.0.0
