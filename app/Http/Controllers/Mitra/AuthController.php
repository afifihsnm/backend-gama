<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterManagerRequest;
use App\Http\Resources\ManagerResource;
use App\Models\manager;
use App\Services\MitraAuth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(Request $request): JsonResponse
    {
        $credentials = $request->all();

        $rules = [
            'name' => ['required'],
            'username' => ['required', 'unique:managers,username'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'password' => ['required', 'min:8']
        ];

        $validator  = Validator::make($credentials, $rules);

        try {
            DB::beginTransaction();

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validData = $validator->validate();

            $manager = $this->service->addDataManager($validData);
            DB::commit();

            return response()->json([
                'data' => [
                    'type' => manager::class,
                    'attributes' => new ManagerResource($manager)
                ]
            ], 201);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'errors' => [
                    'status' => 422,
                    'message' =>
                    $e->errors()
                ]
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'errors' => [
                    'status' => 500,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
