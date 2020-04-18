<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\User;
use File;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function tearDown(): void
    {
        $this->user->delete();
    }

    public function testCreateNoImage()
    {
        fwrite(STDERR, print_r(\App::environment(), true));
        $this->assertNull($this->user->image);
        $this->assertEquals($this->defaultImage(), $this->user->image_path);
    }

    public function testUpdateUserWithNewImageWhenImageIsNull()
    {
        $this->user->image = UploadedFile::fake()->image('avatar.png');
        $this->user->save();

        $this->assertEquals($this->imageName(), $this->user->image);
        $this->assertEquals($this->imagePath(), $this->user->image_path);
        $this->assertFileExists($this->fullImagePath());
    }

    public function testUpdateNoImage()
    {
        $this->user->save();

        $this->assertNull($this->user->image);
        $this->assertEquals($this->defaultImage(), $this->user->image_path);
    }

    public function testUpdateUserNoImageWhenImageIsPresent()
    {
        $this->user->image = UploadedFile::fake()->image('avatar.png');
        $this->user->save();

        $image_name = $this->imageName();
        $image_path = $this->imagePath();
        $image_full_path = $this->fullImagePath();

        $this->user->name = 'new-name';
        $this->user->save();

        $this->assertEquals('new-name', $this->user->name);
        $this->assertEquals($image_name, $this->user->image);
        $this->assertEquals($image_path, $this->user->image_path);
        $this->assertFileExists($image_full_path);
    }

    public function testUpdateUserWithNewImageWhenImageIsPresent()
    {
        $this->user->image = UploadedFile::fake()->image('avatar.png');
        $this->user->save();
        $previous_full_image_path = $this->fullImagePath();

        $this->user->name = 'new-name';
        $this->user->image = UploadedFile::fake()->image('avatar.png');
        $this->user->save();
        $this->user->refresh();

        $this->assertEquals($this->imageName(), $this->user->image);
        $this->assertEquals($this->imagePath(), $this->user->image_path);
        $this->assertFileExists($this->fullImagePath());
        $this->assertFileNotExists($previous_full_image_path);
    }

    public function testWhenDeleteUserShouldDeleteTheImage()
    {
        $this->user->image = UploadedFile::fake()->image('avatar.png');
        $this->user->save();

        $previous_full_image_path = $this->fullImagePath();
        $this->user->delete();
        $this->assertFileNotExists($previous_full_image_path);
    }

    private function imageName()
    {
        return Str::slug($this->user->id . '-' . $this->user->name, '-') . '.png';
    }

    private function imagePath()
    {
        return '/uploads/users/' . $this->user->id . '/' . $this->imageName();
    }

    private function fullImagePath()
    {
        return public_path($this->imagePath());
    }

    private function defaultImage()
    {
        return '/assets/images/default/users/default-user.png';
    }
}
