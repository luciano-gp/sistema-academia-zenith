<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/api/', function (RouteBuilder $builder): void {
        $builder->setExtensions(['json']);

        // Conectar rotas do tipo RESTful
        $builder->resources('Pessoa');
        $builder->resources('Usuario');
        $builder->resources('Aula');
        $builder->resources('Plano');
        $builder->resources('Contrato');
        $builder->resources('Exercicio');
        $builder->resources('FormaPagamento');
        $builder->resources('Historico');
        $builder->resources('Lancamento');
        $builder->resources('MotivoCancelamento');
        $builder->resources('OcorrenciaAula');
        $builder->resources('RegistroPresenca');
        $builder->resources('Titulo');
        $builder->resources('Treino');
        $builder->resources('Turma');

        // Rotas adicionais da API podem ser conectadas aqui
       // $builder->connect('/custom-endpoint', ['controller' => 'CustomController', 'action' => 'customAction']);

        // Fallback para rotas REST padrão
        $builder->fallbacks(DashedRoute::class);
    });
};

