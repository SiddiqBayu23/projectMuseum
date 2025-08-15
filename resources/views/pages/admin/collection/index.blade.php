@extends('layout.admin.app')
@section('title', 'Collection')
@section('content')
    <div>
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addCollection">Tambah
            Koleksi +</button>
        <div class="modal fade" id="addCollection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Koleksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.collections.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-4">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" required id="name" name="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="no_inv" class="form-label">Nomor Inventaris</label>
                                <input type="text" required id="no_inv" name="no_inv" class="form-control"
                                    value="{{ old('no_inv') }}">
                            </div>

                            <div class="mb-3">
                                <label for="collection_category_id" class="form-label">Kategori Koleksi</label>
                                <select required id="collection_category_id" name="collection_category_id"
                                    class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('collection_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="material" class="form-label">Material</label>
                                <input type="text" required id="material" name="material" class="form-control"
                                    value="{{ old('material') }}">
                            </div>

                            <div class="mb-3">
                                <label for="color" class="form-label">Warna</label>
                                <input type="text" required id="color" name="color" class="form-control"
                                    value="{{ old('color') }}">
                            </div>

                            <div class="mb-3">
                                <label for="length" class="form-label">Panjang</label>
                                <input type="number" step="0.01" required id="length" name="length"
                                    class="form-control" value="{{ old('length') }}">
                            </div>

                            <div class="mb-3">
                                <label for="width" class="form-label">Lebar</label>
                                <input type="number" step="0.01" required id="width" name="width"
                                    class="form-control" value="{{ old('width') }}">
                            </div>

                            <div class="mb-3">
                                <label for="height" class="form-label">Tinggi</label>
                                <input type="number" step="0.01" required id="height" name="height"
                                    class="form-control" value="{{ old('height') }}">
                            </div>

                            <div class="mb-3">
                                <label for="acquisition_method" class="form-label">Cara Perolehan</label>
                                <input type="text" required id="acquisition_method" name="acquisition_method"
                                    class="form-control" value="{{ old('acquisition_method') }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea required id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="function" class="form-label">Fungsi</label>
                                <textarea required id="function" name="function" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3 images-section">
                                <label class="form-label">Gambar</label>
                                <div class="images-wrapper p-3 border rounded bg-light">
                                    <div class="input-group mb-2">
                                        <input type="file" name="images[]" class="form-control" accept="image/*">
                                        <button type="button" class="btn btn-outline-danger remove-image"
                                            style="display: none">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="button" class="btn btn-success add-image">+ Tambah Gambar</button>
                                </div>
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
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Thumbnail</th>
                    <th>Kategori</th>
                    <th>Material</th>
                    <th>Warna</th>
                    <th>Ukuran (P × L × T)</th>
                    <th>Cara Perolehan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collections as $index => $collection)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $collection->name }}</td>
                        <td>{{ $collection->slug }}</td>
                        <td>
                            <div style="width: 80px; height: 80px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset('storage/' . $collection->thumbnail) }}"
                                    alt="{{ $collection->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>{{ $collection->category->name ?? '-' }}</td>
                        <td>{{ $collection->material }}</td>
                        <td>{{ $collection->color }}</td>
                        <td>{{ $collection->length }} × {{ $collection->width }} × {{ $collection->height }} cm</td>
                        <td>{{ $collection->acquisition_method }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#updateCollection{{ $collection->id }}">Edit</button>
                                <div class="modal fade" id="updateCollection{{ $collection->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Edit Koleksi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.collections.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $collection->id }}">

                                                <div class="modal-body px-4">
                                                    {{-- Nama --}}
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama</label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control"
                                                            value="{{ old('name', $collection->name) }}" required>
                                                    </div>

                                                    {{-- Thumbnail --}}
                                                    <div class="mb-3">
                                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                                        @if ($collection->thumbnail)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $collection->thumbnail) }}"
                                                                    alt="Thumbnail Preview"
                                                                    style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" id="thumbnail" name="thumbnail"
                                                            class="form-control" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                            thumbnail.</small>
                                                    </div>

                                                    {{-- Nomor Inventaris --}}
                                                    <div class="mb-3">
                                                        <label for="no_inv" class="form-label">Nomor Inventaris</label>
                                                        <input type="text" id="no_inv" name="no_inv"
                                                            class="form-control"
                                                            value="{{ old('no_inv', $collection->no_inv) }}" required>
                                                    </div>

                                                    {{-- Kategori --}}
                                                    <div class="mb-3">
                                                        <label for="collection_category_id" class="form-label">Kategori
                                                            Koleksi</label>
                                                        <select id="collection_category_id" name="collection_category_id"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ old('collection_category_id', $collection->collection_category_id) == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    {{-- Material, Warna, Ukuran, dll --}}
                                                    <div class="mb-3">
                                                        <label for="material" class="form-label">Material</label>
                                                        <input type="text" id="material" name="material"
                                                            class="form-control"
                                                            value="{{ old('material', $collection->material) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="color" class="form-label">Warna</label>
                                                        <input type="text" id="color" name="color"
                                                            class="form-control"
                                                            value="{{ old('color', $collection->color) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="length" class="form-label">Panjang</label>
                                                        <input type="number" step="0.01" id="length"
                                                            name="length" class="form-control"
                                                            value="{{ old('length', $collection->length) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="width" class="form-label">Lebar</label>
                                                        <input type="number" step="0.01" id="width"
                                                            name="width" class="form-control"
                                                            value="{{ old('width', $collection->width) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="height" class="form-label">Tinggi</label>
                                                        <input type="number" step="0.01" id="height"
                                                            name="height" class="form-control"
                                                            value="{{ old('height', $collection->height) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="acquisition_method" class="form-label">Cara
                                                            Perolehan</label>
                                                        <input type="text" id="acquisition_method"
                                                            name="acquisition_method" class="form-control"
                                                            value="{{ old('acquisition_method', $collection->acquisition_method) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Deskripsi</label>
                                                        <textarea id="description" name="description" class="form-control" required>{{ old('description', $collection->description) }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="function" class="form-label">Fungsi</label>
                                                        <textarea id="function" name="function" class="form-control" required>{{ old('function', $collection->function) }}</textarea>
                                                    </div>

                                                    {{-- Multiple Images --}}
                                                    <div class="mb-3 images-section">
                                                        <label class="form-label fw-bold">Gambar Tambahan</label>

                                                        {{-- Gambar lama --}}
                                                        @if ($collection->images && count($collection->images))
                                                            <div class="mb-3 row g-3">
                                                                @foreach ($collection->images as $image)
                                                                    <div class="col-6 col-md-3 position-relative">
                                                                        <div class="border rounded overflow-hidden position-relative image-card"
                                                                            style="aspect-ratio: 1/1;">
                                                                            <img src="{{ asset('storage/' . $image->image) }}"
                                                                                alt="Image" class="w-100 h-100"
                                                                                style="object-fit: cover;">

                                                                            {{-- Tombol hapus (centang delete_images[]) --}}
                                                                            <label
                                                                                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1 rounded-circle shadow-sm image-delete-toggle"
                                                                                style="line-height: .8; cursor: pointer;">
                                                                                ✕
                                                                                <input type="checkbox"
                                                                                    name="delete_images[]"
                                                                                    value="{{ $image->id }}"
                                                                                    class="d-none">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                        {{-- Tambah gambar baru --}}
                                                        <div class="images-wrapper p-3 border rounded bg-light">
                                                            <div class="input-group mb-2">
                                                                <input type="file" name="images[]"
                                                                    class="form-control" accept="image/*">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger remove-image"
                                                                    style="display: none">Hapus</button>
                                                            </div>
                                                        </div>

                                                        <div class="text-center mt-2">
                                                            <button type="button" class="btn btn-success add-image">+
                                                                Tambah Gambar</button>
                                                        </div>
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
                                    data-bs-target="#deleteCollection{{ $collection->id }}">Hapus</button>
                                <div class="modal fade" id="deleteCollection{{ $collection->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Hapus Koleksi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.collections.remove') }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body px-4">
                                                    <p class="py-4">Apakah anda yakin akan menghapus data ini?</p>
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $collection->id }}">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Helper: atur visibilitas tombol Hapus per-section
            function refreshRemoveButtons(section) {
                const groups = section.querySelectorAll('.images-wrapper .input-group');
                groups.forEach((g) => {
                    const btn = g.querySelector('.remove-image');
                    if (!btn) return;
                    // Sembunyikan tombol hapus kalau hanya ada 1 baris input
                    btn.style.display = (groups.length > 1) ? '' : 'none';
                });
            }

            // Delegasi klik: tambah gambar baru
            document.addEventListener('click', function(e) {
                const addBtn = e.target.closest('.add-image');
                if (addBtn) {
                    const section = addBtn.closest('.images-section');
                    if (!section) return;
                    const wrapper = section.querySelector('.images-wrapper');
                    if (!wrapper) return;

                    const newInput = document.createElement('div');
                    newInput.className = 'input-group mb-2';
                    newInput.innerHTML = `
                <input type="file" name="images[]" class="form-control" accept="image/*">
                <button type="button" class="btn btn-outline-danger remove-image">Hapus</button>
            `;
                    wrapper.appendChild(newInput);

                    refreshRemoveButtons(section);
                }
            });

            // Delegasi klik: hapus baris input gambar baru
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-image')) {
                    const group = e.target.closest('.input-group');
                    const section = e.target.closest('.images-section');
                    if (group && section) {
                        group.remove();
                        refreshRemoveButtons(section);
                    }
                }
            });

            // Opsional: efek visual saat tanda hapus gambar lama diklik
            document.addEventListener('click', function(e) {
                const toggle = e.target.closest('.image-delete-toggle');
                if (toggle) {
                    const checkbox = toggle.querySelector('input[type="checkbox"]');
                    const card = toggle.closest('.image-card');

                    // Centang input (supaya ikut terkirim)
                    checkbox.checked = true;

                    // Tambahkan efek visual saja, tapi jangan langsung remove dari DOM
                    card.style.opacity = '0.5';
                    card.style.pointerEvents = 'none';
                }
            });

            // Inisialisasi awal untuk semua section yang sudah ada di DOM
            document.querySelectorAll('.images-section').forEach(refreshRemoveButtons);
        });
    </script>
@endsection
