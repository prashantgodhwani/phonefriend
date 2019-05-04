<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadPhoneRequest extends FormRequest
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

        if(request()->units == 1 || request()->units == null) {
            $rules = [
                'model' => 'required',
                'imei1' => 'required|numeric|digits:15',
                'imei2' => 'numeric|digits:15|nullable',
                'remarks' => 'nullable',
                'age' => 'required',
                'price' => 'required|numeric|digits_between:4,7',
                'conditions' => 'required',
                'accessories' => 'required',
                'physical_condition' => ['required'],
                'dp' => 'image|mimes:jpeg,bmp,png',
            ];
            $photos = count($this->input('photos'));
            foreach (range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png';
            }
        }
        else{  $rules = [
            'model' => 'required',
            'imei1' => 'numeric|digits:15|nullable',
            'imei2' => 'numeric|digits:15|nullable',
            'remarks' => 'nullable',
            'age' => 'required',
            'price' => 'required|numeric|digits_between:4,7',
            'conditions' => 'required',
            'accessories' => 'required',
            'physical_condition' => ['required'],
            'dp' => 'image|mimes:jpeg,bmp,png',
            'units'=>'required|numeric|min:2'
        ];
            $photos = count($this->input('photos'));
            foreach (range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png';
            }}
        return $rules;
    }
}
