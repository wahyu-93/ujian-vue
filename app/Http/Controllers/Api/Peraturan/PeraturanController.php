<?php

namespace App\Http\Controllers\Api\Peraturan;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Peraturan\PeraturanResource;

class PeraturanController extends Controller
{
    public function index()
    {
        return PeraturanResource::collection(Pengaturan::latest()->get());
    }

    public function update(Request $request, $id)
    {
        $peraturan = Pengaturan::find($id);
        $peraturan->update($request->all());
        return response(new PeraturanResource($peraturan), Response::HTTP_OK);
    }


}
