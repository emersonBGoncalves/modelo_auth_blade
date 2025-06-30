# modelo_auth_blade - Sistema Laravel com Docker

---

## Pré-requisitos

- [Docker](https://www.docker.com/) instalado
- Docker Compose instalado

---

## Como rodar o projeto

### 1. Baixar o repositório

Clone o projeto na sua máquina:

```bash
git clone https://github.com/emersonBGoncalves/modelo_auth_blade.git
cd modelo_auth_blade
```

### 2. Configurar o arquivo `.env`

Copie o `.env.example`, crie o `.env` a partir dele, e altere as seguintes variaveis para oa seguintes valores:

```env
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=modelo_auth_blade_db
DB_PORT=5432
DB_DATABASE=modelo_auth_blade
DB_USERNAME=root
DB_PASSWORD=root
```

### 3. Subir os containers

Com o Docker instalado, execute o comando abaixo para construir e iniciar os containers:

```bash
docker-compose up -d --build
```

### 4. Acessar o container

Depois que os containers estiverem rodando, entre no container do Laravel:

```bash
docker exec -it modelo_auth_blade bash
```

### 5. Rodar as migrations e seeders

Dentro do container, execute o seguinte comando para criar as tabelas e popular com dados iniciais:

```bash
php artisan migrate --seed
```

Essa parte vai demorar um pouco pois estará rodando o seeder que insere 100.000 antenas
