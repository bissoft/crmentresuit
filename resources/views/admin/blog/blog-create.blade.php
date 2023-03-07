@extends('layouts.admin')
@php
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('page-title')
    {{__('Manage Blogs')}}
@endsection

@section('content')
<script src="https://foxynature.com/admin-assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    function _full_Ed() {
        tinymce.init({
            setup: function(editor) {
                editor.on("init", function() {
                    editor.shortcuts.remove('ctrl+s');
                });
            },
            mode: "specific_textareas",
            editor_selector: "oneditor",
            valid_children : '-p[img],+div[img],span[img]',
            plugins: [
                "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template paste textcolor"
            ],
            rel_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'No Referrer',
                    value: 'noreferrer'
                },
                {
                    title: 'No Opener',
                    value: 'noopener'
                },
                {
                    title: 'No Follow',
                    value: 'nofollow'
                }
            ],
            target_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Same Window',
                    value: '_self'
                },
                {
                    title: 'New Window',
                    value: '_blank'
                },
                {
                    title: 'Parent frame',
                    value: '_parent'
                }
            ],
            style_formats: [
                {
                     title: 'Custom Bullet',
                     selector: 'li', 
                     classes: 'cum_list',
                     styles:{
                         "list-style-image" : "https://svgsilh.com/svg/304167.svg"
                     }
                }
            ],
            style_formats_merger :true,
            toolbar: "insertfile undo redo | removeformat | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons ",
            theme_advanced_path: false,
            relative_urls: false,
            remove_script_host: false,
            theme_advanced_resizing: true,
            forced_root_block : 'p',
            
            style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                },
                {
                    title: 'Header 1',
                    block: 'h1'
                },
                {
                    title: 'Header 2',
                    block: 'h2'
                },
                {
                    title: 'Header 3',
                    block: 'h3'
                },
                {
                    title: 'Header 4',
                    block: 'h4'
                },
                {
                    title: 'Header 5',
                    block: 'h5'
                },
                {
                    title: 'Header 6',
                    block: 'h6'
                },
            ]
        });
    }
    _full_Ed();
</script>
<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
    </div>
    <div class="row mt-5">
        

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Create New Blogs</h5>

                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="row g-3" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="text" name="id" hidden value="{{$blogs->id ?? ''}}">
                        <div class="col-md-12">
                            <label for=" " class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="title" name="title" class="form-control" value="{{$blogs->title ?? ''}}">
                            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        {{-- <div class="col-md-12">
                            <label for=" " class="form-label">Slug</label>
                            <input type="text" class="form-control" placeholder="slug" name="slug" class="form-control" value="{{$blogs->slug ?? ''}}">
                            @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
                        </div> --}}
                        <div class="col-md-12">
                            <label for=" " class="form-label">Description</label>
                            <textarea type="text" class="form-control" placeholder="description" name="description" class="form-control"> {{$blogs->description ?? ''}}</textarea>
                            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-12">
                            <label for=" " class="form-label">Detail</label>
                            <textarea type="text" rows="10" class="form-control oneditor" placeholder="detail" name="detail" class="form-control"> {{$blogs->detail ?? ''}}</textarea>
                            @error('detail') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="old_image" hidden value="{{$blogs->image ?? ''}}">
                            <input id="fancy-file-upload" class="uploade_docs  form-control" type="file" name="image" >
                            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                        </div> 

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection
