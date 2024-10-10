# Projeto UMENTOR CRUD

Este projeto é um exemplo de uma aplicação CRUD simples, configurada para rodar em um servidor local utilizando a estrutura do framework **umentor**.

## Configurações Gerais

### Base URL
A base URL foi configurada no arquivo `/app/config/` com o valor: http://localhost/umentor/public


### Rotas
A rota principal `/` foi configurada no arquivo `/app/Routes.php` para abrir a `index` do **controller** `Crud`.

### Estrutura de Pastas
Dentro da pasta `/public`, foram criados dois diretórios responsáveis pelos arquivos de estilo e script:

- **/public/js**: Para armazenar os arquivos JavaScript do projeto.
- **/public/css**: Para armazenar os arquivos CSS do projeto.

### Dependências Externas
Na view **crud**, além dos arquivos CSS e JS próprios do projeto, também está sendo carregado o **jQuery** via CDN para utilização no frontend.


```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KyZXEAg3QhqLMpG8r+8fhAXLRlI/hChmWw5r3HXbVRs=" crossorigin="anonymous"></script>
```

### Banco de dados
Para armazenamento e gerenciamento dos dados utilizei o Mysql dentro da AWS

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





