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
        return response()->json($user, 201);
    }
    public function show($id)
    {
        return response()->json($this->service->getbyId($id));
    }
}
