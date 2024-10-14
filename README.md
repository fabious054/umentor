# Projeto UMENTOR CRUD

Este projeto é um exemplo de uma aplicação CRUD simples, configurada para rodar em um servidor local utilizando a estrutura do framework **umentor**.

## Configurações Gerais

### Base URL
A base URL foi configurada no arquivo `/app/config/App.php` com o valor: http://localhost/umentor/public


### Rotas
A rota principal `/` foi configurada no arquivo `/app/config/Routes.php` para abrir a `index` do **controller** `Crud`.
A rota adicionar `/adicionar` foi configurada no arquivo `/app/config/Routes.php` para abrir a `adicionar` do **controller** `Crud` como um POST.
A rota editar `/editar` foi configurada no arquivo `/app/config/Routes.php` para abrir a `editar` do **controller** `Crud` como um POST.
A rota buscar `/buscar` foi configurada no arquivo `/app/config/Routes.php` para abrir a `buscar` do **controller** `Crud` como um GET.
A rota deletar `/deletar` foi configurada no arquivo `/app/config/Routes.php` para abrir a `deletar` do **controller** `Crud` como um GET.

### Estrutura de Pastas
Dentro da pasta `/public`, foram criados dois diretórios responsáveis pelos arquivos de estilo e script:

- **/public/js**: Para armazenar os arquivos JavaScript do projeto.
- **/public/css**: Para armazenar os arquivos CSS do projeto.

### Dependências Externas
Na view **crud**, além dos arquivos CSS e JS próprios do projeto, também estão sendo carregados o **jQuery** via CDN, o **Bootstrap** para estilização e componentes, o **SweetAlert** para alertas e o **FontAwesome** para ícones.

```html
**Font-Awesome**
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
**JQUERY**
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KyZXEAg3QhqLMpG8r+8fhAXLRlI/hChmWw5r3HXbVRs=" crossorigin="anonymous"></script>
**Boostrap**
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
**SweetAlert**
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.min.css" rel="stylesheet">
```

### Banco de dados
Para armazenamento e gerenciamento dos dados utilizei o Mysql dentro da AWS

# Configurações do DB 
A conexão com o DB foi feita em `/app/config/Database.php`

# Tabela criada para dados
CREATE TABLE `app_funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `situacao` enum('contratado','em_teste','demitido') NOT NULL,
  `admitido_em` date NULL,
  `criado_em` date NULL,
  `ultima_atualizacao` date NULL
) COLLATE 'utf8mb3_general_ci';

### Armazendo projeto no GitHub 
[Umentor_GitHub](https://github.com/fabious054/umentor)
- git init
- git add .
- git commit -m "primeiro commit projeto crud umentor"
- git branch -M main
- git remote add origin git@github.com:fabious054/umentor.git
- git push -u origin main


## Como Executar o Projeto
Siga os passos abaixo para executar o projeto em sua máquina local:

1. **Clone o repositório** em sua máquina local.
2. **Configure a base URL** no arquivo `/app/config/`.
3. **Verifique as rotas** no arquivo `/app/Routes.php`.
4. **Configure o acesso ao banco de dados MySQL** como este projeto está apenas para um teste criei uma base de dados onde já vai subir configurada pois não ocorre perigo de dados.
5. **Inicie o servidor local** e acesse o projeto no navegador apontando para `http://localhost/umentor/public`.





