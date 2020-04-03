<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\User;

class UploadTest extends TestCase
{
    /**
     * test upload image profile user.
     *
     * @return void
     */
    public function testUploadImage()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'admin';
        $file = UploadedFile::fake()->image('avatar.png');
        $user->image = $file;
        $user->uploadImage($user->image);
        $this->assertEquals('1admin.png', $user->image);
    }
}
