<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Town;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersTable extends Component
{
    use WithPagination;

    public $edit_modal_show = false;

    public $provinceData, $districtData, $townData;

    public $customer_id, $name, $mobile, $nic, $province_id, $district_id, $town_id;

    public function render()
    {
        $this->provinceData = Province::all();
        
        $this->districtData = District::all();

        $this->townData = Town::all();

        $customers = Customer::paginate(5);

        return view('livewire.customers-table',compact('customers'));
    }


    public function edit($id)
    {
        $this->edit_modal_show = true;
       
        $customerData = Customer::find($id);

        $this->customer_id = $customerData->id;

        $this->name = $customerData->name;
        $this->mobile = $customerData->mobile;
        $this->nic = $customerData->nic;
        $this->province_id = $customerData->province_id;
        $this->district_id = $customerData->district_id;
        $this->town_id = $customerData->town_id;

    }

    public function update()
    {
       Customer::find($this->customer_id)->update([

        "name" => $this->name,
        "mobile" => $this->mobile,
        "nic" => $this->nic,
        "province_id" => $this->province_id,
        "district_id" => $this->district_id,
        "town_id" => $this->town_id,

       ]);

       session()->flash('message', 'Customer successfully updated.');

    }

    public function delete($id)
    {
        Customer::find($id)->delete();
    }


    public function modalClose()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->edit_modal_show = false;

        $this->customer_id = null;
        $this->name = null;
        $this->mobile = null;
        $this->nic = null;
        $this->province_id = null;
        $this->district_id = null;
        $this->town_id = null;
    }

}
