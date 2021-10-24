<?php


namespace Http\Controller;

use App\Models\Developer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeveloperTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_and_filters_developers()
    {
        $response = $this->get('/api/developers');

        $response->assertJsonStructure(
            [
                "current_page",
                "data",
                "first_page_url",
                "from",
                "last_page",
                "last_page_url",
                "links",
                "next_page_url",
                "path",
                "per_page",
                "prev_page_url",
                "to",
                "total",
            ]
        );

        $response->assertStatus(200);
    }

    public function test_should_store_developer_when_payload_is_ok()
    {
        $payload = [
            'name' => 'Developer Teste',
            'sex' => 'M',
            'age' => 32,
            'hobby' => 'Programar',
            'birthDate' => '1989-10-24'
        ];

        $response = $this->post('/api/developers', $payload);
        $body = json_decode($response->getContent(), true);

        $response->assertJsonStructure(
            [
                'name',
                'sex',
                'age',
                'hobby',
                'birthDate'
            ]
        );

        $this->assertEquals($body['name'], $payload['name']);

        $response->assertStatus(201);
    }

    public function test_should_error_validation_store_developer_when_payload_is_invalid()
    {
        $payload = [
            'birthDate' => '24/10/1989'
        ];

        $response = $this->post('/api/developers', $payload);
        $body = json_decode($response->getContent(), true);

        $response->assertJsonStructure(
            [
                'errors'
            ]
        );

        $this->assertIsArray($body['errors']);
        $this->assertNotEmpty($body['errors']['name']);
        $this->assertNotEmpty($body['errors']['sex']);
        $this->assertNotEmpty($body['errors']['age']);
        $this->assertNotEmpty($body['errors']['hobby']);
        $this->assertNotEmpty($body['errors']['birthDate']);

        $response->assertStatus(422);
    }

    public function test_should_show_developer_by_id()
    {
        $developer = Developer::factory()->create();

        $response = $this->get('/api/developers/' . $developer->id);

        $response->assertJsonStructure(
            [
                'id',
                'name',
                'sex',
                'age',
                'hobby',
                'birthDate',
                'created_at',
                'updated_at'
            ]
        );

        $response->assertStatus(200);
    }

    public function test_should_return_exception_when_show_developer_not_found()
    {
        $response = $this->get('/api/developers/2');
        $body = json_decode($response->getContent(), true);

        $response->assertJsonStructure(
            [
                'error'
            ]
        );

        $this->assertEquals($body['error'], 'Developer não encontrado');

        $response->assertStatus(404);
    }

    public function test_should_update_developer_when_payload_is_ok()
    {
        $developer = Developer::factory()->create();

        $payload = [
            'name' => 'Developer Teste',
            'sex' => 'F',
            'age' => 23,
            'hobby' => 'Programar',
            'birthDate' => '1998-10-24'
        ];

        $response = $this->put('/api/developers/' . $developer->id, $payload);
        $body = json_decode($response->getContent(), true);

        $response->assertJsonStructure(
            [
                'name',
                'sex',
                'age',
                'hobby',
                'birthDate'
            ]
        );

        $this->assertEquals($body['name'], $payload['name']);
        $this->assertEquals($body['sex'], $payload['sex']);
        $this->assertEquals($body['age'], $payload['age']);
        $this->assertEquals($body['hobby'], $payload['hobby']);
        $this->assertEquals($body['birthDate'], $payload['birthDate']);

        $response->assertStatus(201);
    }

    public function test_should_delete_developer_when_developer_exist()
    {
        $developer = Developer::factory()->create();

        $response = $this->delete('/api/developers/' . $developer->id);

        $response->assertStatus(204);
    }


}
