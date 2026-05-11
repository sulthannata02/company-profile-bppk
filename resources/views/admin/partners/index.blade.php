@extends('layouts.admin')

@section('title', 'Manage Partners')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Our Partners</h1>
        <button class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addPartnerModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Partner
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
                            <th>Logo</th>
                            <th>Partner Name</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                        <tr>
                            <td>
                                <img src="{{ asset('assets/partner/' . $partner->logo) }}" height="50" alt="">
                            </td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->link ?? '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPartner{{ $partner->id }}">Edit</button>
                                <form action="{{ route('admin.partner.destroy', $partner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this partner?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editPartner{{ $partner->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Partner</h5>
                                            <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Link (URL)</label>
                                                <input type="url" name="link" class="form-control" value="{{ $partner->link }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control">{{ $partner->address }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Logo (Leave empty to keep current)</label>
                                                <input type="file" name="logo" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Update Partner</button>
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
<div class="modal fade" id="addPartnerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Partner</h5>
                    <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Link (URL)</label>
                        <input type="url" name="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control-file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save Partner</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
