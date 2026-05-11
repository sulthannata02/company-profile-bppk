@extends('layouts.admin')

@section('title', 'CMS Settings')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Landing Page CMS (Full CRUD)</h1>
        <button class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addSettingModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Key
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Halaman / Bagian</th>
                            <th>Label Konten (Nama Field)</th>
                            <th>Isi Konten (ID / EN)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td><span class="badge badge-primary">{{ strtoupper($setting->group) }}</span></td>
                            <td>
                                <strong class="text-primary">{{ $setting->label ?? $setting->key }}</strong><br>
                                <small class="text-muted">Key: <code>{{ $setting->key }}</code></small>
                            </td>
                            <td>
                                <div class="mb-1"><strong>ID:</strong> {{ Str::limit($setting->value_id, 50) }}</div>
                                <div><strong>EN:</strong> {{ Str::limit($setting->value_en, 50) }}</div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editSetting{{ $setting->id }}">Edit</button>
                                <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this setting key?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editSetting{{ $setting->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title">Edit: {{ $setting->label ?? $setting->key }}</h5>
                                            <button class="close text-white" type="button" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Nama Label (Manusiawi)</label>
                                                        <input type="text" name="label" class="form-control" value="{{ $setting->label }}" placeholder="Contoh: Judul Utama" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kelompok (Group)</label>
                                                        <input type="text" name="group" class="form-control" value="{{ $setting->group }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Input Type</label>
                                                        <select name="type" class="form-control">
                                                            <option value="text" {{ $setting->type == 'text' ? 'selected' : '' }}>Text Input</option>
                                                            <option value="textarea" {{ $setting->type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Indonesian Content (ID)</label>
                                                @if($setting->type == 'textarea')
                                                    <textarea name="value_id" class="form-control" rows="4">{{ $setting->value_id }}</textarea>
                                                @else
                                                    <input type="text" name="value_id" class="form-control" value="{{ $setting->value_id }}">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>English Content (EN)</label>
                                                @if($setting->type == 'textarea')
                                                    <textarea name="value_en" class="form-control" rows="4">{{ $setting->value_en }}</textarea>
                                                @else
                                                    <input type="text" name="value_en" class="form-control" value="{{ $setting->value_en }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSettingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New CMS Key</h5>
                    <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Label Konten (Nama yang dimengerti Admin)</label>
                        <input type="text" name="label" class="form-control" placeholder="Contoh: Judul Hero" required>
                    </div>
                    <div class="form-group">
                        <label>Setting Key (ID untuk Developer)</label>
                        <input type="text" name="key" class="form-control" placeholder="e.g. hero_title" required>
                        <small class="text-muted">Gunakan key ini di kode Blade: <code>setting('key_name')</code></small>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Group</label>
                                <input type="text" name="group" class="form-control" placeholder="e.g. hero" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="text">Text Input</option>
                                    <option value="textarea">Textarea</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Indonesian Value</label>
                        <textarea name="value_id" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>English Value</label>
                        <textarea name="value_en" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create Key</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
