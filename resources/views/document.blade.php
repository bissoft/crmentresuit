@extends('layouts.admin')
@section('page-title')
{{__('Upload Document')}}
@endsection

@section('action-button')
<div class="all-button-box row d-flex justify-content-end">
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
      <a href="{{route('staff.documents', ['staff_id' => auth()->user()->id, 'category' => 'document'])}}" class="btn btn-xs btn-white btn-icon-only width-auto">Documents</a>  
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">

                        <h6>Name: </h6>
                        <p>{{ $user->name() }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Email: </h6>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="col-12 col-md-12 mx-auto mt-5">

                        <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($message))
                            <div class="alert alert-danger">{{ $message }}</div>
                            @endif
                            <input type="hidden" name="folder_id" value="3">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @if($user->hasRole('admin'))
                            @endif
                            <div class="form-group col-4 mb-4">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category" required>
                                    <!-- <option>Certificate</option> -->
                                    <option>Document</option>
                                </select>
                            </div>

                            <div class="form-group col-4 mb-4">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" name="expiry" class="form-control">
                            </div>
                            <div class="drop-zone col-12">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="file" class="drop-zone__input">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary mt-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }

</script>

@endsection
