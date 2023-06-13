@if ($errors->get('upload'))
    <p>
        {{ $errors->get('upload')[0] }}
    </p>
@endif
<form
    method="POST"
    action="{{ route('notes.upload') }}"
    enctype="multipart/form-data"
>
    <!-- Laravel XSRF token injection -->
    @csrf

    <!-- Form field where the file will be selected -->
    <input
        name="upload"
        type="file"
    />

    <!-- Button to submit our form -->
    <button type="submit">
        Upload
    </button>
</form>
