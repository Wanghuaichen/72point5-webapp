<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class MainControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testViewHome()
    {
        $response = $this->get('/');

		$this->assertResponseOk();
    }
}
