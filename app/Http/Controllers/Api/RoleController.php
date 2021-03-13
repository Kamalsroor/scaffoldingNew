<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\RoleResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the roles.
     * @OA\Get(
     *      path="/roles",
     *      operationId="getRolesList",
     *      tags={"Roles"},
     *      summary="Get list of roles",
     *      description="Returns list of roles",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/RoleResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $roles = Role::filter()->simplePaginate();
        return RoleResource::collection($roles);
    }

    /**
     * Display the specified role.
     *
     * @OA\Get(
     *      path="/roles/{id}",
     *      operationId="getRoleById",
     *      tags={"Roles"},
     *      summary="Get role information",
     *      description="Returns role data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Role")
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     * )
     * @param \App\Models\Role $role
     * @return \App\Http\Resources\RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/roles",
     *      operationId="getSelectRolesList",
     *      tags={"Roles"},
     *      summary="Get list of Select roles",
     *      description="Returns list of Select roles",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/RoleResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $roles = Role::filter()->simplePaginate();

        return SelectResource::collection($roles);
    }
}
