<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
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
            'client[accountNumber]' => 'required',
            'client[name]'          => 'required', 'alpha_dash', 'max:40',
            'client[document]'      => 'required', 'max:20',
            'client[email]'         => 'required', 'alpha_dash', 'max:35',
            'client[date]'          => 'required',
            'contacts[1][cttName]'  => 'required', 'alpha_dash', 'max:40',
            'contacts[1][cttCel]'   => 'required', 'max:15',
            'contacts[1][cttDesc]'  => 'required', 'alpha_dash', 'max:50',
            'address[cep]'          => 'required', 'alpha_dash', 'max:9',
            'address[road]'         => 'required', 'alpha_dash', 'max:30',
            'address[number]'       => 'required', 'numeric', 'max:5',
            'address[complement]'   => 'required', 'alpha_dash', 'max:20',
            'address[reference]'    => 'required', 'alpha_dash', 'max:30',
        ];
    }

    public function messages()
    {
        return [
            'client[accountNumber].required' => 'Informe um número de conta válido',
            'client[name].required'          => 'Informe um nome válido',
            'client[document].required'      => 'Informe um documento válido',
            'client[email].required'         => 'Informe um email válido',
            'client[date].required'          => 'Informe uma data válida',
            'contacts[1][cttName].required'  => 'Informe um nome válido',
            'contacts[1][cttCel].required'   => 'Informe um celular válido',
            'contacts[1][cttDesc].required'  => 'Informe uma descrição válida',
            'address[cep].required'          => 'Informe um cep válido',
            'address[road].required'         => 'Informe um endereço válido',
            'address[number].required'       => 'Informe um número válido',
            'address[complement].required'   => 'Informe um completo válido',
            'address[reference].required'    => 'Informe uma referência válida',
        ];
    }
}
