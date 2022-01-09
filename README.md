# Oderço Distribuidora

Sistema desenvolvido como teste para vaga de Desenvolvedor Full Stack na Oderço Distribuidora

### Tecnologias Utilizadas
- Framework Backend: Laravel 8
- Framework JavaScript: VueJS
- Framework CSS: Bootstrap (Biblioteca bootstrap-vue)
- Banco de Dados Relacional: MySQL

## Instruções para Instalação

Link do Repositório
```
https://github.com/marcellowb/oderco.git

```


- Após baixar o o projeto do repositório, executar os comandos abaixo para a instalação dos pacotes do composer e npm
```
composer install
npm install

```

- Configurar as credenciais do banco de dados (mysql) no arquivo .env
- Executar o comando para configuração da chave do Laravel

```
php artisan key:generate

```

- Executar o comando para criação do banco de dados (migrations seeds)

```
php artisan migrate --seed

```

- Executar o projeto

```
Servidor Web: php artisan serve
Servidor NPM: npm run dev
```


## Endponts para Teste

- Cadastro de Cotação de Frete
```
Endpoint: [HOST]/api/cotacao
Method: POST
```

- Calcular Imposto
```
Endpoint: [HOST]/api/cotacao
Method: PUT
```

- Listar Impostos
```
Endpoint: [HOST]/api/cotacao
Method: GET
```
