@extends('layouts.admin')

@section('title', 'Kelola Mobil')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary">Kelola Mobil</h4>
        <button class="btn btn-primary"
                data-toggle="modal"
                data-target="#createModal">
            <i class="fa fa-plus mr-1"></i> Tambah Mobil
        </button>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Table --}}
    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Kapasitas</th>
                        <th>Transmisi</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mobils as $i => $mobil)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>
                            @if($mobil->gambar)
                                <img src="{{ asset('mobil/'.$mobil->gambar) }}" width="70">
                            @endif
                        </td>
                        <td>
                            <strong>{{ $mobil->nama_mobil }}</strong><br>
                            <small class="text-muted">{{ $mobil->deskripsi }}</small>
                        </td>
                        <td>{{ $mobil->tipe_mobil }}</td>
                        <td>{{ $mobil->kapasitas }}</td>
                        <td>{{ $mobil->transmisi }}</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm text-white"
                                onclick="openEdit({{ $mobil->id }})">
                                <i class="fa fa-edit"></i>
                            </button>

                            <form action="{{ route('admin.mobil.destroy',$mobil->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Hapus mobil ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Belum ada data mobil
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ================= MODAL CREATE ================= --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.mobil.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Mobil</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body row">
                <div class="col-md-6 form-group">
                    <label>Nama Mobil</label>
                    <input name="nama_mobil" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Tipe Mobil</label>
                    <input name="tipe_mobil" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Kapasitas</label>
                    <input type="number" name="kapasitas" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Transmisi</label>
                    <select name="transmisi" class="form-control" required>
                        <option>Manual</option>
                        <option>Matic</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <div class="col-12 form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="editForm" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Mobil</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body row">
                <input type="hidden" id="edit_id">

                <div class="col-md-6 form-group">
                    <label>Nama Mobil</label>
                    <input id="edit_nama" name="nama_mobil" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Tipe Mobil</label>
                    <input id="edit_tipe" name="tipe_mobil" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Kapasitas</label>
                    <input id="edit_kapasitas" name="kapasitas" type="number" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Transmisi</label>
                    <select id="edit_transmisi" name="transmisi" class="form-control">
                        <option>Manual</option>
                        <option>Matic</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label>Gambar Baru</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="col-12 form-group">
                    <label>Deskripsi</label>
                    <textarea id="edit_deskripsi" name="deskripsi" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-warning text-white">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openEdit(id) {
    fetch(`/admin/mobil/${id}`)
        .then(res => res.json())
        .then(data => {
            $('#edit_nama').val(data.nama_mobil);
            $('#edit_tipe').val(data.tipe_mobil);
            $('#edit_kapasitas').val(data.kapasitas);
            $('#edit_transmisi').val(data.transmisi);
            $('#edit_harga').val(data.harga_per_hari);
            $('#edit_deskripsi').val(data.deskripsi);

            $('#editForm').attr('action', `/admin/mobil/${id}`);
            $('#editModal').modal('show');
        });
}
</script>
@endpush
