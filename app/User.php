<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Services\DateFormatter;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use App\Events\EventDelete;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return DateFormatter::short($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return DateFormatter::short($value);
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return false;
        }
        $name = Str::slug($this->id . $this->name, '-');
        $extension = $this->image->extension();
        $nameFile = "{$name}.{$extension}";
        $this->image = $nameFile;
        $destination = base_path() . '/public/uploads/users/' . $this->id;
        $image->move($destination, $nameFile);
        return true;
    }

    public function delete()
    {
        event(new EventDelete($this));
    }
}
