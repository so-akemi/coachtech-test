<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\Category;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_contact_form_can_be_submitted()
    {
        $category = Category::create(['content' => '商品のお届けについて']);

        $response = $this->post('/thanks', [
            'category_id' => $category->id,
            'last_name'  => 'テスト',
            'first_name'   => '太郎',
            'gender'      => 1,
            'email'       => 'test@example.com',
            'tel1'         => '080',
            'tel2'         => '1234',
            'tel3'         => '5678',
            'address'     => '東京都渋谷区',
            'detail'      => 'テストメッセージです。',
            'contact'     => 'submit_value',
        ]);

        $this->assertDatabaseHas('contacts', [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200);
    }
}
