<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBrokerRequest;
use App\Http\Requests\UpdateBrokerRequest;
use App\Http\Resources\Admin\BrokerResource;
use App\Models\Broker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrokerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('broker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrokerResource(Broker::with(['team'])->get());
    }

    public function store(StoreBrokerRequest $request)
    {
        $broker = Broker::create($request->all());

        if ($request->input('img_broker', false)) {
            $broker->addMedia(storage_path('tmp/uploads/' . $request->input('img_broker')))->toMediaCollection('img_broker');
        }

        return (new BrokerResource($broker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Broker $broker)
    {
        abort_if(Gate::denies('broker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrokerResource($broker->load(['team']));
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

        return (new BrokerResource($broker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Broker $broker)
    {
        abort_if(Gate::denies('broker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $broker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
