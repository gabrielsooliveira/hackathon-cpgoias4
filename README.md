# Projeto Irrigago

Este projeto é um sistema de integração dados do CLIMWAT e CROPWAT para calcular as necessidades hídricas das culturas, os requisitos de irrigação com base nos dados de solo, clima e cultura e ajustar automaticamente as necessidades e os cronogramas de irrigação com base em dados de tempo real. Esta solução envolve a extração de água do lençol freático, o monitoramento em tempo real das condições do solo e das plantas, e a aplicação precisa de água através de um sistema de irrigação por gotejamento.

<p align="center">
  <img src="" alt="image painel"/>
  <img src="" alt="image-login"/>
  <img src="" alt="image home"/>
  <img src="" alt="image chat"/>
</p>


## Requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/) (versão 8.1 ou superior)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (versão 16 ou superior)
- [NPM](https://www.npmjs.com/) (ou [Yarn](https://yarnpkg.com/))
- [Laravel Herd](https://herd.laravel.com/windows) (Opcional)
- [API GEMINI](https://ai.google.dev/?authuser=1)

## Configuração do Ambiente

### 1. Clonagem do Repositório

O projeto utiliza um repositório bare para controle de versão. Para clonar o repositório, siga estes passos:

1. Navegue até o diretório onde deseja clonar o projeto. No caso de um repositório bare, você pode utilizar o seguinte comando:

    ```bash
    git clone https://github.com/gabrielsooliveira/hackathon-cpgoias4.git
    ```

2. Navegue até o diretório do projeto clonado:

    ```bash
    cd <diretorio-destino>
    ```
### 2. Instalação das Dependências

Instale as dependências do Laravel e do Vue.js com os seguintes comandos:

1. Instale as dependências do backend (Laravel):

    ```bash
    composer install
    ```

2. Instale as dependências do frontend (Vue.js):

    ```bash
    npm install
    ```

### 3. Configuração do Ambiente

1. Copie o arquivo `.env.example` para `.env`:

    ```bash
    cp .env.example .env
    ```

2. Configure as variáveis de ambiente no arquivo `.env` conforme necessário. As variáveis principais a serem configuradas são `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`e as chaves das Api's utilizadas `CLIMAPI_CONSUMER_KEY` e `OPENCAGE_API_KEY`.

3. Gere a chave de aplicação do Laravel:

    ```bash
    php artisan key:generate
    ```

4. Execute as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

### 4. Inicialização do Projeto
#### Caso não esteja utilizando o Laravel Herd siga os dois passo, se não apenas inicialize o segundo passo para rodar o vite e fazer o front-end inicializar

1. Inicie o servidor de desenvolvimento do Laravel:

    ```bash
    php artisan serve
    ```

2. Inicie o servidor de desenvolvimento do frontend (Vue.js):

    ```bash
    npm run dev
    ```


