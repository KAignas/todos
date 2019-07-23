<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|min:2',
            'date'      => 'required|date',
            'start'     => 'required|date_format:H:i',
            'end'       => 'required|date_format:H:i',
            'location'  => 'required|min:3',
            'notification_type'      => 'required',
            'notification_time'      => 'required',
            'label_id'  => 'required|exists:labels,id',
        ];
    }
}
