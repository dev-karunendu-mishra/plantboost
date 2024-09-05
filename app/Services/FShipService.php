<?php

namespace App\Services;

use App\Models\Shipment;
use Illuminate\Support\Facades\Http;

class FShipService
{
    public static function createShipment($order, $product)
    {
        $fshipApiKey = '78f1c910e7b589d602495079f2ab3c569520c13d86031964a0458ff8b01897e7'; //env('FSHIP_API_KEY');
        $shipmentData = [
            'order_number' => $order->order_id,
            // "shipping_charges" => 40,
            // "discount" => 100,
            // "cod_charges" => 30,
            'payment_type' => 'cod',
            'order_amount' => $product->price,
            // "package_weight" => 300,
            // "package_length" => 10,
            // "package_breadth" => 10,
            // "package_height" => 10,
            'consignee' => [
                'name' => $order->name,
                'address' => $order->address_line_one,
                'address_2' => $order->address_line_two,
                'city' => $order->city,
                'state' => $order->state,
                'pincode' => $order->pin,
                'phone' => $order->mobile,
            ],
            'pickup' => [
                'warehouse_name' => 'warehouse 1',
                'name' => 'Vikalp Sharma',
                'address' => '140, MG Road',
                'address_2' => 'Near metro station',
                'city' => 'Gurgaon',
                'state' => 'Haryana',
                'pincode' => '122001',
                'phone' => '9999999999',
            ],
            'order_items' => [
                [
                    'name' => $product->name,
                    'qty' => '1',
                    'price' => $product->price,
                    //"sku" => "sku001"
                ],
            ],
        ];
        $resp = Http::withHeaders([
            'signature' => $fshipApiKey, // Replace with your actual signature
            'Content-Type' => 'application/json',
        ])->get('https://capi-qc.fship.in/api/getallcountry');
        \Log::info('Shipment Response :: '.$resp);

        return $resp->json();
        // $responseData = Http::withToken($this->fshipApiKey)->post('https://api.nimbuspost.com/v1/shipments', $shipmentData);
        // // Check if the response is successful
        // \Log::info('Order :: '.$order.'Shipment Response :: '.$responseData);
        // if ($responseData['status']) {
        //     $shipmentData = $responseData['data'];

        //     // Save the response data into the database
        //     Shipment::updateOrCreate(
        //         ['order_id' => $shipmentData['order_id']], // Use order_id to check if the record exists
        //         [
        //             'shipment_id' => $shipmentData['shipment_id'],
        //             'awb_number' => $shipmentData['awb_number'],
        //             'courier_id' => $shipmentData['courier_id'],
        //             'courier_name' => $shipmentData['courier_name'],
        //             'status' => $shipmentData['status'],
        //             'additional_info' => $shipmentData['additional_info'],
        //             'payment_type' => $shipmentData['payment_type'],
        //             'label' => $shipmentData['label'],
        //         ]
        //     );

        //     return ['status' => true, 'message' => 'Shipment data stored successfully.'];
        // } else {
        //     return ['status' => false, 'message' => 'Failed to store shipment data.'.$responseData['message']];
        // }
    }
}
