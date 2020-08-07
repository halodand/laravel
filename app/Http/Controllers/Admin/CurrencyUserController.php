<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCurrencyUserRequest;
use App\Http\Requests\StoreCurrencyUserRequest;
use App\Http\Requests\UpdateCurrencyUserRequest;
use App\Models\Currency;
use App\Models\CurrencyUser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CurrencyUserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('currency_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CurrencyUser::with(['id_partner', 'nama', 'nama_account'])->select(sprintf('%s.*', (new CurrencyUser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'currency_user_show';
                $editGate      = 'currency_user_edit';
                $deleteGate    = 'currency_user_delete';
                $crudRoutePart = 'currency-users';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('id_partner_name', function ($row) {
                return $row->id_partner ? $row->id_partner->name : '';
            });

            $table->addColumn('nama_nama', function ($row) {
                return $row->nama ? $row->nama->nama : '';
            });

            $table->editColumn('no_account', function ($row) {
                return $row->no_account ? $row->no_account : "";
            });
            $table->addColumn('nama_account_name', function ($row) {
                return $row->nama_account ? $row->nama_account->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_partner', 'nama', 'nama_account']);

            return $table->make(true);
        }

        return view('admin.currencyUsers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('currency_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_partners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Currency::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_accounts = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.currencyUsers.create', compact('id_partners', 'namas', 'nama_accounts'));
    }

    public function store(StoreCurrencyUserRequest $request)
    {
        $currencyUser = CurrencyUser::create($request->all());

        return redirect()->route('admin.currency-users.index');
    }

    public function edit(CurrencyUser $currencyUser)
    {
        abort_if(Gate::denies('currency_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_partners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Currency::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_accounts = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencyUser->load('id_partner', 'nama', 'nama_account');

        return view('admin.currencyUsers.edit', compact('id_partners', 'namas', 'nama_accounts', 'currencyUser'));
    }

    public function update(UpdateCurrencyUserRequest $request, CurrencyUser $currencyUser)
    {
        $currencyUser->update($request->all());

        return redirect()->route('admin.currency-users.index');
    }

    public function show(CurrencyUser $currencyUser)
    {
        abort_if(Gate::denies('currency_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyUser->load('id_partner', 'nama', 'nama_account');

        return view('admin.currencyUsers.show', compact('currencyUser'));
    }

    public function destroy(CurrencyUser $currencyUser)
    {
        abort_if(Gate::denies('currency_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyUserRequest $request)
    {
        CurrencyUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
