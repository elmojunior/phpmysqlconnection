# PHP MySQL Connection

Código de conexão com banco de dados MySQL em PHP.

## Dependências

Para execução deste código é necessário ter instalado:

- Apache Server;
- PHP com os módulos MySQL.

## Exemplo

Este repositório contém um código de exemplo que pode ser executado via Docker. Para isso, é necessário ter o Docker instalado. Você pode baixar e instalar por meio do site oficial [https://docs.docker.com/engine/install](https://docs.docker.com/engine/install/).

### 1. Criar Rede Docker

Primeiramente é necessário criar uma rede no Docker para a comunicação entre os containers. Para isso, execute o seguinte comando abaixo, onde "nome-da-rede" deverá ser o nome da sua rede a ser criada:

```bash
$ docker network create -d bridge nome-da-rede
```

### 2. Criar Container MySQL

Para criar o container MySQL, execute o comando em seu terminal, já com o Docker instalado, subistituindo as seguintes variáveis por:

- **"container-mysql":** nome do container MySQL;
- **"senha":** senha do usuário root (administrador) do MySQL;
- **"nome-da-rede":** nome da rede criada no passo anterior;
- **"caminho-do-mysql":** caminho local onde os arquivos de dados do MySQL serão armazenados.


```bash
$ docker run --name container-mysql -v "caminho-do-mysql":/var/lib/mysql -e MYSQL_ROOT_PASSWORD=senha -p 3306:3306 --network nome-da-rede -d mysql
```

### 3. Criar Imagem Apache PHP Server

Baixe o código "Dockerfile" deste repositório, e execute o seguinte comando abaixo, no mesmo diretório onde o arquivo foi baixado, onde "nome-da-imagem" deverá ser o nome da imagem a ser criada:

```bash
$ docker build -t nome-da-imagem .
```

### 4. Criar Container Apache PHP Server

Agora com a imagem já criada, crie um container com o seguinte comando abaixo, subistituindo as seguintes variáveis por:

- **"container-apache-php":** nome do container Apache PHP Server;
- **"caminho-html":** caminho local onde os arquivos web serão acessados;
- **"nome-da-rede":** nome da rede cirada no primeiro passo deste tutorial;
- **"nome-da-imagem"** nome da imagem criada no passo anterior.

```bash
$ docker run -d --name container-apache-php -v "caminho-html":/var/www/html --network nome-da-rede -p 80:80 nome-da-imagem
```

### 5. Criar Banco de Dados

Crie um banco de dados usando o arquivo SQL de exemplo neste repositório. Para isso, acesse o container MySQL com o comando abaixo, onde "container-mysql" se refere ao nome do container MySQL criado anteriormente:

```bash
$ docker exec -it container-mysql mysql -u root -p
```

Em seguida copie o código SQL abaixo, cole em seu termial, e tecle ENTER para executá-lo:

```sql
CREATE DATABASE `dados`;

USE `dados`;

CREATE TABLE `pessoas` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    idade INT
);

INSERT INTO `pessoas` (nome, idade)
VALUES
    ('Ana', 25),
    ('Bruno', 32),
    ('Carla', 19),
    ('Daniel', 41),
    ('Elisa', 28),
    ('Fábio', 23),
    ('Gabriel', 35),
    ('Helena', 27),
    ('Isabel', 31),
    ('Júlio', 24);
```

Após este procedimento digite `exit` e tecle ENTER para sair do terminal.

### 6. Executar Código PHP

Baixe os códigos deste repositório e altere as suas variáveis de acordo com os seus dados de conexão. E em seguida já poderá visualizar os dados através de um navador, por meio do endereço ["http://localhost"](http://localhost).

## Licença

Este código é distribuído com a Licença MIT.
