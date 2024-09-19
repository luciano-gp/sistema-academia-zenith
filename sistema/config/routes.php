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
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->setExtensions(['json']);

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/usuario', ['controller' => 'Usuario', 'action' => 'index']);
        $builder->connect('/usuario/view/*', ['controller' => 'Usuario', 'action' => 'view']);
        $builder->connect('/usuario/add', ['controller' => 'Usuario', 'action' => 'add']);
        $builder->connect('/usuario/edit/*', ['controller' => 'Usuario', 'action' => 'edit']);
        $builder->connect('/usuario/delete/*', ['controller' => 'Usuario', 'action' => 'delete']);

        $builder->connect('/aula', ['controller' => 'Aula', 'action' => 'index']);
        $builder->connect('/aula/view/*', ['controller' => 'Aula', 'action' => 'view']);
        $builder->connect('/aula/add', ['controller' => 'Aula', 'action' => 'add']);
        $builder->connect('/aula/edit/*', ['controller' => 'Aula', 'action' => 'edit']);
        $builder->connect('/aula/delete/*', ['controller' => 'Aula', 'action' => 'delete']);

        $builder->connect('/contrato', ['controller' => 'Contrato', 'action' => 'index']);
        $builder->connect('/contrato/view/*', ['controller' => 'Contrato', 'action' => 'view']);
        $builder->connect('/contrato/add', ['controller' => 'Contrato', 'action' => 'add']);
        $builder->connect('/contrato/edit/*', ['controller' => 'Contrato', 'action' => 'edit']);
        $builder->connect('/contrato/delete/*', ['controller' => 'Contrato', 'action' => 'delete']);

        $builder->connect('/exercicio', ['controller' => 'Exercicio', 'action' => 'index']);
        $builder->connect('/exercicio/view/*', ['controller' => 'Exercicio', 'action' => 'view']);
        $builder->connect('/exercicio/add', ['controller' => 'Exercicio', 'action' => 'add']);
        $builder->connect('/exercicio/edit/*', ['controller' => 'Exercicio', 'action' => 'edit']);
        $builder->connect('/exercicio/delete/*', ['controller' => 'Exercicio', 'action' => 'delete']);

        $builder->connect('/forma_pagamento', ['controller' => 'FormaPagamento', 'action' => 'index']);
        $builder->connect('/forma_pagamento/view/*', ['controller' => 'FormaPagamento', 'action' => 'view']);
        $builder->connect('/forma_pagamento/add', ['controller' => 'FormaPagamento', 'action' => 'add']);
        $builder->connect('/forma_pagamento/edit/*', ['controller' => 'FormaPagamento', 'action' => 'edit']);
        $builder->connect('/forma_pagamento/delete/*', ['controller' => 'FormaPagamento', 'action' => 'delete']);

        $builder->connect('/historico', ['controller' => 'Historico', 'action' => 'index']);
        $builder->connect('/historico/view/*', ['controller' => 'Historico', 'action' => 'view']);
        $builder->connect('/historico/add', ['controller' => 'Historico', 'action' => 'add']);
        $builder->connect('/historico/edit/*', ['controller' => 'Historico', 'action' => 'edit']);
        $builder->connect('/historico/delete/*', ['controller' => 'Historico', 'action' => 'delete']);

        $builder->connect('/lancamento', ['controller' => 'Lancamento', 'action' => 'index']);
        $builder->connect('/lancamento/view/*', ['controller' => 'Lancamento', 'action' => 'view']);
        $builder->connect('/lancamento/add', ['controller' => 'Lancamento', 'action' => 'add']);
        $builder->connect('/lancamento/edit/*', ['controller' => 'Lancamento', 'action' => 'edit']);
        $builder->connect('/lancamento/delete/*', ['controller' => 'Lancamento', 'action' => 'delete']);

        $builder->connect('/motivo_cancelamento', ['controller' => 'MotivoCancelamento', 'action' => 'index']);
        $builder->connect('/motivo_cancelamento/view/*', ['controller' => 'MotivoCancelamento', 'action' => 'view']);
        $builder->connect('/motivo_cancelamento/add', ['controller' => 'MotivoCancelamento', 'action' => 'add']);
        $builder->connect('/motivo_cancelamento/edit/*', ['controller' => 'MotivoCancelamento', 'action' => 'edit']);
        $builder->connect('/motivo_cancelamento/delete/*', ['controller' => 'MotivoCancelamento', 'action' => 'delete']);

        $builder->connect('/ocorrencia_aula', ['controller' => 'OcorrenciaAula', 'action' => 'index']);
        $builder->connect('/ocorrencia_aula/view/*', ['controller' => 'OcorrenciaAula', 'action' => 'view']);
        $builder->connect('/ocorrencia_aula/add', ['controller' => 'OcorrenciaAula', 'action' => 'add']);
        $builder->connect('/ocorrencia_aula/edit/*', ['controller' => 'OcorrenciaAula', 'action' => 'edit']);
        $builder->connect('/ocorrencia_aula/delete/*', ['controller' => 'OcorrenciaAula', 'action' => 'delete']);

        $builder->connect('/pessoa', ['controller' => 'Pessoa', 'action' => 'index']);
        $builder->connect('/pessoa/view/*', ['controller' => 'Pessoa', 'action' => 'view']);
        $builder->connect('/pessoa/add', ['controller' => 'Pessoa', 'action' => 'add']);
        $builder->connect('/pessoa/edit/*', ['controller' => 'Pessoa', 'action' => 'edit']);
        $builder->connect('/pessoa/delete/*', ['controller' => 'Pessoa', 'action' => 'delete']);

        $builder->connect('/plano', ['controller' => 'Plano', 'action' => 'index']);
        $builder->connect('/plano/view/*', ['controller' => 'Plano', 'action' => 'view']);
        $builder->connect('/plano/add', ['controller' => 'Plano', 'action' => 'add']);
        $builder->connect('/plano/edit/*', ['controller' => 'Plano', 'action' => 'edit']);
        $builder->connect('/plano/delete/*', ['controller' => 'Plano', 'action' => 'delete']);

        $builder->connect('/registro_presenca', ['controller' => 'RegistroPresenca', 'action' => 'index']);
        $builder->connect('/registro_presenca/view/*', ['controller' => 'RegistroPresenca', 'action' => 'view']);
        $builder->connect('/registro_presenca/add', ['controller' => 'RegistroPresenca', 'action' => 'add']);
        $builder->connect('/registro_presenca/edit/*', ['controller' => 'RegistroPresenca', 'action' => 'edit']);
        $builder->connect('/registro_presenca/delete/*', ['controller' => 'RegistroPresenca', 'action' => 'delete']);

        $builder->connect('/titulo', ['controller' => 'Titulo', 'action' => 'index']);
        $builder->connect('/titulo/view/*', ['controller' => 'Titulo', 'action' => 'view']);
        $builder->connect('/titulo/add', ['controller' => 'Titulo', 'action' => 'add']);
        $builder->connect('/titulo/edit/*', ['controller' => 'Titulo', 'action' => 'edit']);
        $builder->connect('/titulo/delete/*', ['controller' => 'Titulo', 'action' => 'delete']);

        $builder->connect('/treino', ['controller' => 'Treino', 'action' => 'index']);
        $builder->connect('/treino/view/*', ['controller' => 'Treino', 'action' => 'view']);
        $builder->connect('/treino/add', ['controller' => 'Treino', 'action' => 'add']);
        $builder->connect('/treino/edit/*', ['controller' => 'Treino', 'action' => 'edit']);
        $builder->connect('/treino/delete/*', ['controller' => 'Treino', 'action' => 'delete']);

        $builder->connect('/turma', ['controller' => 'Turma', 'action' => 'index']);
        $builder->connect('/turma/view/*', ['controller' => 'Turma', 'action' => 'view']);
        $builder->connect('/turma/add', ['controller' => 'Turma', 'action' => 'add']);
        $builder->connect('/turma/edit/*', ['controller' => 'Turma', 'action' => 'edit']);
        $builder->connect('/turma/delete/*', ['controller' => 'Turma', 'action' => 'delete']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};

