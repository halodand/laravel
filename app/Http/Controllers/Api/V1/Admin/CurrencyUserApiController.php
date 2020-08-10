<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\User;
use App\Models\Currency;
use App\Models\CurrencyUser;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreCurrencyUserRequest;
use App\Http\Requests\UpdateCurrencyUserRequest;
use App\Http\Resources\Admin\CurrencyUserResource;

class CurrencyUserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyUserResource(CurrencyUser::with(['id_partner', 'nama', 'nama_account'])->get());
    }

    public function store(StoreCurrencyUserRequest $request)
    {
        $currencyUser = CurrencyUser::create($request->all());

        return (new CurrencyUserResource($currencyUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CurrencyUser $currencyUser)
    {
        abort_if(Gate::denies('currency_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyUserResource($currencyUser->load(['id_partner', 'nama', 'nama_account']));
    }

    public function update(UpdateCurrencyUserRequest $request, CurrencyUser $currencyUser)
    {
        $currencyUser->update($request->all());

        return (new CurrencyUserResource($currencyUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CurrencyUser $currencyUser)
    {
        abort_if(Gate::denies('currency_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getOptions()
    {
        $partners = User::whereHas('roles', function (Builder $q) {
            $q->where('title', 'LIKE', 'Admin');
        })->get();
        $currencies = Currency::get();

        return \response()->json(\compact('partners', 'currencies'));
    }
}
