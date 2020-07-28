<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Hash;//criptografia
use Illuminate\Support\Facades\DB;

class ViewsTest extends TestCase
{
    public function testViewsNotLoged()
    {
        $response = $this->get('/');
        $response->assertStatus(302);//redirecionado para /home

        $response = $this->get('/home');
        $response->assertStatus(200);

        $response = $this->get('list/anime');
        $response->assertStatus(200);

        $response = $this->get('list/anime/visited');
        $response->assertStatus(200);

        $response = $this->get('list/anime/top');
        $response->assertStatus(200);

        $response = $this->get('show/1');
        $response->assertStatus(200);

        $response = $this->get('show/1000');
        $response->assertStatus(200);

        $response = $this->get('profile');
        $response->assertStatus(302);//redirecionado para o login
    
        $response = $this->get('favorites');
        $response->assertStatus(302);//redirecionado para o login

        $response = $this->get('favorited/1');
        $response->assertStatus(302);//redirecionado para o login
    
        $response = $this->get('login');
        $response->assertStatus(200);

        $response = $this->get('register');
        $response->assertStatus(200);

        
    }
    
    public function testViewsLoged()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $email = "testee@teste";
        $user = factory(User::class)->create([
            'password' => bcrypt($password = '12345678'),
            'email' => $email,
        ]);
        
        //credenciais incorretas
        $response = $this->post('login', [
            'email' => $email."a",
            'password' => $password,
        ]);
        $response->assertStatus(302);
        
        //credenciais corretas
        $response = $this->post('login', [
            'email' => $email,
            'password' => $password,
        ]);
        

        $response = $this->actingAs($user)->get('profile');
        $response->assertStatus(200);
    
        $response = $this->actingAs($user)->get('favorites');
        $response->assertStatus(200);

        $response = $this->get('favorited/1');
        $response->assertStatus(200);
    
        $response = $this->get('favorited/1000');
        $response->assertStatus(302);

        $response = $this->post('logout', []);
        $response->assertStatus(302);
        
        DB::table('favoritos')->where('anime_id', '=','1')->delete();
        DB::table('users')->where('email', '=',$email)->delete();

    }

    public function testRegister(){

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $email = "teste77@teste";
        $password = '12345678';

        //falta a confirmação do password
        $response = $this->post('register', [
            'name' => 'nome teste',
            'email' => $email."a",
            'password' => $password,
            'type' => 'A',
        ]);
        $response->assertStatus(302);

        //credenciais corretas
        $response = $this->post('register', [
            'name' => 'nome teste',
            'email' => $email."a",
            'password' => $password,
            'password_confirmation' => $password,
            'type' => 'A',
        ]);
        $response->assertStatus(302);
    }
}
