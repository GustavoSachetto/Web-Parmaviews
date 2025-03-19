<?php 

require __DIR__.'/includes/app.php';

use App\Http\Router;

$obRouter = new Router(URL);

include 'routes/pages.php';

$obRouter->run()->sendReponse();