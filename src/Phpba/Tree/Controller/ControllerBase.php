<?php

namespace Phpba\Tree\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ControllerBase {

    protected $request, $response;

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    
    public function render($result, $header = NULL) {
        return $this->response->getBody()->write($result);
    }

}
