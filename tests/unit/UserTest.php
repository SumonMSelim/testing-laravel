<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_fetches_users_of_a_specific_blood_group()
    {
        $blood_groups = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
        $blood = $blood_groups[random_int(0, count($blood_groups) - 1)];
        factory(User::class, 15)->create(['blood' => $blood]);

        $users = User::getByBlood($blood);

        $this->assertEquals($blood, $users->first()->blood);
        $this->assertCount(5, $users);
    }
}
