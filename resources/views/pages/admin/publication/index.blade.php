@extends('layout.admin.app')
@section('title', 'Video Streaming')
@section('content')
    <div>
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addPublication">Tambah
            Publikasi +</button>
        <div class="modal fade" id="addPublication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Publikasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.publications.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-4">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="publication_category_id" class="form-label">Kategori</label>
                                <select id="publication_category_id" name="publication_category_id" class="form-control"
                                    required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('publication_category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Penulis</label>
                                <input type="text" id="author" name="author" class="form-control"
                                    value="{{ old('author') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <div class="quill-editor" style="height: 250px;" data-target="content"></div>
                                <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="url" id="url" name="url" class="form-control"
                                    value="{{ old('url') }}" required>
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
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <th>Konten</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publications as $index => $publication)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $publication->title }}</td>
                        <td>{{ $publication->category->name ?? '-' }}</td>
                        <td>
                            <div style="width: 80px; height: 80px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>{{ $publication->author }}</td>
                        <td>{{ Str::limit(strip_tags($publication->content), 50, '...') }}</td>
                        <td>
                            <a href="{{ $publication->url }}" target="_blank">{{ $publication->url }}</a>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#updatePublication{{ $publication->id }}">Edit</button>
                                <div class="modal fade" id="updatePublication{{ $publication->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Edit Koleksi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('admin.publications.update', $publication->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body px-4">
                                                    <input type="hidden" name="id" value="{{ $publication->id }}">

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Judul</label>
                                                        <input type="text" id="title" name="title"
                                                            class="form-control"
                                                            value="{{ old('title', $publication->title) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Gambar</label>
                                                        @if ($publication->image)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $publication->image) }}"
                                                                    alt="Preview"
                                                                    style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" id="image" name="image"
                                                            class="form-control" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                            gambar.</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="publication_category_id"
                                                            class="form-label">Kategori</label>
                                                        <select id="publication_category_id"
                                                            name="publication_category_id" class="form-control" required>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ old('publication_category_id', $publication->publication_category_id) == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="author" class="form-label">Penulis</label>
                                                        <input type="text" id="author" name="author"
                                                            class="form-control"
                                                            value="{{ old('author', $publication->author) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Konten</label>
                                                        <div class="quill-editor" style="height: 250px;"
                                                            data-target="content-update">
                                                            {!! old('content', $publication->content) !!}
                                                        </div>
                                                        <input type="hidden" name="content" id="content-update"
                                                            value="{{ old('content', $publication->content) }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="url" class="form-label">URL</label>
                                                        <input type="url" id="url" name="url"
                                                            class="form-control"
                                                            value="{{ old('url', $publication->url) }}" required>
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
                                    data-bs-target="#deletePublication{{ $publication->id }}">Hapus</button>
                                <div class="modal fade" id="deletePublication{{ $publication->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Hapus Publikasi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.publications.remove') }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body px-4">
                                                    <p class="py-4">Apakah anda yakin akan menghapus data ini?</p>
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $publication->id }}">
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
                        container: toolbarOptions
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
