# Projeto: MenuManager

## 📸 Imagens do Projeto
Aqui estão algumas capturas de tela do projeto: </br>
## DASHBOARD
*<img  src="https://drive.google.com/uc?export=view&id=1-xLqa9FJksBmmI_wq5yfko0lFKZZ8Hi4" alt="Tela de Dashboard" width="800px">*
## CATEGORIAS
*<img  src="https://drive.google.com/uc?export=view&id=1-xb9V6sNzc7mnBYq5LpD-3vdZ7p2i7rc" alt="Tela de categorias" width="800px">*
## CRIAR PRATO
*<img  src="https://drive.google.com/uc?export=view&id=1-w_-zSd5T6Ht8pdCPbC9qMh1PFF7vPCu" alt="Tela de criar prato" width="800px">*
## LISTAR PRATOS
*<img  src="https://drive.google.com/uc?export=view&id=10cstzbdBji3B6PrGu4kGwGf0qDwPMmNB" alt="Tela de listar pratos" width="800px">*
## GERENTES
*<img  src="https://drive.google.com/uc?export=view&id=10gkkU04zWhxwqva97FTt3U3amzrod6dF" alt="Tela de gerentes" width="800px">*
## LOGS
*<img  src="https://drive.google.com/uc?export=view&id=10jQfrekWlgkFeOg1OjGOZ0ftzWAy5fcG" alt="Tela de logs" width="800px">*
## SOBRE
*<img  src="https://drive.google.com/uc?export=view&id=10l5KXvgQRFEUHBSB4LgpAz9qjXqeM8__" alt="Tela de logs" width="800px">*
## CLIENTE - HOME 
*<img  src="https://drive.google.com/uc?export=view&id=10xCVBW1DpD_sJ-zZVcRNBC8juMiN50BL" alt="Tela de logs" width="300px">*
## CLIENTE - SIDEBAR 
*<img  src="https://drive.google.com/uc?export=view&id=10tTlRHTJnTKT0ZbQrSHYgQl061akqXqz" alt="Tela de logs" width="300px">*
## CLIENTE - LISTAR PRATO
*<img  src="https://drive.google.com/uc?export=view&id=10tMZlMIQSaQeDofZFO10RP7SlE7ORuQB" alt="Tela de logs" width="300px">*
## CLIENTE - APRESENTAR PRATO
*<img  src="https://drive.google.com/uc?export=view&id=10nROYJsXq75VqPkb3hyrZp-OJRZZuJ9G" alt="Tela de logs" width="300px">*

---
## Descrição
O projeto visa o desenvolvimento de um sistema de gerenciamento de pratos para um cardápio online, com foco na manutenção de um cardápio dinâmico e na melhoria da compreensão de clientes estrangeiros. A proposta é integrar um cardápio digital a um sistema web, permitindo que o gerente edite qualquer item do cardápio. Além disso, o sistema oferece a possibilidade de visualizar o cardápio em diferentes idiomas, otimizando a gestão e oferecendo maior acessibilidade para clientes internacionais. A solução pode ser adaptada para diversos estabelecimentos do ramo alimentício.

## Tecnologias Utilizadas
O desenvolvimento do projeto utilizou as seguintes tecnologias:

### **Backend**
- **Laravel**: Framework PHP utilizado para construção da lógica do sistema.
- **MySQL + phpMyAdmin**: Gerenciamento do banco de dados da aplicação.
- **APICHATGPT**: Utilizei da API do ChatGpt para fazer a tradução das descrições dos pratos.
- **Processamento assíncrono**: Requisições AJAX para otimizar a interação com o backend.

### **Frontend**
- **HTML, CSS, JS**: Base para estrutura e estilização da interface.
- **Tailwind CSS**: Framework para estilização rápida e responsiva.
- **jQuery**: Facilitação das interações dinâmicas e requisições AJAX.

### **Controle de Versão**
- **Git & GitHub**: Versionamento e hospedagem do código.
- **GitHub Desktop**: Gerenciamento visual das branches e commits.


# Como iniciar o projeto no seu Desktop

Este guia irá ajudá-lo a configurar e rodar o projeto corretamente no seu ambiente local.

## 1. Clonando o Repositório

Primeiro, clone o repositório do GitHub para o seu computador usando o seguinte comando:

```sh
git clone https://github.com/victoracad/MenuManager.git
```

Depois, entre na pasta do projeto:

```sh
cd MenuManager
```

## 2. Instalando o XAMPP

O projeto utiliza **servidor Apache e MySQL**, que podem ser configurados utilizando o **XAMPP**. Se você ainda não o possui instalado, siga os passos abaixo:

1. Baixe o XAMPP no site oficial: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Instale o XAMPP e inicie os serviços **Apache** e **MySQL** pelo painel de controle.

Isso garantirá que o servidor e o banco de dados estejam rodando corretamente.

## 3. Instalando o Laravel

Certifique-se de que você tenha o **Composer** instalado. Se não tiver, baixe e instale pelo site oficial:

[https://getcomposer.org/](https://getcomposer.org/)

Após instalar o Composer, dentro da pasta do projeto, execute o seguinte comando para instalar as dependências do Laravel:

```sh
composer install
```

## 4. Instalando o Node.js

O **Tailwind CSS** já está configurado no repositório, então não há necessidade de instalá-lo novamente. No entanto, para rodá-lo corretamente, precisamos do **Node.js**.

Se você ainda não tem o **Node.js**, baixe e instale a versão mais recente no site oficial:

[https://nodejs.org/](https://nodejs.org/)

Após a instalação, dentro da pasta do projeto, instale as dependências do Node.js:

```sh
npm install
```

## 5. Configurando o ambiente

Antes de rodar o projeto, configure o arquivo `.env` com suas credenciais do banco de dados. Caso não exista, copie o arquivo de exemplo:

```sh
cp .env.example .env
```

E gere a chave do aplicativo:

```sh
php artisan key:generate
```
# Dentro do arquivo .env existe uma variável chamada: APIKEYGPT, Você deverá ter uma chave da API do ChatGpt

## 🔑 Como obter uma chave da API do ChatGPT (OpenAI)

### 1. Criar uma conta na OpenAI
- Acesse: [https://platform.openai.com/signup](https://platform.openai.com/signup)
- Crie sua conta (pode usar Google, email ou conta do GitHub).

---

### 2. Acessar o painel da API
- Após o login, vá para: [https://platform.openai.com/account/api-keys](https://platform.openai.com/account/api-keys)

---

### 3. Gerar uma nova chave
- Clique em **“+ Create new secret key”**.
- Copie a chave exibida e **guarde em um local seguro** (ela será exibida apenas uma vez).

---

### 4. Salvar no `.env`
- Abra seu arquivo `.env` no projeto Laravel e adicione:
- APIKEYGPT=sk-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX



## 6. Rodando o projeto

Agora, siga os passos abaixo para iniciar o servidor Laravel e o Tailwind CSS:

1. No **VS Code**, abra um terminal e rode o servidor do Laravel:

    ```sh
    php artisan serve
    ```

2. Abra **outro terminal** no VS Code e inicie o Tailwind CSS:

    ```sh
    npm run dev
    ```

3. Certifique-se de que **Apache** e **MySQL** estão ativos no XAMPP.

4. No navegador, acesse o projeto através do seguinte endereço:

    ```
    http://127.0.0.1:8000
    ```

Agora o projeto está rodando corretamente no seu ambiente local! 🚀
