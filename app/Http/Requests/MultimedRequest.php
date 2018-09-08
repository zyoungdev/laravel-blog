<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MultimedRequest extends Request
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
      'title'          => 'required|max:255|unique:multimeds,title,' . $this->id,
      'attr'           => 'required',
      'attr_link'      => 'required',
      'license'        => 'required',
      'license_link'   => 'required',
      'image_use_type' => 'required',
      'file'           => 'required'
    ];
  }
}
