<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangeMonitoringRequest extends Request {

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
                    // 'mgmt_ip' => 'required|ip',
                    // 'is_monitored' => 'required|integer|max:1'
		];
	}

}
