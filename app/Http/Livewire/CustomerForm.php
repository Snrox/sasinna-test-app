<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Town;
use Livewire\Component;

class CustomerForm extends Component
{
    public $provinceData, $districtData, $townData;

    public $name,$mobile,$nic,$province_id,$district_id,$town_id;

    public function render()
    {

        $this->provinceData = Province::all();
        
        $this->districtData = District::all();

        $this->townData = $this->district_id == null ? Town::all() : Town::where('district_id',$this->district_id)->get();

        return view('livewire.customer-form');
    }


    protected $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'nic' => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'town_id' => 'required',
    ];


    public function save()
    {
        $validatedData = $this->validate();

        Customer::create($validatedData);

        return redirect('/');

    }

}
