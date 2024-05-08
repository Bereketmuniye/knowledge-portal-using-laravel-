@extends('layouts.app')

@section('content')
<style>

    .card
    {
        margin-top: 5vh;
        margin-bottom: 0%;
    }
    .file-upload-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 150px;
        border: 2px dashed hsl(145, 76%, 35%);
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
    }

    .file-upload-input {
        display: none;
        border:none;

    }

    .file-upload-icon {
        font-size: 40px; /* Adjust icon size as needed */
        color: #666; /* Adjust icon color as needed */

    }

    .file-upload-container:hover {
        border-color: #999;
    }

    .file-upload-container.drag-over {
        background-color: #f0f0f0;
    }

    .full-width-button {
        width: 100%;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Display uploaded files from the database -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-light bg-primary">
                            <tr>
                                <th>File Name</th>
                                <th>Uploaded Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $uploadedFile)
                            <tr>
                                <td>{{ $uploadedFile->name }}</td>
                                <td>{{ $uploadedFile->created_at }}</td>
                                <td>
                                    <a href="{{ route('file.download', $uploadedFile->id) }}" download style="background-color: #007bff; padding: 5px 10px; border-radius: 5px;"><i class="fas fa-download" style="color: #fff;"></i></a>

                                    <form action="{{ route('file.destroy', $uploadedFile->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No uploads found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- File input area -->
            <div class="card mt-4">
                <div class="card-body">
                    <form id="uploadForm" method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf

                        <label class="file-upload-container" for="fileUpload">
                            <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                            <br><br>
                            <p>Drag File or Browse this</p>
                        </label>
                        <input id="fileUpload" type="file" class="file-upload-input border border-none" name="file[]" multiple style="display: none;">
                        <div>
                            <button type="submit" class="btn btn-success mt-3 full-width-button">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Trigger file input when the icon is clicked
    document.querySelector('.file-upload-container').addEventListener('click', function() {
        document.getElementById('fileUpload').click();
    });
</script>
@endpush
