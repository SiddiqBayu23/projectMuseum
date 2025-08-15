@extends('layout.admin.app')
@section('title', 'Service Section')
@section('content')
    <div>
        <div class="d-flex flex-column gap-2 mb-2 w-100">
            <div class="position-relative w-100 overflow-hidden mb-2" style="height: 300px;">
                <img src="{{ $serviceSection->thumbnail ? asset('storage/' . $serviceSection->thumbnail) : asset('images/virtualmuseum.jpg') }}"
                    class="position-absolute w-100 h-100" style="object-fit: cover; object-position: center;"
                    alt="{{ $serviceSection->title }}">
            </div>
            <h2 class="">{{ $serviceSection->title }}</h2>
            <h5>{{ $serviceSection->day }}</h5>
            <h5>{{ $serviceSection->time }}</h5>
            <a href="{{ $serviceSection->url }}" class="btn btn-primary d-inline-block">Link</a>
            <p>{!! $serviceSection->procedure !!}</p>
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#updateService{{ $serviceSection->id }}">Ubah
            Section</button>
        <div class="modal fade" id="updateService{{ $serviceSection->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Section</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.service-section.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body px-4">
                            <input type="hidden" name="id" value="{{ $serviceSection->id }}">

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title', $serviceSection->title) }}" required>
                            </div>

                            {{-- Day --}}
                            <div class="mb-3">
                                <label for="day" class="form-label">Hari</label>
                                <input type="text" id="day" name="day" class="form-control"
                                    value="{{ old('day', $serviceSection->day) }}" required>
                            </div>

                            {{-- Time --}}
                            <div class="mb-3">
                                <label for="time" class="form-label">Waktu</label>
                                <input type="text" id="time" name="time" class="form-control"
                                    value="{{ old('time', $serviceSection->time) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="procedure" class="form-label">Prosedur</label>
                                <div class="quill-editor" style="height: 250px;" data-target="procedure-update">
                                    {!! old('procedure', $serviceSection->procedure) !!}
                                </div>
                                <input type="hidden" name="procedure" id="procedure-update"
                                    value="{{ old('procedure', $serviceSection->procedure) }}">
                            </div>

                            {{-- Thumbnail --}}
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                @if ($serviceSection->thumbnail)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $serviceSection->thumbnail) }}" alt="Preview"
                                            style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                    </div>
                                @endif
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control"
                                    value="{{ old('url', $serviceSection->url) }}" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @if (session('successDelete'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="toast" class="toast align-items-center text-white bg-danger border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('successDelete') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if (session('successAdd'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="toast" class="toast align-items-center text-white bg-success border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('successAdd') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if (session('successUpdate'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="toast" class="toast align-items-center text-white bg-success border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('successUpdate') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="toast" class="toast align-items-center text-white bg-danger border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script>
        var toolbarOptions = [
            [{
                header: [1, 2, 3, false]
            }],
            ['bold', 'italic', 'underline'],
            [{
                list: 'ordered'
            }, {
                list: 'bullet'
            }],
            ['link'],
            ['clean']
        ];

        var quillEditors = [];

        document.querySelectorAll('.quill-editor').forEach(function(el) {
            var hiddenInput = el.parentElement.querySelector('input[type="hidden"]');

            var quill = new Quill(el, {
                theme: 'snow',
                modules: {
                    toolbar: {
                        container: toolbarOptions,
                        handlers: {
                            image: function() {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');
                                input.click();

                                input.onchange = () => {
                                    var file = input.files[0];
                                    if (/^image\//.test(file.type)) {
                                        var formData = new FormData();
                                        formData.append('image', file);

                                        fetch("{{ route('admin.news.upload-image') }}", {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: formData
                                            })
                                            .then(response => response.json())
                                            .then(result => {
                                                var range = quill.getSelection();
                                                quill.insertEmbed(range.index, 'image', result
                                                    .url);
                                            })
                                            .catch(err => console.error(err));
                                    }
                                };
                            }
                        }
                    }
                }
            });

            // Set initial content
            if (hiddenInput && hiddenInput.value) {
                quill.root.innerHTML = hiddenInput.value;
            }

            quillEditors.push({
                quill: quill,
                target: hiddenInput
            });
        });


        // Saat form submit, isi hidden input sesuai konten Quill
        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                quillEditors.forEach(function(item) {
                    if (item.target) {
                        item.target.value = item.quill.root.innerHTML;
                    }
                });
            });
        });
    </script>

@endsection
