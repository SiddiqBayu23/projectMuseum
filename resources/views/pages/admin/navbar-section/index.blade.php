@extends('layout.admin.app')
@section('title', 'Navbar Section')
@section('content')
    <div>
        <div class="d-flex align-items-center gap-2 mb-4">
            <h2 class="">{{ $navbarSection->title }}</h2>
            <button class="btn btn-success rounded-circle p-2 d-flex align-items-center justify-content-center"
                data-bs-toggle="modal" data-bs-target="#updateNavTitle{{ $navbarSection->id }}">
                <i class="ti ti-pencil fs-5 text-white"></i>
            </button>
            <div class="modal fade" id="updateNavTitle{{ $navbarSection->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Edit Navigasi
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.navbar-section.update') }}">
                            @csrf
                            @method('put')
                            <div class="modal-body px-4">
                                <input type="hidden" name="id" value="{{ $navbarSection->id }}">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Navbar</label>
                                    <input type="text" required id="title" name="title"
                                        value="{{ $navbarSection->title }}" class="form-control">
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
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addNavigation">Tambah
            Navigasi +</button>
        <div class="modal fade" id="addNavigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Navigasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.navbar-links.store') }}">
                        @csrf
                        <div class="modal-body px-4">

                            <div class="mb-3">
                                <label for="navigation" class="form-label">Navigasi</label>
                                <input type="text" required id="navigation" name="navigation" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="href" class="form-label">URL</label>
                                <input type="text" required id="href" name="href" class="form-control">
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
                    <th>Navigation</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($navbarSection->links as $index => $link)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $link->navigation }}</td>
                        <td>{{ $link->href }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#updateNavigation{{ $link->id }}">Edit</button>
                                <div class="modal fade" id="updateNavigation{{ $link->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Edit Navigasi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.navbar-links.update') }}">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body px-4">
                                                    <input type="hidden" name="id" value="{{ $link->id }}">
                                                    <div class="mb-3">
                                                        <label for="navigation" class="form-label">Navigasi</label>
                                                        <input type="text" required id="navigation" name="navigation"
                                                            value="{{ $link->navigation }}" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="href" class="form-label">URL</label>
                                                        <input type="text" required id="href" name="href"
                                                            value="{{ $link->href }}" class="form-control">
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
                                    data-bs-target="#deleteNavigation{{ $link->id }}">Hapus</button>
                                <div class="modal fade" id="deleteNavigation{{ $link->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Hapus Produk
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.navbar-links.remove') }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body px-4">
                                                    <p class="py-4">Apakah anda yakin akan menghapus data ini?</p>
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $link->id }}">
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
