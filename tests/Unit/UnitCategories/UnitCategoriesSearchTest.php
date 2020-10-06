<?php

namespace Tests\Unit\UnitCategories;

use App\UnitCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UnitCategoriesSearchTest extends TestCase
{
    use DatabaseTransactions;

    /** @var array */
    protected $categories;

    public function setUp(): void
    {
        parent::setUp();
        $this->categories[] = factory(UnitCategory::class)->create(['name' => 'CMEI']);
        $this->categories[] = factory(UnitCategory::class)->create(['name' => 'Escolas Municipais']);
        $this->categories[] = factory(UnitCategory::class)->create(['name' => 'Departamentos SEMEC']);
    }

    public function testSearchBySpecifiedName(): void
    {
        $searchResult = UnitCategory::search('CMEI');
        $expectedCategories = collect([$this->categories[0]]);

        $this->assertEquals(1, $searchResult->count());
        $this->assertEmpty($searchResult->diff($expectedCategories));
    }

    public function testSearchContainsSyllable(): void
    {
        $searchResult = UnitCategory::search('SE');
        $expectedCategories = collect($this->categories);

        $this->assertEquals(1, $searchResult->count());
        $this->assertEmpty($searchResult->diff(collect($expectedCategories)));
    }

    public function testSearchEmpty(): void
    {
        $searchResult = UnitCategory::search('');
        $expectedCategories = collect($this->categories);

        $this->assertEquals(3, $searchResult->count());
        $this->assertEmpty($searchResult->diff(collect($expectedCategories)));
    }
}
