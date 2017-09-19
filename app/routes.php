<?php

    // Creating routes

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    // HOME ROUTE
    // Alternate way we can start doing routes if we want
    // $app->get('/', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Welcome - Brand Builders',
    //         'description' => 'Welcome to the official page of Alpha Inc.'
    //         ],
    //     ];
    //     return $this->view->render($response, 'home.twig', $vars);

    // })->setName('home');


    // Docs link to 'groups' doc info - https://www.slimframework.com/docs/objects/router.html#route-groups
    $app->group('/', function () {

        $this->get('', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                    'title' => 'Brand Builders Company',
                    'description' => 'Best apparel company in Austin',

                ],
                'active' => [
                    'home' => 'active',
                    'products' => '',
                    'services' => '',
                    'designs' => '',
                    'quoteRequest' => '',           
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });
        $this->get('index', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                    'title' => 'Brand Builders Company',
                    'description' => 'Best apparel company in Austin',
                ],
                'active' => [
                    'home' => 'active',
                    'products' => '',
                    'services' => '',
                    'designs' => '',
                    'quoteRequest' => '',           
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });

        $this->get('products', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Brand Builders Company',
                'description' => 'Best apparel company in Austin'
                ],
                'active' => [
                    'home' => '',
                    'products' => 'active',
                    'services' => '',
                    'designs' => '',
                    'quoteRequest' => '',           
                ],
            ];
            return $this->view->render($response, 'products.twig', $vars);    
        });

        $this->get('services', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Brand Builders Company',
                'description' => 'Best apparel company in Austin'
                ],
                'active' => [
                    'home' => '',
                    'products' => '',
                    'services' => 'active',
                    'designs' => '',
                    'quoteRequest' => '',           
                ],
            ];
            return $this->view->render($response, 'services.twig', $vars);    
        });

        $this->get('designs', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Brand Builders Company',
                'description' => 'Best apparel company in Austin'
                ],
                'active' => [
                    'home' => '',
                    'products' => '',
                    'services' => '',
                    'designs' => 'active',
                    'quoteRequest' => '',           
                ],
            ];
            return $this->view->render($response, 'designs.twig', $vars);    
        });

        $this->get('quote-request', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Brand Builders Company',
                'description' => 'Best apparel company in Austin'
                ],
                'active' => [
                    'home' => '',
                    'products' => '',
                    'services' => '',
                    'designs' => '',
                    'quoteRequest' => 'active',           
                ],
            ];
            return $this->view->render($response, 'quote-request.twig', $vars);    
        });

        $this->get('send-simple-email', function (Request $request, Response $response, $args) { 

            $mail = new PHPMailer;

            // $name = $_POST['contactName'];
            // $email = $_POST['contactEmail'];
            // $subject = $_POST['contactSubject'];
            // $message = $_POST['contactMessage'];

            $mail->addAddress("collegepregame@gmail.com");
            $mail->addBCC("zach@zachcookhustles.com");
            $mail->setFrom("zach@groupthreads.com", "Zach");

            $mail->isHTML(false);

            $mail->Subject = "Test email homie";
            $mail->Body = "TESTING IT :)";

            if(!$mail->send()) {
                error_log('Mailer Error: ' . $mail->errorMessage());
                $app->halt(500);
            } else {
                echo "Message sent successfully!";
                return $this->view->render($response, 'quote-request.twig', $vars); 
            }
            
        });
    });