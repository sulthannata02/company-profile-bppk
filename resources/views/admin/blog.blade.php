@extends('layouts.admin')

@section('title', 'Kelola Blog')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800">Kelola Blog</h1>
    <button class="btn btn-primary"
            data-toggle="modal"
            data-target="#modalTambah">
        <i class="fa fa-plus"></i> Tambah Artikel
    </button>
</div>

{{-- ERROR --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- ================= TABLE ================= --}}
<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Thumbnail</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <span class="badge badge-{{ $blog->status == 'publish' ? 'success' : 'secondary' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </td>
                    <td>
                        @if($blog->thumbnail)
                            <img src="{{ asset('blog/'.$blog->thumbnail) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                                onclick="openEdit({{ $blog->id }})">
                            <i class="fa fa-edit"></i>
                        </button>

                        <form action="{{ route('admin.blog.destroy', $blog->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada artikel</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.blog.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Konten</label>
                    <input id="create_content" type="hidden" name="content">
                    <trix-editor input="create_content"></trix-editor>
                </div>

                <div class="form-group">
                    <label>Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formEdit"
              method="POST"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Artikel</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" id="edit_title" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Konten</label>
                    <input id="edit_content" type="hidden" name="content">
                    <trix-editor id="edit_editor" input="edit_content"></trix-editor>
                </div>

                {{-- PREVIEW THUMBNAIL --}}
                <div class="form-group">
                    <label>Thumbnail Saat Ini</label><br>
                    <img id="edit_thumbnail_preview"
                         src=""
                         width="120"
                         class="mb-2 d-block"
                         style="display:none;">
                </div>

                {{-- GANTI THUMBNAIL --}}
                <div class="form-group">
                    <label>Ganti Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select id="edit_status" name="status" class="form-control" required>
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openEdit(id) {
    fetch(`/admin/blog/${id}`)
        .then(res => res.json())
        .then(data => {
            $('#edit_title').val(data.title);
            $('#edit_status').val(data.status);

            const editor = document.getElementById('edit_editor');
            editor.editor.loadHTML(data.content);

            if (data.thumbnail) {
                $('#edit_thumbnail_preview')
                    .attr('src', `/blog/${data.thumbnail}`)
                    .show();
            } else {
                $('#edit_thumbnail_preview').hide();
            }

            $('#formEdit').attr('action', `/admin/blog/${id}`);
            $('#modalEdit').modal('show');
        });
}
</script>
@endpush
