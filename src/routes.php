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
    
    $this->get('/{id:[0-9]+}', function (Request $request, Response $response, $args) {
        //TODO: /specie/find
        $data = Specie::find($request->getAttribute('id'));
        return $response->write(json_encode($data->to_array()));
    });
    
    $this->get('/{id:[0-9]+}/edit', function (Request $request, Response $response, $args) {
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
        return $response->write(json_encode(TRUE));
    });
});

$app->group('/tree', function() {
    //GET /tree/
    $this->get('/', function(Request $request, Response $response, $args    ) {
        $data = Tree::find('all');
        if(! $data) {
            return $response->write(json_encode(['error' : 'List error message']));
        }
        return $response->write(json_encode($data->to_array()));
    });
    //GET /tree/id
    $this->get('/{id:[0-9]+}', function(Request $request, Response $response, $args    ) {
        $data = Tree::find($request->getAttribute('id'));
        if(! $data) {
            return $response->write(json_encode(['error' : 'Find error message']));
        }
        return $response->write(json_encode($data->to_array()));
    });
    //POST /tree/
    $this->post('/', function(Request $request, Response $response, $args    ) {
        $data =new Tree;
        $data->specie_id = Specie::find($args['specie'])->id;
        $data->category_id = Specie::find($args['category'])->id;
        $data->latitude = $args['latitude'];
        $data->longitude = $argd['longitude'];
        if(! $data->save()) {
            return $response->write(json_encode(['error' : 'Create error message']));
        }
        return $response->write(json_encode($data->to_array()));
    });
    //PUT /tree/id
    $this->put('/{id:[0-9]+}', function(Request $request, Response $response, $args    ) {
        $data = Tree::find($request->getAttribute('id'));
        if(! $data) {
            return $response->write(json_encode(['error' : 'Update error message, Tree not exist']));
        }
        return $response->write(json_encode($data->to_array()));
    });
    //DELETE /tree/id
    $this->delete('/{id:[0-9]+}', function(Request $request, Response $response, $args    ) {
        $data = Tree::find($request->getAttribute('id'));
        if(! $data->delete()) {
            return $response->write(json_encode(['error' : 'Delete error message']));
        }
        return $response->write(json_encode($data->to_array()));
    });
});
