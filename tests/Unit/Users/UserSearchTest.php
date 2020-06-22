<?php

namespace Tests\Unit\Users;

use Tests\TestCase;
use App\User;

class UserSearchTest extends TestCase
{
    protected $users;

    public function setUp(): void
    {
        parent::setUp();
        $this->users[] = factory(User::class)->create(['name' => 'Diego Marczal']);
        $this->users[] = factory(User::class)->create(['name' => 'Andres Jesse']);
        $this->users[] = factory(User::class)->create(['name' => 'Eduarda Lara']);
        $this->users[] = factory(User::class)->create(['name' => 'Amanda Carolyne de Lima']);
        $this->users[] = factory(User::class)->create(['name' => 'Thais Michele Hryssai da Luz']);
    }

    public function testSearchByNamePassingOneLetterThatShouldReturnAllUsers(): void
    {
        $searchResult = User::search('a');
        $expectedUsers = collect($this->users);

        $this->assertEquals(5, $searchResult->count());
        $this->assertEmpty($searchResult->diff($expectedUsers));
    }

    public function testSearchByNameThatShouldReturnOnlyOneUser(): void
    {
        $searchResult = User::search('Diego Marczal');
        $expectedUsers = collect([ $this->users[0] ]);

        $this->assertEquals(1, $searchResult->count());
        $this->assertEmpty($searchResult->diff($expectedUsers));
    }
}
