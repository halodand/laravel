<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\Bank;
use App\Models\User;
use App\Models\Bankuser;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreBankuserRequest;
use App\Http\Requests\UpdateBankuserRequest;
use App\Http\Resources\Admin\BankuserResource;
use Symfony\Component\HttpFoundation\Response;

class BankuserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bankuser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankuserResource(Bankuser::with(['id_partner', 'nama'])->get());
    }

    public function store(StoreBankuserRequest $request)
    {
        $bankuser = Bankuser::create($request->all());

        return (new BankuserResource($bankuser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bankuser $bankuser)
    {
        abort_if(Gate::denies('bankuser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankuserResource($bankuser->load(['id_partner', 'nama']));
    }

    public function update(UpdateBankuserRequest $request, Bankuser $bankuser)
    {
        $bankuser->update($request->all());

        return (new BankuserResource($bankuser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bankuser $bankuser)
    {
        abort_if(Gate::denies('bankuser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankuser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getOptions()
    {
        $partners = User::whereHas('roles', function (Builder $q) {
            $q->where('title', 'LIKE', 'Admin');
        })->get();
        $banks = Bank::get();

        return \response()->json(\compact('partners', 'banks'));
    }
}
