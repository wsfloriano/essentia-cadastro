<h1>Cadastro de Clientes</h1

Laravel 5.8

Foi utilizado para criação servidor Xampp com php 7.3 e MariaDB

Procedimento de Instalação

Git Clone

<code> $ git clone https://github.com/wsfloriano/essentia-cadastro.git </code>

Acesse a pasta do projeto e execute do comando do composer:

`` $ composer install ``

Banco de dados (MySQL)

Abra o banco de dados MySQL e crie o database (essentia).

Na pasta raiz do projeto, configure o arquivo:  

.env  

```  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=essentia  
DB_USERNAME=root  
DB_PASSWORD=  
  
```  

Execute o comando:

`` $ php artisan migrate  ``

Aplicação

Execute o comando:

`` $ php artisan serve  ``

No navegador, acesse o endereço http://127.0.0.1:8000/ para abrir o sistema, ou conforme suas configurações locais.
