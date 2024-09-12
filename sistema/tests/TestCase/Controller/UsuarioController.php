<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class UsuarioController extends TestCase
{
    use IntegrationTestTrait;

    public array $fixtures = [
        'app.Usuario',
    ];

    public function testIndex()
    {
        $this->get('/api/usuario');
        $this->assertResponseOk();
        $this->assertContentType('application/json');
        $this->assertResponseContains('"usuario"');
    }

    public function testAdd()
    {
        $data = [
            'email' => 'maria@example.com',
            'senha' => 'Maria',
        ];
        $this->post('/api/usuario.json', $data);
        $users = $this->getTableLocator()->get('Usuario');
        $query = $users->find()->all();
        $this->assertEquals(2, $query->count());
    }
}
