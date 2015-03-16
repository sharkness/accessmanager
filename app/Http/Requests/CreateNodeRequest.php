<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNodeRequest extends Request {

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
                        'location' => 'required|min:2|alpha-dash',
                        'mgmt_ip' => 'required|ip',
                        'model_number' => 'required|alpha-dash'
                    ];
	}

}
