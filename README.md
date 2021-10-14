# prevalence-search-data
Paquete para facilitar pasar datos a través de rutas

Pasos

1 Agregar "marcosorozco/catalogs": "dev-master" a composer json

"require": { ...., ...., "marcosorozco/catalogs": "dev-master" },

"repositories": [ { "type": "vcs", "url": "https://github.com/marcosorozco/catalogs.git" } ],

2. Agregar en config/app.php el providerMiPaqueteServiceProvider.php::class
"providers" => [ .., .., \Marcosorozco\Catalogs\Providers\CatalogServiceProvider::class ]


Happy code!

Funcionamiento

Para indicarle al sistema los valores que debe de pasar a travez de las rutas se le tiene que indicar mediante la invocacion de la funcion estatica del siguiente objeto, es posible definirla en el contructor del controlador o en el metodo del controlador donde sera utilizado

Url::setPrevalecenceData([]);

Generar una ruta con el redirect el routeSearch se comporta como el route solo se adicionan a los datos los del buscador sin necesidad de hacerlo manualmente 

  redirect()->routeSearch()
  
helpers

route_data() funciona de la misma manera que el route() con la diferencia que permite que prevalescan los datos

search_data() busca un valor del buscador

old_request() permite buscar un valor con old() o si no existe extraerlo del request()

old_search_request() permite buscar un valor con old() o si no existe extraerlo del search_data()
