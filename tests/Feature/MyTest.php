<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fooldal(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_csapatLetezik(){
        $response = $this->get('/csapattagok/1');
        $response->assertStatus(200);
    }

    public function test_NEMletezoCsapat(){
        $response = $this->get('/csapattagok/4654654646546546');
        $response->assertStatus(404);
    }

    public function test_csapatDb(){
        $this->assertDatabaseCount('csapatok',5);
    }


}
