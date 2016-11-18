<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendfilesRequest extends Request {

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
			'title' => 'required|min:6|max:255',
            'file' => 'required',
		];
	}
	
	public function messages()
	{
		return [
			'title.required' => 'Tiêu đề không được trống!',
			'title.min' => 'Tiêu đề tối thiểu cần 6 ký tự!',
			'title.max' => 'Tiêu đề đã vượt quá 255 ký tự!',
            'file.required' => 'File đính kèm không được trống!',
			'file.mimes' => 'File phải là file phải có định dạng .xlsx!',
		];
	}

}
