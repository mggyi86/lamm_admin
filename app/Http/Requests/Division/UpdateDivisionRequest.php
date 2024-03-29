<?php

namespace App\Http\Requests\Division;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisionRequest extends FormRequest
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
            'name' => 'required|string|unique:divisions,name,' . $this->route('division')->id
        ];
    }

    public function updateDivision($division)
    {
        $division->name = $this->name;

        if($division->isDirty()) {
            $division->slug = str_slug($this->name);
            $division->save();
        }
    }
}
