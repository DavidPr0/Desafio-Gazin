<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

## Sobre

- Api para cadastras todos os desenvolvedores disponíveis para trabalhaar.

## Rodar projeto

    1 -> Após baixar o projeto do repositório duplique o arquivo .env.example e renomeie a cópia para .env e adicione as configurações do banco que forem informada no arquivo docker-composer.
    2 -> Execute o comando ```bash composer install``` para baixar todas bibliotecas.
    2 -> executar o comando docker-compose up -d para subir os containers do docker, finalizando sua aplicação estará em execução.
    3 -> Para realizar os testes será necessário acessar o bash do docker, utilizando o comando ```bash docker exec -it nome_do_container bash```, após acessar rodar o comando ```bash vendor/bin/phpunit```.

## Função da Api

- Cadastrar desenvolvedores
- Retorna todos os desenvolvedores
- Retorna os desenvolvedores de acordo com o termo passado via querystring e
paginação
- Retorna os dados de um desenvolvedor
- Atualiza os dados de um desenvolvedor
- Apaga o registro de um desenvolvedor

## Rotas
   
- Cadastrar Desenvolvedor
    ```bash
    Method -> POST
    Endpoint -> /api/developers
    Parametros ->
        {
            "name": "Thalles Daniel",
            "sex": "M",
            "age": 37,
            "birthDate": "1984-08-22",
            "hobby": "é OTOPATAMAR"
        }
    ```
 - Atualizar Desenvolvedor
    ```bash
    Method -> PUT
    Endpoint -> /api/developers
    Parametros ->
        {
            "name": "Thalles Daniel",
            "sex": "M",
            "age": 37,
            "birthDate": "1984-08-22",
            "hobby": "é OTOPATAMAR 4"
        }
    ```
  - Retornar Desenvolvedor
    ```bash
        Method -> GET
        Endpoint -> /api/developers/id
    ```
  - Filtro de Desenvolvedor 
    ```bash
        Method -> GET
        Endpoint -> /api/developers?id=&name=
                {
            "id",
            "name",
            "sex",
            "age",
            "hobby"
    ```
   - Deletar Desenvolvedor
    ```bash
        Method -> DELETE
        Endpoint -> /api/developers/id
        
    ```
 
