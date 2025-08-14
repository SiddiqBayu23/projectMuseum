@extends('layout.admin.app')
@section('title', 'Video Streaming')
@section('content')
    <div>
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addVideoStreaming">Tambah
            Video +</button>
        <div class="modal fade" id="addVideoStreaming" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Video</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.video-streamings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-4">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="platform" class="form-label">Platform</label>
                                <select id="platform" name="platform" class="form-control" required>
                                    <option value="youtube" {{ old('platform') == 'youtube' ? 'selected' : '' }}>YouTube
                                    </option>
                                    <option value="instagram" {{ old('platform') == 'instagram' ? 'selected' : '' }}>
                                        Instagram</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="video_url" class="form-label">Video URL</label>
                                <input type="text" id="video_url" name="video_url" class="form-control"
                                    value="{{ old('video_url') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="start_time" class="form-label">Waktu Mulai (Opsional)</label>
                                <input type="datetime-local" id="start_time" name="start_time" class="form-control"
                                    value="{{ old('start_time') }}">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="is_live" name="is_live"
                                    {{ old('is_live') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_live">
                                    Sedang Live
                                </label>
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
                    <th>Platform</th>
                    <th>Thumbnail</th>
                    <th>Video URL</th>
                    <th>Start Time</th>
                    <th>Live</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videoStreamings as $index => $videoStreaming)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $videoStreaming->title }}</td>
                        <td>{{ $videoStreaming->platform }}</td>
                        <td>
                            <div style="width: 80px; height: 80px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset('storage/' . $videoStreaming->thumbnail) }}"
                                    alt="{{ $videoStreaming->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>{{ $videoStreaming->video_url }}</td>
                        <td>
                            {{ $videoStreaming->start_time ? \Carbon\Carbon::parse($videoStreaming->start_time)->format('d M Y H:i') : '-' }}
                        </td>
                        <td>
                            @if ($videoStreaming->is_live)
                                <span class="badge bg-success">Live</span>
                            @else
                                <span class="badge bg-secondary">Offline</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#updateVideoStreaming{{ $videoStreaming->id }}">Edit</button>
                                <div class="modal fade" id="updateVideoStreaming{{ $videoStreaming->id }}" tabindex="-1"
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
                                            <form method="POST" action="{{ route('admin.video-streamings.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body px-4">
                                                    <input type="hidden" name="id"
                                                        value="{{ $videoStreaming->id }}">

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Judul</label>
                                                        <input type="text" id="title" name="title"
                                                            class="form-control"
                                                            value="{{ old('title', $videoStreaming->title) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Deskripsi</label>
                                                        <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $videoStreaming->description) }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="platform" class="form-label">Platform</label>
                                                        <select id="platform" name="platform" class="form-control"
                                                            required>
                                                            <option value="youtube"
                                                                {{ old('platform', $videoStreaming->platform) == 'youtube' ? 'selected' : '' }}>
                                                                YouTube</option>
                                                            <option value="instagram"
                                                                {{ old('platform', $videoStreaming->platform) == 'instagram' ? 'selected' : '' }}>
                                                                Instagram</option>
                                                            <option value="local"
                                                                {{ old('platform', $videoStreaming->platform) == 'local' ? 'selected' : '' }}>
                                                                Local</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="video_url" class="form-label">Video URL</label>
                                                        <input type="text" id="video_url" name="video_url"
                                                            class="form-control"
                                                            value="{{ old('video_url', $videoStreaming->video_url) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                                        @if ($videoStreaming->thumbnail)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $videoStreaming->thumbnail) }}"
                                                                    alt="Preview"
                                                                    style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" id="thumbnail" name="thumbnail"
                                                            class="form-control" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                            thumbnail.</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="start_time" class="form-label">Waktu Mulai</label>
                                                        <input type="datetime-local" id="start_time" name="start_time"
                                                            class="form-control"
                                                            value="{{ old('start_time', $videoStreaming->start_time ? \Carbon\Carbon::parse($videoStreaming->start_time)->format('Y-m-d\TH:i') : '') }}">
                                                    </div>

                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="is_live" name="is_live"
                                                            {{ old('is_live', $videoStreaming->is_live) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="is_live">
                                                            Sedang Live
                                                        </label>
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
                                    data-bs-target="#deleteVideoStreaming{{ $videoStreaming->id }}">Hapus</button>
                                <div class="modal fade" id="deleteVideoStreaming{{ $videoStreaming->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Hapus Video
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.video-streamings.remove') }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body px-4">
                                                    <p class="py-4">Apakah anda yakin akan menghapus data ini?</p>
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $videoStreaming->id }}">
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
