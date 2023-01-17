<?php

namespace App\Http\Controllers;

use App\Models\SshKey;
use Illuminate\Http\Request;
use App\Http\Requests\SshKeyRequest;

class SshKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('SshKeys/SshKeys', [
            'sshKeys' => auth()->user()->sshKeys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(SshKeyRequest $request)
    {
        $user = $request->user();

        $sshKey = resolve(SshKey::class);

        $sshKey->user_id = $user->id;
        $sshKey->name = $request->input('name');
        $sshKey->key = $request->input('key');

        $sshKey->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(SshKeyRequest $request)
    {
        $sshKey = SshKey::find($request->id);

        $sshKey->name = $request->name;
        $sshKey->key = $request->key;

        $sshKey->save();
    }

    public function deleteKey(Request $request)
    {
        $sshKey = SshKey::find($request->id);

        $sshKey->delete();
    }
}
