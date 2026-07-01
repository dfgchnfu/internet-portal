<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Captcha;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::where("is_approved", true)->get();
    }

    public function show(Company $company)
    {
        $user = auth()->user();

        if (
            !$company->is_approved &&
            (!$user || ($user->role !== 'admin' && $company->user_id != $user->id))
        ) {
            return response()->json([
                'message' => 'Компания еще не подтверждена'
            ], 403);
        }

        return $company->load(
            "categories",
            "package",
            "user",
            "contactPeople"
        );
    }

    public function store(Request $request)
    {
        $captcha = Captcha::where(
            'word',
            $request->captcha
        )->first();

        if (!$captcha) {
            return response()->json([
                'message' => 'Неверная CAPTCHA'
            ], 422);
        }

        $company = Company::create([
            "user_id" => auth()->id(),
            "package_id" => 1,
            "name" => $request->name,
            "address" => $request->address,
            "phone" => $request->phone,
            "fax" => $request->fax,
            "email" => $request->email,
            "website" => $request->website,
            "description" => $request->description,
            "logo" => $request->logo,
            "payment_due_date" => null,
            "is_approved" => false
        ]);

        return response()->json([
            "message" => "Компания создана и ожидает подтверждения администратора",
            "company" => $company
        ], 201);
    }

    public function update(Request $request, Company $company)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'message' => 'Необходима авторизация'
            ], 401);
        }

        if ($user->role !== 'admin' && $company->user_id != $user->id) {
            return response()->json([
                'message' => 'Доступ запрещен'
            ], 403);
        }

        $company->update($request->all());

        return response()->json([
            "message" => "Данные компании обновлены",
            "company" => $company
        ]);
    }

    public function destroy(Company $company)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'message' => 'Необходима авторизация'
            ], 401);
        }

        if ($user->role !== 'admin' && $company->user_id != $user->id) {
            return response()->json([
                'message' => 'Доступ запрещен'
            ], 403);
        }

        $company->delete();

        return response()->json([
            "message" => "Компания удалена"
        ]);
    }

    public function approve(Company $company)
    {
        $user = auth()->user();

        if (!$user || $user->role !== 'admin') {
            return response()->json([
                'message' => 'Доступ запрещен'
            ], 403);
        }

        $company->update([
            'is_approved' => true
        ]);

        return response()->json([
            'message' => 'Компания успешно подтверждена',
            'company' => $company
        ]);
    }
}
