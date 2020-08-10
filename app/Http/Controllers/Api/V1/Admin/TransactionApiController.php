<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\Bank;
use App\Models\User;
use App\Models\Bankuser;
use App\Models\Currency;
use App\Mail\OrderShipped;
use App\Models\Transaction;
use App\Models\CurrencyUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreTransactionRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\Admin\TransactionResource;

class TransactionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransactionResource(Transaction::with(['id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses', 'team'])->get());
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        $admins = User::select('email')->whereHas('roles', function (Builder $q) {
            $q->where('title', 'LIKE', 'Admin');
        })->get()->pluck('email');

        Mail::to($transaction->diproses->email)
            ->cc($admins)
            ->send(new OrderShipped([]));

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransactionResource($transaction->load(['id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses', 'team']));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getOptions()
    {
        $partners = User::whereHas('roles', function (Builder $q) {
            $q->where('title', 'LIKE', 'Admin');
        })->get();
        $currencies = Currency::get();
        $currencyUsers = CurrencyUser::with(['nama'])->get();
        $banks = Bank::get();
        $bankUsers = Bankuser::with(['nama'])->get();

        return \response()->json(\compact('partners', 'currencies', 'currencyUsers', 'banks', 'bankUsers'));
    }
}
