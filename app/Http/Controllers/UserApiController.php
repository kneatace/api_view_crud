<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service=$service;
    }
    public function index()
    {
        return response()->json($this->service->getAll());
    }
    public function store(Request $request)
    {
        $user = $this->service->create($request->all());
        return response()->json(['message'=>'User created successfully', 
        'user'=>$user]);
    }
    public function show($id)
    {
        return response()->json(['message'=>'User fetched successfully', 
        'user'=>$this->service->getbyId($id)]);

    }

    public function update(Request $request, $id)
    {
        $user = $this->service->update($id, $request->all());
        return response()->json(['message'=>'User updated successfully', 'user'=>$user]);
    }

    public function destroy($id)
    {
        $user = $this->service->getbyId($id);
        $user->delete();
        return response()->json(['message'=>'User deleted successfully']);
    }
}
