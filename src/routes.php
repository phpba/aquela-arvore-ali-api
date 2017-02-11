<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/specie', function() {
    $this->get('/', function (){
        //TODO: /specie/index
    });
    $this->get('/{id:[0-9]+}', function (){
        //TODO: /specie/find
    });
    $this->get('/{id:[0-9]+}/edit', function (){
        //TODO: /specie/edit
    });
    $this->post('/', function (){
        //TODO: /specie/index
    });
    $this->put('/{id:[0-9]+}', function (){
        //TODO: /specie/update
    });
    $this->delete('/{id:[0-9]+}', function (){
        //TODO: /specie/delete
    });
});

$app->group('/tree', function() {

});
