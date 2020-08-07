<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCurrencyRequest;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Currency::with(['team'])->select(sprintf('%s.*', (new Currency)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'currency_show';
                $editGate      = 'currency_edit';
                $deleteGate    = 'currency_delete';
                $crudRoutePart = 'currencies';

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
            $table->editColumn('jenis', function ($row) {
                return $row->jenis ? Currency::JENIS_RADIO[$row->jenis] : '';
            });
            $table->editColumn('img_page', function ($row) {
                if ($photo = $row->img_page) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : "";
            });
            $table->editColumn('jual', function ($row) {
                return $row->jual ? $row->jual : "";
            });
            $table->editColumn('beli', function ($row) {
                return $row->beli ? $row->beli : "";
            });
            $table->editColumn('diskon', function ($row) {
                return $row->diskon ? $row->diskon : "";
            });
            $table->editColumn('no_currency', function ($row) {
                return $row->no_currency ? $row->no_currency : "";
            });
            $table->editColumn('nama_currency', function ($row) {
                return $row->nama_currency ? $row->nama_currency : "";
            });
            $table->editColumn('min_trans', function ($row) {
                return $row->min_trans ? $row->min_trans : "";
            });
            $table->editColumn('max_trans', function ($row) {
                return $row->max_trans ? $row->max_trans : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Currency::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'img_page']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.currencies.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.currencies.create');
    }

    public function store(StoreCurrencyRequest $request)
    {
        $currency = Currency::create($request->all());

        if ($request->input('img_page', false)) {
            $currency->addMedia(storage_path('tmp/uploads/' . $request->input('img_page')))->toMediaCollection('img_page');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $currency->id]);
        }

        return redirect()->route('admin.currencies.index');
    }

    public function edit(Currency $currency)
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('team');

        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->all());

        if ($request->input('img_page', false)) {
            if (!$currency->img_page || $request->input('img_page') !== $currency->img_page->file_name) {
                if ($currency->img_page) {
                    $currency->img_page->delete();
                }

                $currency->addMedia(storage_path('tmp/uploads/' . $request->input('img_page')))->toMediaCollection('img_page');
            }
        } elseif ($currency->img_page) {
            $currency->img_page->delete();
        }

        return redirect()->route('admin.currencies.index');
    }

    public function show(Currency $currency)
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('team', 'diskonTransactions');

        return view('admin.currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request)
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('currency_create') && Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Currency();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
