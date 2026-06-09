@extends('layouts.admin')

@section('title', 'Kelola Mitra')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800">Kelola Mitra</h1>

    <button class="btn btn-primary"
        data-toggle="modal"
        data-target="#modalTambah">
        <i class="fa fa-plus"></i> Tambah Mitra
    </button>

</div>

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

<div class="card shadow">
    <div class="card-body table-responsive">


        <table class="table table-bordered align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Nama Mitra</th>
                    <th>Website</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($partners as $partner)

                <tr>
                    <td>{{ $partner->name }}</td>

                    <td>
                        @if($partner->website)
                        <a href="{{ $partner->website }}"
                            target="_blank">
                            Link
                        </a>
                        @else
                        -
                        @endif
                    </td>

                    <td>
                        @if($partner->logo)
                        <img src="{{ asset('partner/'.$partner->logo) }}"
                            width="80">
                        @endif
                    </td>

                    <td>
                        @if($partner->is_active)
                        <span class="badge badge-success">
                            Aktif
                        </span>
                        @else
                        <span class="badge badge-secondary">
                            Nonaktif
                        </span>
                        @endif
                    </td>

                    <td>{{ $partner->sort_order }}</td>

                    <td>

                        <button class="btn btn-warning btn-sm"
                            onclick="openEdit({{ $partner->id }})">
                            <i class="fa fa-edit"></i>
                        </button>

                        <form action="{{ route('admin.partner.destroy', $partner->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Hapus mitra ini?')">

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
                    <td colspan="6" class="text-center">
                        Belum ada data mitra
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>

    </div>

</div>

{{-- MODAL TAMBAH --}}

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">


        <form action="{{ route('admin.partner.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="modal-content">

            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Mitra</h5>

                <button type="button"
                    class="close"
                    data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Mitra</label>
                    <input type="text"
                        name="name"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Website</label>
                    <input type="url"
                        name="website"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address"
                        rows="4"
                        class="form-control"
                        required></textarea>
                </div>

                <div class="form-group">
                    <label>Logo</label>
                    <input type="file"
                        name="logo"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Urutan</label>
                    <input type="number"
                        name="sort_order"
                        value="0"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="is_active"
                        class="form-control">

                        <option value="1">
                            Aktif
                        </option>

                        <option value="0">
                            Nonaktif
                        </option>

                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary"
                    data-dismiss="modal">
                    Batal
                </button>

                <button class="btn btn-primary"
                    type="submit">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

{{-- MODAL EDIT --}}

<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog modal-lg">


        <form id="formEdit"
            method="POST"
            enctype="multipart/form-data"
            class="modal-content">

            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Mitra
                </h5>

                <button type="button"
                    class="close"
                    data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Mitra</label>

                    <input type="text"
                        id="edit_name"
                        name="name"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Website</label>

                    <input type="url"
                        id="edit_website"
                        name="website"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>

                    <textarea id="edit_address"
                        name="address"
                        rows="4"
                        class="form-control"
                        required></textarea>
                </div>

                <div class="form-group">
                    <label>Logo Saat Ini</label>

                    <br>

                    <img id="edit_logo_preview"
                        src=""
                        width="120"
                        class="mb-2"
                        style="display:none;">
                </div>

                <div class="form-group">
                    <label>Ganti Logo</label>

                    <input type="file"
                        name="logo"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Urutan</label>

                    <input type="number"
                        id="edit_sort_order"
                        name="sort_order"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select id="edit_is_active"
                        name="is_active"
                        class="form-control">

                        <option value="1">
                            Aktif
                        </option>

                        <option value="0">
                            Nonaktif
                        </option>

                    </select>
                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                    data-dismiss="modal">
                    Batal
                </button>

                <button class="btn btn-primary"
                    type="submit">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')

<script>
    function openEdit(id) {
        fetch(`/admin/partner/${id}`)
            .then(res => res.json())
            .then(data => {

                $('#edit_name').val(data.name);
                $('#edit_website').val(data.website);
                $('#edit_address').val(data.address);
                $('#edit_sort_order').val(data.sort_order);
                $('#edit_is_active').val(data.is_active ? 1 : 0);

                if (data.logo) {
                    $('#edit_logo_preview')
                        .attr('src', `/partner/${data.logo}`)
                        .show();
                } else {
                    $('#edit_logo_preview').hide();
                }

                $('#formEdit')
                    .attr('action', `/admin/partner/${id}`);

                $('#modalEdit')
                    .modal('show');
            });
    }
</script>

@endpush