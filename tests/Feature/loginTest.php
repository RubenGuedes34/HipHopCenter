<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/homepage');

        $response->assertStatus(200);
    }

    public function test_registo()
    {
        $user = new User;
        $name= "Teste3";
        $email="teste3@gmail.com";
        $email_confirmed= now();
        $password1= '12345678';
        $password2= '12345678';

        if($password1 == $password2){
            if(strlen($password1)>7){        
                    $user->name = $name;
                    $user->email = $email;
                    $user->type = 0;
                    $user->email_verified_at = $email_confirmed;
                    $hashing = Hash::make($password1);
                    $user->password = $hashing;
                    $user->save();
                    $count= user::orderby('id','desc')->first();                 
                    $user = user::where(['id'=> $count->id])->first();
                    $this->actingAs($user);
                    $response = $this->get('/homepage');
                    $response->assertStatus(200);
            }
        }       
    }

    public function test_dbUserExists(){
        $this->assertDatabaseHas(User::class, ['email' => 'rubenguedes34@gmail.com']);
    }

    public function test_editUser(){
        $user = User::find(4);
        $user->name = "Ruben";
        $user->save();
        $this->assertDatabaseHas(User::class, ['name' => 'Ruben']);
    }

    public function test_deleteUser(){
        $user= User::orderBy('id', 'desc')->first();
        $user->delete();
        $this->assertDeleted($user);
    }

}
