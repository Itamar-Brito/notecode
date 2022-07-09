<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repository\UserRepository;
use App\Services\GetUserAdressFromViaCepService;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;

/**
 * Class GetUserAdressFromViaCepServiceTest.
 *
 * @covers \App\Services\GetUserAdressFromViaCepService
 */
final class GetUserAdressFromViaCepServiceTest extends TestCase
{

    private $userRepository;
    private $createUser;

    protected function setUp(): void
    {
        parent::setUp();

       $this->userRepository = app(UserRepository::class);

       $this->createUser = new User();
       $this->createUser->name = 'Adelano';
       $this->createUser->email = "adelano@gmail1.com";
       $this->createUser->password = Hash::make('123456');
       $this->createUser->cep = "83060525";
       $this->createUser->save();
    }

    protected function tearDown(): void
    {
        $user = User::find( $this->createUser->id);
        $user->delete();
    }

    public function testFisrtUser(): void
    {
       $user = $this->userRepository->getFirstById( $this->createUser->id );

       $this->assertEquals($user->name, $this->createUser->name);
       $this->assertNotEquals($this->createUser->name, 'Itamar');
    }
}
