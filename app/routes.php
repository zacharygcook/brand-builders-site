<?php

    // Creating routes

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    // HOME ROUTE
    // 
    // $app->get('/', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Welcome - Brand Builders',
    //         'description' => 'Welcome to the official page of Alpha Inc.'
    //         ],
    //     ];

    //     var_dump("Hit this.");

    //     return $this->view->render($response, 'home.twig', $vars);

    // })->setName('home');


    // DESIGNS ROUTE
    // 
    // $app->get('/', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Designs- Brand Builders',
    //         'description' => 'Check out our designs!'
    //         ],
    //     ];  

    //     return $this->view->render($response, 'designs.twig', $vars);

    // })->setName('designs');


    // PRODUCTS ROUTE
    // 
    // $app->get('/products', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Products - Brand Builders',
    //         'description' => 'We offer all of these products!'
    //         ],
    //     ];  

    //     return $this->view->render($response, 'products.twig', $vars);

    // })->setName('products');

    // HAIL MARY ROUTE GROUPS SOLUTION
    // Docs link to related content - https://www.slimframework.com/docs/objects/router.html#route-groups
    // Works but it doesn't fix anything
    $app->group('/', function () {


        $this->get('designs', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Products - Brand Builders',
                'description' => 'We offer all of these products!'
                ],
            ];
            return $this->view->render($response, 'designs.twig', $vars);    
        });

        $this->get('', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Products - Brand Builders',
                'description' => 'We offer all of these products!'
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });
    });