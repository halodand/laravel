<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Currency;
use App\Models\Team;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Transaction::with(['id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses', 'team'])->select(sprintf('%s.*', (new Transaction)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'transaction_show';
                $editGate      = 'transaction_edit';
                $deleteGate    = 'transaction_delete';
                $crudRoutePart = 'transactions';

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
            $table->editColumn('no_order', function ($row) {
                return $row->no_order ? $row->no_order : "";
            });
            $table->addColumn('id_partner_name', function ($row) {
                return $row->id_partner ? $row->id_partner->name : '';
            });

            $table->addColumn('jenis_currency_jenis', function ($row) {
                return $row->jenis_currency ? $row->jenis_currency->jenis : '';
            });

            $table->editColumn('jenis_currency.nama', function ($row) {
                return $row->jenis_currency ? (is_string($row->jenis_currency) ? $row->jenis_currency : $row->jenis_currency->nama) : '';
            });
            $table->addColumn('bank_email', function ($row) {
                return $row->bank ? $row->bank->email : '';
            });

            $table->addColumn('currency_member_name', function ($row) {
                return $row->currency_member ? $row->currency_member->name : '';
            });

            $table->addColumn('nilai_depo_beli', function ($row) {
                return $row->nilai_depo ? $row->nilai_depo->beli : '';
            });

            $table->editColumn('nilai_depo.jual', function ($row) {
                return $row->nilai_depo ? (is_string($row->nilai_depo) ? $row->nilai_depo : $row->nilai_depo->jual) : '';
            });
            $table->addColumn('kurs_wd_beli', function ($row) {
                return $row->kurs_wd ? $row->kurs_wd->beli : '';
            });

            $table->editColumn('kurs_wd.jual', function ($row) {
                return $row->kurs_wd ? (is_string($row->kurs_wd) ? $row->kurs_wd : $row->kurs_wd->jual) : '';
            });
            $table->addColumn('diskon_diskon', function ($row) {
                return $row->diskon ? $row->diskon->diskon : '';
            });

            $table->addColumn('jumlahusd_min_trans', function ($row) {
                return $row->jumlahusd ? $row->jumlahusd->min_trans : '';
            });

            $table->editColumn('jumlahusd.max_trans', function ($row) {
                return $row->jumlahusd ? (is_string($row->jumlahusd) ? $row->jumlahusd : $row->jumlahusd->max_trans) : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : "";
            });
            $table->editColumn('ket', function ($row) {
                return $row->ket ? $row->ket : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Transaction::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('diproses_name', function ($row) {
                return $row->diproses ? $row->diproses->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses']);

            return $table->make(true);
        }

        $users      = User::get();
        $currencies = Currency::get();
        $users      = User::get();
        $users      = User::get();
        $currencies = Currency::get();
        $currencies = Currency::get();
        $currencies = Currency::get();
        $currencies = Currency::get();
        $users      = User::get();
        $teams      = Team::get();

        return view('admin.transactions.index', compact('users', 'currencies', 'users', 'users', 'currencies', 'currencies', 'currencies', 'currencies', 'users', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenis_currencies = Currency::all()->pluck('jenis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currency_members = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nilai_depos = Currency::all()->pluck('beli', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kurs_wds = Currency::all()->pluck('beli', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diskons = Currency::all()->pluck('diskon', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jumlahusds = Currency::all()->pluck('min_trans', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diproses = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactions.create', compact('jenis_currencies', 'banks', 'currency_members', 'nilai_depos', 'kurs_wds', 'diskons', 'jumlahusds', 'diproses'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilai_depos = Currency::all()->pluck('beli', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kurs_wds = Currency::all()->pluck('beli', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diskons = Currency::all()->pluck('diskon', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jumlahusds = Currency::all()->pluck('min_trans', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diproses = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses', 'team');

        return view('admin.transactions.edit', compact('nilai_depos', 'kurs_wds', 'diskons', 'jumlahusds', 'diproses', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('id_partner', 'jenis_currency', 'bank', 'currency_member', 'nilai_depo', 'kurs_wd', 'diskon', 'jumlahusd', 'diproses', 'team');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
