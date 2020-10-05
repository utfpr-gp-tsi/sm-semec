<?php

namespace Tests\Unit\Edicts;

use App\Models\Edict;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EdictSearchTest extends TestCase
{
    use DatabaseTransactions;

    /** @var array */
    protected $edicts;

    public function setUp(): void
    {
        parent::setUp();
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2019/1 - Permuta']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2019/2 - Remoção']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2019/3 - Informativo']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2019/4 - Permuta']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2019/5 - Remoção']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2020/1 - Permuta']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2020/2 - Remoção']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2020/3- Permuta']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2020/4 - Permuta']);
        $this->edicts[] = Edict::factory()->create(['title' => 'Edital 2020/5 - Permuta']);
    }

    public function testSearchBySpecifiedName(): void
    {
        $searchResult = Edict::search('Edital 2019/1 - Permuta');
        $expectedEdicts = collect([$this->edicts[0]]);

        $this->assertEquals(1, $searchResult->count());
        $this->assertEmpty($searchResult->diff($expectedEdicts));
    }

    public function testSearchContainsSyllable(): void
    {
        $searchResult = Edict::search('ção');
        $expectedEdicts = collect($this->edicts);

        $this->assertEquals(3, $searchResult->count());
        $this->assertEmpty($searchResult->diff(collect($expectedEdicts)));
    }

    public function testSearchForYear(): void
    {
        $searchResult = Edict::search('2019');
        $expectedEdicts = collect($this->edicts);

        $this->assertEquals(5, $searchResult->count());
        $this->assertEmpty($searchResult->diff(collect($expectedEdicts)));
    }

    public function testSearchEmpty(): void
    {
        $searchResult = Edict::search('');
        $expectedEdicts = collect($this->edicts);

        $this->assertEquals(10, $searchResult->count());
        $this->assertEmpty($searchResult->diff(collect($expectedEdicts)));
    }
}
