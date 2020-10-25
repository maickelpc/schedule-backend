<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Repositories\UserRepository;

class UserTest extends TestCase
{
    
     /**
     * Test Create User
     *
     * @return void
     */
    public function testCreateUser()
    {
        parent::setUp();
        $repository = new UserRepository();
        
        // $user = $repository->create([
        //     'name' => 'João da Silva',
        //     'email' => 'qualquer@email.com',
        //     'password' => '123456'
        // ]);        
        
        $user = $repository->getAll();

        $this->assertTrue($user != null && $user->id > 0);

    }

}
