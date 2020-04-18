<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Str;
use File;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->saveImageFile($user);
    }

    /**
     * Handle the user "updating" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        if ($user->isDirty('image')) {
            $this->deleteImageFile(User::find($user->id));
            $this->saveImageFile($user);
        }
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $this->deleteImageFile($user);
    }

    /**
     * Delete a image from file.
     *
     * @param  \App\User $user
     * @return void
     */
    private function deleteImageFile($user)
    {
        $image_directory = public_path('uploads/users/' . $user->id);
        $image_path = $image_directory  . '/' . $user->image;

        File::delete($image_path);
        if (count(glob($image_directory . '/*')) === 0) {
            File::deleteDirectory($image_directory);
        }
    }

    private function saveImageFile($user)
    {
        if ($user->image != null) {
            $image_name = Str::slug($user->id . '-' . $user->name, '-') . '.' . $user->image->extension();
            $store_path = public_path('uploads/users/' . $user->id);

            $user->image->move($store_path, $image_name);
            $user->image = $image_name;
        }
    }
}
