<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\ValidationRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserApiController extends Controller
{
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service=$service;
    }
    public function index()
    {
        $users = $this->service->getAll();
        return new UserCollection($users);
    }
    public function store(ValidationRequest $request)
    {
        $user = $this->service->create($request->all());
        return response()->json(['message'=>'User created successfully', 
        'user'=>$user]);
    }
    public function show($id)
    {
        $user = $this->service->getbyId($id);
        return new UserResource($user);

    }

    public function update(UpdateRequest $request, $id)
    {
        $user = $this->service->update($id, $request->validated());
        return response()->json(['message'=>'User updated successfully', 'user'=>$user]);
    }

    public function destroy($id)
    {
        $user = $this->service->getbyId($id);
        $user->delete();
        return response()->json(['message'=>'User deleted successfully']);
    }
}
