<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePortRequest extends Request {

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
                    'name' => 'required|min:2|alpha-dash',
                    'port_number' => 'required|digits_between:1,48'
		];
	}

}
