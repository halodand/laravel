<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\Admin\CurrencyResource;
use App\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource(Currency::with(['team'])->get());
    }

    public function store(StoreCurrencyRequest $request)
    {
        $currency = Currency::create($request->all());

        if ($request->input('img_page', false)) {
            $currency->addMedia(storage_path('tmp/uploads/' . $request->input('img_page')))->toMediaCollection('img_page');
        }

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Currency $currency)
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource($currency->load(['team']));
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

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
