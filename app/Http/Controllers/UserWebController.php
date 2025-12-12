<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Services\UserService;

class UserWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->getAll();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidationRequest $request)
    {
        $users = $this->service->create($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('users.show', 
        ['users' => $this->service->getbyId($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = $this->service->getbyId($id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidationRequest $request, string $id)
    {
        $users = $this->service->update($id, $request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = $this->service->getbyId($id);
        $users->delete();
        return redirect()->route('users.index');
    }
}
