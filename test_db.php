<?php

require_once 'config/autoload.php';

use Managers\AbstractManager;

class TestManager extends AbstractManager
{
    public function testConnection()
    {
        return "Connexion réussie !";
    }
}

$test = new TestManager();
echo $test->testConnection();
