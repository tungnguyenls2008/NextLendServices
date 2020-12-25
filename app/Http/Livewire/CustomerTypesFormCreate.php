<?php

namespace App\Http\Livewire;

use App\Models\Services\CustomerType;
use http\Client\Request;
use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class CustomerTypesFormCreate extends FormComponent
{
    public function fields()
    {
        return [
            Field::make('Type')->input()->rules('required'),
            Field::make('Fields')->input()->rules('required'),
        ];
    }

    public function success()
    {

        CustomerType::create($this->form_data);
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('customer_type_create');
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('customer_type_display');
    }
}
