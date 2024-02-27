<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password as PasswordRules;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $state = $request->state;
        try {
            $usuarios = User::filterAdvance($search, $state)->orderby("id", "asc")->get();
            // Simulo un error
            // throw new Exception("Error al obtener usuarios");
            return response()->json([
                "usuarios" => UserCollection::make($usuarios),
            ]);
        } catch (Exception $e) {
            return ApiResponse::error('Error al obtener la lista de usuarios: ' . $e->getMessage(), 500);
        }
    }

    public function config()
    {
        $roles = Role::all();
        return ApiResponse::success('Listado de Roles', 200, $roles);
        // return response()->json([
        //     "roles" => $roles
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        try {
            $request->validated($request->all());
            $usuario = User::create($request->all());
            $role = Role::findOrFail($request->role_id);
            $usuario->assignRole($role);
            return response()->json([
                "usuario" => UserResource::make($usuario),
            ]);
        } catch (ValidationException $e) {
            return ApiResponse::error('Error de validación: '.$e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            return response()->json([
                "usuario" => UserResource::make($usuario),
            ]);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Usuario no encontrado', 404);
        } catch (Exception $e) {
            return ApiResponse::error('Error: '.$e->getMessage(), 422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $request->validate([
                'dni' => ['required', Rule::unique('users')->ignore($usuario), 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                'surname' => ['required', 'string'],
                'name' => ['required', 'string'],
                'email' => ['required', 'email', Rule::unique('users')->ignore($usuario)],
                'address' => ['required', 'string'],
                'phone' => ['required', 'string'],
            'role_id' => ['required', 'exists:roles,id'],
            ]);

            $usuario->update($request->all());

            if($request->role_id != $usuario->roles()->first()->id){
                $role_old = Role::findOrFail($usuario->roles()->first()->id);
                $usuario->removeRole($role_old);
                $role_new = Role::findOrFail($request->role_id);
                $usuario->assignRole($role_new);
            }
            
            return response()->json([
                "usuario" => UserResource::make($usuario),
            ]);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Usuario no encontrado', 404);
        } catch (Exception $e) {
            return ApiResponse::error('Error: '.$e->getMessage(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return ApiResponse::success('Usuario eliminado exitosamente', 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Usuario no encontrado', 404);
        } catch (Exception $e) {
            return ApiResponse::error('Error: '.$e->getMessage(), 422);
        }
    }
}
