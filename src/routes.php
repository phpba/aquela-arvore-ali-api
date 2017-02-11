<?php
// Routes

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Phpba\Tree\Model\Specie;
use Phpba\Tree\Model\Tree;

$app->group('/specie', function() {
    $this->get('/', function (Request $request, Response $response, $args) {
        //TODO: /specie/index
        $data = Specie::find('all');
        //TODO: knew list error, refactore
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->get('/{id:[0-9]+}', function () {
        //TODO: /specie/find
        $data = Specie::find($request->getAttribute('id'));
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->get('/{id:[0-9]+}/edit', function () {
        //TODO: /specie/edit
        $data = Specie::find($request->getAttribute('id'));
        if(! $data) {
            //TODO: report flash error message (Error to save Specie)
        }
        
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->post('/', function (Request $request, Response $response, $args) {
        //TODO: /specie/index
        $data = new Specie(['name' => $args['name'], 'name_popular' => $args['name_popular']]);
        if(! $data->save()) {
            //TODO: report flash error message (Error to save Specie)
        }
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->put('/{id:[0-9]+}', function (Request $request, Response $response, $args) {
        //TODO: /specie/update
        $data = Specie::find($request->getAttribute('id'));
        if(! $data) {
            //TODO: report flash error message (Specie not found)
        }
        $data->update();
        
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->delete('/{id:[0-9]+}', function (Request $request, Response $response, $args){
        //TODO: /specie/delete
        $data = Specie::find($request->getAttribute('id'));
        if(! $data->delete()) {
            //TODO: report flash error message
        }
        return json_encode(TRUE);
    });
});

$app->group('/tree', function() {

});
