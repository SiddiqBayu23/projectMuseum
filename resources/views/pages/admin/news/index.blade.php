@extends('layout.admin.app')
@section('title', 'News')
@section('content')
    <div>
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addCollection">Tambah
            Berita +</button>
        <div class="modal fade" id="addCollection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Berita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-4">

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" required id="title" name="title" class="form-control"
                                    value="{{ old('title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary</label>
                                <input type="text" required id="summary" name="summary" class="form-control"
                                    value="{{ old('summary') }}">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <div class="quill-editor" style="height: 250px;" data-target="content"></div>
                                <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_publish" name="is_publish"
                                    value="1" checked>
                                <label class="form-check-label" for="is_publish">Publish</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Summary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $index => $news)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->slug }}</td>
                        <td>
                            <div style="width: 80px; height: 80px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>{{ Str::limit($news->summary, 100, '...') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#updateNews{{ $news->id }}">Edit</button>
                                <div class="modal fade" id="updateNews{{ $news->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Edit Berita
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.news.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body px-4">
                                                    <input type="hidden" name="id" value="{{ $news->id }}">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Judul</label>
                                                        <input type="text" required id="title" name="title"
                                                            class="form-control"
                                                            value="{{ old('title', $news->title) }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Gambar</label>
                                                        @if ($news->image)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $news->image) }}"
                                                                    alt="Preview"
                                                                    style="max-width: 150px; border-radius: 4px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" id="image" name="image"
                                                            class="form-control" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                            gambar</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="summary" class="form-label">Summary</label>
                                                        <input type="text" required id="summary" name="summary"
                                                            class="form-control"
                                                            value="{{ old('summary', $news->summary) }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Konten</label>
                                                        <div class="quill-editor" style="height: 250px;"
                                                            data-target="content-update">
                                                            {!! old('content', $news->content) !!}
                                                        </div>
                                                        <input type="hidden" name="content" id="content-update"
                                                            value="{{ old('content', $news->content) }}">
                                                    </div>

                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input" id="is_publish"
                                                            name="is_publish" value="1"
                                                            {{ old('is_publish', $news->is_publish) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="is_publish">Publish</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteNews{{ $news->id }}">Hapus</button>
                                <div class="modal fade" id="deleteNews{{ $news->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Hapus Berita
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.news.remove') }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body px-4">
                                                    <p class="py-4">Apakah anda yakin akan menghapus data ini?</p>
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $news->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            ['link', 'image'],
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
