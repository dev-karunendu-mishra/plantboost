<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryOptionController extends Controller
{

    private $indexView = 'admin.delivery-option.all';
    private $storeRoute = 'admin.delivery-options';
    private $editView = 'admin.delivery-option.edit';
    private $deleteRoute = 'admin.delivery-options';
    private $deleteMessage = 'Delivery Option deleted successfully.';
    private $createMessage = 'Delivery Option created successfully.';
    private $updateMessage = 'Delivery Option updated successfully.';

    public $columns = ["id"=>"ID", "pin"=>"Pincode", "city"=>"City", "state"=>"State", "cod"=>"COD", "prepaid"=>"prepaid","pickup"=>"Pickup", "zone"=>"Zone"];

    public $fields = [
        "pin"=>[
            "id"=>"pin",
            "name"=>"pin",
            "type"=>"text",
            "label"=>"Pincode",
            "placeholder"=>"Pincode"
        ],
        "city"=>[
            "id"=>"city",
            "name"=>"city",
            "type"=>"text",
            "label"=>"City",
            "placeholder"=>"City"
        ],
        "state"=>[
            "id"=>"state",
            "name"=>"state",
            "type"=>"text",
            "label"=>"State",
            "placeholder"=>"State"
        ],
        "cod"=>[
            "id"=>"cod",
            "name"=>"doc",
            "type"=>"text",
            "label"=>"C.O.D",
            "placeholder"=>"C.O.D"
        ],
        "prepaid"=>[
            "id"=>"prepaid",
            "name"=>"prepaid",
            "type"=>"text",
            "label"=>"Prepaid",
            "placeholder"=>"Prepaid"
        ],
        "pickup"=>[
            "id"=>"pickup",
            "name"=>"pickup",
            "type"=>"text",
            "label"=>"Pickup",
            "placeholder"=>"Pickup"
        ],
        "zone"=>[
            "id"=>"zone",
            "name"=>"zone",
            "type"=>"text",
            "label"=>"Zone",
            "placeholder"=>"Zone"
        ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = DeliveryOption::paginate(10);
        // Get the total number of pages
        $totalPages = $records->lastPage();
        
        // Generate an array of page numbers
        $pages = range(1, $totalPages);
        return view($this->indexView,['columns'=>$this->columns,'fields'=>$this->fields,'edit'=>false,'records'=>$records,'model'=>null, "pages"=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryOption $deliveryOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOption $deliveryOption)
    {
        return view($this->editView,['columns'=>$this->columns,'fields'=>$this->fields, 'model'=>$deliveryOption, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryOption $deliveryOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOption $deliveryOption)
    {
        //
    }
}
