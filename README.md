<h1 align="center">WS</h1>


## WebService
WebService para teste de upload de arquivos

## Iniciando projeto

```
git clone git@github.com:walternascimentobarroso/ws.git
composer install
cp .env.example .env
```

### Configurando o .env

No arquivo .env modifique os campos:

DESTINO_PATH=<kbd>caminho_de_destino</kbd>  
DESTINO_SCRIPT=<kbd>script</kbd>  
DESTINO_POOLING_TXT=<kbd>arquivo_pooling</kbd>

```
php artisan key:generate
php artisan serve --host=0.0.0.0 --port=80
```

## Rotas disponíveis
 Method   | URI                | Action
----------|--------------------|----------------------------------------------- 
POST     | api/ws_hash         | App\Http\Controllers\WSController@hash
POST     | api/ws_optimization | App\Http\Controllers\WSController@optimization
POST     | api/ws_upload       | App\Http\Controllers\WSController@upload
GET      | api/ws_url_video    | App\Http\Controllers\WSController@urlVideo
