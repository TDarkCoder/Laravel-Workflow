<form
    action="{{ route('workflow-upload.save', ['workflowUpload' => $workflowUpload?->id]) }}"
    method="post"
    enctype="multipart/form-data"
    autocomplete="off">
    @csrf
    <div class="row g-3 needs-validation">
        <div class="col-sm-6">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                id="title"
                class="form-control form-control-sm @error('title') is-invalid @enderror"
                name="title"
                value="{{ old('title') ?? $workflowUpload->title ?? '' }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="file" class="form-label">File</label>
            <input
                type="file"
                id="file"
                class="form-control form-control-sm @error('file') is-invalid @enderror"
                name="file">
            @error('file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-sm btn-outline-success">
            Save
        </button>
    </div>
</form>
