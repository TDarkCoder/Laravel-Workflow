<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkflowUploadRequest;
use App\Models\WorkflowUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkflowUploadController extends Controller
{
    public function index(): View
    {
        $workflowUploads = WorkflowUpload::all(); // This is not a good practice (In real project, it would be paginated)

        return view('templates.workflow-upload.index', compact('workflowUploads'));
    }

    public function show(?WorkflowUpload $workflowUpload): View
    {
        return view('templates.workflow-upload.show', compact('workflowUpload'));
    }

    public function save(WorkflowUploadRequest $request, ?WorkflowUpload $workflowUpload = null): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['file'] = $this->upload($request, $workflowUpload);

        if ($workflowUpload) {
            $workflowUpload->update($validatedData);
        } else {
            $workflowUpload = WorkflowUpload::create($validatedData);
        }

        return redirect(route('workflow-upload.show', ['workflowUpload' => $workflowUpload->id]));
    }

    private function upload(Request $request, ?WorkflowUpload $workflowUpload = null): string
    {
        $file = $request->file('file');

        if ($file) {
            $path = Storage::disk('public')->putFileAs('workflow-upload', $file, $file->getClientOriginalName());

            return '/storage/' . $path;
        }

        return $workflowUpload?->file;
    }
}
