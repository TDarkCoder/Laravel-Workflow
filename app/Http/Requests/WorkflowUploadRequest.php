<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkflowUploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'file' => [
                Rule::requiredIf(is_null($this->route('workflowUpload'))),
                'file',
            ],
        ];
    }
}
