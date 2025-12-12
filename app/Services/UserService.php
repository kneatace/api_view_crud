<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll()
    {
        return User::all();

    }

    public function getbyId($id)
    {
        return User::findorFail($id);

    }

    public function create($data)
    {
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            ]);
    }

    public function update($id, $data)
    {
        $user = User::findorFail($id);

        $user->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            ]);
        return $user;
      
    }
}
