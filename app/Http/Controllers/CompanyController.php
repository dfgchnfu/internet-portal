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
        $company->update($request->all());

        return response()->json([
            "message" => "Данные компании обновлены",
            "company" => $company
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
            "message" => "Компания удалена"
        ]);
    }
}
