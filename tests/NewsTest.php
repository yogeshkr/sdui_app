<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;
use Tests\TestCase;

class NewsTest extends TestCase
{
     /**
     * /news [GET]
     */
    public function testShouldReturnAllNews()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/api/v1/news", []);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            [
                'id',
                'title',
                'content',
                'created_at',
                'updated_at',
                'user_id',
            ]
        ]);

    }

    /**
     * /news/id [GET]
     */
    public function testShouldReturnNews(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/api/v1/news/2", []);
        $response->seeStatusCode(200);
        $response->seeJsonStructure(
            [
                'status',
                'data' =>
                [
                    'id',
                    'title',
                    'content',
                    'created_at',
                    'updated_at',
                    'user_id',
                ]
            ]
        );

    }

    /**
     * /news [POST]
     */
    public function testShouldCreateNews(){

        $parameters = [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ];

        $user = User::factory()->create();
        $response = $this->actingAs($user)->post("/api/v1/news", $parameters, []);
        $response->seeStatusCode(200);
        $response->seeJsonStructure(
            [
                'status',
                'message',
                'data' =>
                [
                    'title',
                    'content',
                    'user_id',
                    'created_at',
                    'updated_at',
                    'id',
                ]
            ]
        );
    }

    /**
     * /news/id [PUT]
     */
    public function testShouldUpdateNews(){

        $parameters = [
            'title' => 'Update Title',
            'content' => 'Update Content',
        ];
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put("/api/v1/news/2", $parameters, []);
        $response->seeStatusCode(200);
        $response->seeJsonStructure(
            [
                'status',
                'message',
                'data' =>
                [
                    'id',
                    'title',
                    'content',
                    'created_at',
                    'updated_at',
                    'user_id',
                ]
            ]
        );
    }

    /**
     * /news/id [DELETE]
     */
    public function testShouldDeleteNews()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->delete("/api/v1/news/5", [], []);
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}
