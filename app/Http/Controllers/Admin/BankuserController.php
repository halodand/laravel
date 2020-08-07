<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankuserRequest;
use App\Http\Requests\StoreBankuserRequest;
use App\Http\Requests\UpdateBankuserRequest;
use App\Models\Bank;
use App\Models\Bankuser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BankuserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('bankuser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Bankuser::with(['id_partner', 'nama'])->select(sprintf('%s.*', (new Bankuser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bankuser_show';
                $editGate      = 'bankuser_edit';
                $deleteGate    = 'bankuser_delete';
                $crudRoutePart = 'bankusers';

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

            $table->editColumn('nomor_rekening', function ($row) {
                return $row->nomor_rekening ? $row->nomor_rekening : "";
            });
            $table->editColumn('atas_nama', function ($row) {
                return $row->atas_nama ? $row->atas_nama : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'id_partner', 'nama']);

            return $table->make(true);
        }

        return view('admin.bankusers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bankuser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_partners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Bank::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bankusers.create', compact('id_partners', 'namas'));
    }

    public function store(StoreBankuserRequest $request)
    {
        $bankuser = Bankuser::create($request->all());

        return redirect()->route('admin.bankusers.index');
    }

    public function edit(Bankuser $bankuser)
    {
        abort_if(Gate::denies('bankuser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_partners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Bank::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bankuser->load('id_partner', 'nama');

        return view('admin.bankusers.edit', compact('id_partners', 'namas', 'bankuser'));
    }

    public function update(UpdateBankuserRequest $request, Bankuser $bankuser)
    {
        $bankuser->update($request->all());

        return redirect()->route('admin.bankusers.index');
    }

    public function show(Bankuser $bankuser)
    {
        abort_if(Gate::denies('bankuser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankuser->load('id_partner', 'nama');

        return view('admin.bankusers.show', compact('bankuser'));
    }

    public function destroy(Bankuser $bankuser)
    {
        abort_if(Gate::denies('bankuser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankuser->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankuserRequest $request)
    {
        Bankuser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
