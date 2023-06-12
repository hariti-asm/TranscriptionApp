<form
    method="POST"
    action="{{ route('fileUpload.upload') }}"
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
