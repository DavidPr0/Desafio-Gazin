## Sobre

- Api para cadastras todos os desenvolvedores disponíveis para trabalhar.

## Rodar projeto

   - Após baixar o projeto do repositório duplique o arquivo .env.example e renomeie a cópia para .env e adicione as configurações do banco que forem informada no arquivo docker-composer.
   - Execute o comando ```
    composer install
    ``` para baixar todas bibliotecas.
   - executar o comando ```
    docker-compose up -d 
    ``` para subir os containers do docker, finalizando sua aplicação estará em execução.
   - Para realizar os testes será necessário acessar o bash do docker, utilizando o comando ```
    docker exec -it nome_do_container bash
    ```, após acessar rodar o comando ```
     vendor/bin/phpunit
    ```.

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
 
