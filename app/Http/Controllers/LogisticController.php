<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Logistic;
use Illuminate\Http\Request;
use App\Models\DeliveryCharge;

class LogisticController extends Controller
{
    public function logistic_list()
    {
        $logistics = Logistic::with("city", "township")->get();

        return view('logistic.logistic-list', compact('logistics'));
    }

    public function create()
    {
        $locations = Location::child()->with('region')->whereDoesntHave('logistic')->get();

        return view('logistic.logistic-create', compact('locations'));
    }

    public function store(Request $request)
    {

        $location =  explode(",", $request->location);

        $data = $request->all();
        $data['township_id'] = $location[0];
        $data['city_id'] = $location[1];

        $logistic = Logistic::create($data);

        foreach ($request->delivery_charges as $key => $value) {
            DeliveryCharge::create([
                'logistic_id' => $logistic->id,
                'type' => $key,
                'amount' => (int)$value
            ]);
        }

        return redirect()->route('logistic_list')->with('success', 'Successfully created!');
    }

    public function edit(Logistic $logistic)
    {
        if ($logistic->deliveryCharges->count() < count(config('custom_value.delivery_types'))) {
            $delivery_types = config('custom_value.delivery_types');

            foreach ($delivery_types as $delivery_type) {
                if (!$logistic->deliveryCharges->firstWhere('type', $delivery_type)) {
                    DeliveryCharge::create([
                        'logistic_id' => $logistic->id,
                        'amount' => 0,
                        'type' => $delivery_type,
                    ]);
                }
            }
        }
        $logistic->load('deliveryCharges');

        $locations = Location::child()->with('region')->get();

        return view('logistic.logistic-edit', compact('logistic', 'locations'));
    }

    public function update(Request $request, Logistic $logistic)
    {
        $logistic->update([
            'min_order_total' => $request->min_order_total,
            'area_description' => $request->area_description,
            'type' => $request->type,
        ]);

        foreach ($request->delivery_charges as $key => $value) {
            DeliveryCharge::findOrFail($key)->update([
                'amount' => $value
            ]);
        }

        return redirect()->route('logistic_list')->with('success', 'Successfully updated!');
    }

    public function destroy(Logistic $logistic)
    {
        DeliveryCharge::where('logistic_id',$logistic->id)->delete();
        $logistic->delete();
    }
}
