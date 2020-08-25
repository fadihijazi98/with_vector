<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    public function test() {
        collect(['name', 'email', 'birth_day', 'company'])
            ->each(function ($field) {
                $response = $this->post('/api/contacts',
                    array_merge($this->data(), [$field => '']));
                $response->assertSessionHasErrors($field);
            });
//        $this->assertCount(1, Contact::all());


    }
    public function check_if_resource_contact_work_will() {
        factory(Contact::class)->create();
        $resp = $this->get('/api/all');
        //done..
        dd($resp);
    }
    public function data() {
        return [
          'name' => 'Test Name',
          'email' => 'test@test.test',
          'birth_day' => '23/10/2019',
          'company' => 'test company'
        ];
    }

}
