<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBrokerRequest;
use App\Http\Requests\StoreBrokerRequest;
use App\Http\Requests\UpdateBrokerRequest;
use App\Models\Broker;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BrokerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('broker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Broker::with(['team'])->select(sprintf('%s.*', (new Broker)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'broker_show';
                $editGate      = 'broker_edit';
                $deleteGate    = 'broker_delete';
                $crudRoutePart = 'brokers';

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
            $table->editColumn('judul_kat', function ($row) {
                return $row->judul_kat ? $row->judul_kat : "";
            });
            $table->editColumn('judul_perusahaan', function ($row) {
                return $row->judul_perusahaan ? $row->judul_perusahaan : "";
            });
            $table->editColumn('kantor_pusat', function ($row) {
                return $row->kantor_pusat ? $row->kantor_pusat : "";
            });
            $table->editColumn('tahun_berdiri', function ($row) {
                return $row->tahun_berdiri ? $row->tahun_berdiri : "";
            });
            $table->editColumn('badan_regulasi', function ($row) {
                return $row->badan_regulasi ? $row->badan_regulasi : "";
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : "";
            });
            $table->editColumn('rebate_auto_manual', function ($row) {
                return $row->rebate_auto_manual ? Broker::REBATE_AUTO_MANUAL_SELECT[$row->rebate_auto_manual] : '';
            });
            $table->editColumn('link_broker', function ($row) {
                return $row->link_broker ? $row->link_broker : "";
            });
            $table->editColumn('kurs_depo', function ($row) {
                return $row->kurs_depo ? $row->kurs_depo : "";
            });
            $table->editColumn('kurs_wd', function ($row) {
                return $row->kurs_wd ? $row->kurs_wd : "";
            });
            $table->editColumn('stok', function ($row) {
                return $row->stok ? $row->stok : "";
            });
            $table->editColumn('no_broker', function ($row) {
                return $row->no_broker ? $row->no_broker : "";
            });
            $table->editColumn('nama_broker', function ($row) {
                return $row->nama_broker ? $row->nama_broker : "";
            });
            $table->editColumn('status_transaksi', function ($row) {
                return $row->status_transaksi ? Broker::STATUS_TRANSAKSI_RADIO[$row->status_transaksi] : '';
            });
            $table->editColumn('min_transaksi', function ($row) {
                return $row->min_transaksi ? $row->min_transaksi : "";
            });
            $table->editColumn('max_transaksi', function ($row) {
                return $row->max_transaksi ? $row->max_transaksi : "";
            });
            $table->editColumn('img_broker', function ($row) {
                if ($photo = $row->img_broker) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('komisi_ib', function ($row) {
                return $row->komisi_ib ? $row->komisi_ib : "";
            });
            $table->editColumn('komisi_pemilik', function ($row) {
                return $row->komisi_pemilik ? $row->komisi_pemilik : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'img_broker']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.brokers.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('broker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brokers.create');
    }

    public function store(StoreBrokerRequest $request)
    {
        $broker = Broker::create($request->all());

        if ($request->input('img_broker', false)) {
            $broker->addMedia(storage_path('tmp/uploads/' . $request->input('img_broker')))->toMediaCollection('img_broker');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $broker->id]);
        }

        return redirect()->route('admin.brokers.index');
    }

    public function edit(Broker $broker)
    {
        abort_if(Gate::denies('broker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $broker->load('team');

        return view('admin.brokers.edit', compact('broker'));
    }

    public function update(UpdateBrokerRequest $request, Broker $broker)
    {
        $broker->update($request->all());

        if ($request->input('img_broker', false)) {
            if (!$broker->img_broker || $request->input('img_broker') !== $broker->img_broker->file_name) {
                if ($broker->img_broker) {
                    $broker->img_broker->delete();
                }

                $broker->addMedia(storage_path('tmp/uploads/' . $request->input('img_broker')))->toMediaCollection('img_broker');
            }
        } elseif ($broker->img_broker) {
            $broker->img_broker->delete();
        }

        return redirect()->route('admin.brokers.index');
    }

    public function show(Broker $broker)
    {
        abort_if(Gate::denies('broker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $broker->load('team');

        return view('admin.brokers.show', compact('broker'));
    }

    public function destroy(Broker $broker)
    {
        abort_if(Gate::denies('broker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $broker->delete();

        return back();
    }

    public function massDestroy(MassDestroyBrokerRequest $request)
    {
        Broker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('broker_create') && Gate::denies('broker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Broker();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
