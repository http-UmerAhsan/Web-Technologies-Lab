@extends('layout')

@section('title', 'Customers')

@section('content')
<h1>Customers</h1>
<a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>
<table id="customers-table" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#customers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("customers.data") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection