<?php

namespace App\Http\Requests\Customer;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ShippingAddressStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id'   => 'required|exists:users,id',
            'full_name'  => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'min:11',
                'max:11',
                'regex:/^09\d{9}$/',
                // unique in delivery_addresses table per user
                Rule::unique('delivery_addresses', 'phone')->ignore($this->user_id, 'user_id'),
            ],


            'street'     => 'required|string|max:255',
            'barangay'   => 'required|string|max:255',
            'city'       => 'required|string|max:100',
            'province'   => 'required|string|max:100',
            'postal_code'=> 'nullable|string|max:20',
            'is_default' => 'nullable|boolean',
        ];
    }
    public function messages()
    {
        return [
            // Phone number validation messages
            'phone.required' => 'The phone number is required.',
            'phone.string' => 'The phone number must be a string.',
            'phone.min' => 'The phone number must be exactly 11 digits.',
            'phone.max' => 'The phone number must be exactly 11 digits.',
            'phone.regex' => 'The phone number must start with "09" and be followed by 9 digits.',
            'phone.unique' => 'This phone number is already taken.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 422,
            'error'  => $validator->errors()->toArray()
        ]);

        throw new ValidationException($validator, $response);
    }
}
