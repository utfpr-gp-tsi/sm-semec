<?php

namespace Tests\Unit\Traits;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedAndUpdatedAtFormatted;

class CreatedAndUpdatedAtFormattedTest extends TestCase
{
     /** @var \Illuminate\Database\Eloquent\Model */
    protected $object;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Class extends Model {
            use CreatedAndUpdatedAtFormatted;
        };
    }

    public function testFormat(): void
    {
        $this->object->created_at = '2020-06-18 12:19:36';
        $this->object->updated_at = '2020-06-21 12:59:44';

        $this->assertEquals($this->object->created_at, '18/06/2020 12:19');
        $this->assertEquals($this->object->updated_at, '21/06/2020 12:59');
    }
}
