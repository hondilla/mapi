<?php declare(strict_types=1);

namespace Omatech\Mapi\Editora\Infrastructure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateInstanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'class_key' => 'required|string',
            'metadata' => 'required|array',
            'metadata.id' => 'required|integer',
            'metadata.key' => 'required|string',
            'metadata.publication' => 'required|array',
            'metadata.publication.start_publishing_date' => 'required|date_format:Y-m-d H:i:s',
            'attributes' => 'array',
            'relations' => 'array',
        ];
    }

    public function prepareForValidation(): void
    {
        $input = $this->input();
        $input['metadata']['id'] = (int) $this->route()?->parameter('id');
        $this->merge($input);
    }
}
