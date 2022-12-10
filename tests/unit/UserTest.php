<?php


namespace Unit;

use app\models\User;
use \UnitTester;

class UserTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testAddingToDbUser()
    {
        $model = new user();
        $model2 = new user();
        $model->username = 'abc';
        $model->email = 'billythepugtato@gmail.com';
        $model->password = 'Qwerty123456';
        $model->auth_key = 'sss';
        $model->access_token = 'ssss';
        $model->user_type = 'customer';
        $model2 = $model2->findCustomerByEmail('billythepugtato@gmail.com');
        $model2->delete();
        $model->save();
        $this->tester->seeInDatabase('user', ['email' => 'billythepugtato@gmail.com']);
    }

    public function testFindingAndUpdatingUser()
    {
        $user = new user();
        $fakeUser = $user->findCustomerByEmail('fake');
        $this->tester->assertEquals($fakeUser, null);

        $realUser = $user->findCustomerByEmail('billythepugtato@gmail.com');
        $this->tester->assertNotEquals($realUser, null);

        $realUser->email = 'fake';
        $realUser->save();
        $chnagedEmailUser = $realUser->findCustomerByEmail('fake');
        $this->tester->assertNotEquals($chnagedEmailUser, null);

        $chnagedEmailUser->email = 'billythepugtato@gmail.com';
        $chnagedEmailUser->save();
        $revertedUser = $chnagedEmailUser->findCustomerByEmail('billythepugtato@gmail.com');
        $this->tester->assertNotEquals($revertedUser, null);
    }
}
