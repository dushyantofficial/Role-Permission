@extends('layouts.app')


@section('content')

    @include('Admin.flash-message')
    <style>
        @media (max-width: 575.98px) {
            /* Add a class to the table container to make it responsive */
            .responsive-table {
                overflow-x: auto;
            }
        }
    </style>

    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Role Management</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;&nbsp;
 <a class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine" href="{{ route('roles.create') }}" style="float: right">
                + Create New Role
            </a>
                <!-- Modal -->
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body sortableTable__container responsive-table" id="my_report">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Permission Name</th>
                                <th width="">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                @php
                                    $rolePermissions = \Illuminate\Support\Facades\DB::table('role_has_permissions')
    ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
    ->where('role_has_permissions.role_id', $role->id)
    ->pluck('permissions.name')
    ->all();

                                @endphp
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($rolePermissions as $index =>$permission)
                                            <label class="badge badge-info">{{$permission}}</label>
                                            @if(($index + 1) % 6 == 0)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine"
                                           href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                        @can('role-edit')
                                            <a class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                               href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('role-delete')
                                            <button
                                                class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-role"
                                                data-delete-id="{{ $role->id }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                            {{--                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline','onclick' => "return confirm('Are you sure?')"]) !!}--}}
                                            {{--                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-resume']) !!}--}}
                                            {{--                                            {!! Form::close() !!}--}}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <p class="text-center text-primary"><small>Developer Name :-<b style="color: red">Dushyant Chhatraliya</b></small>
    </p>
@endsection
@push('page_scripts')

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-role', function () {
                var id = $(this).data('delete-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send an AJAX request to delete the resource record
                        $.ajax({
                            type: 'DELETE',
                            url: '{{ route('roles.destroy', ['role' => 'id']) }}' + id,
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (response) {
                                // Handle the success response (e.g., reload the page or remove the deleted item from the DOM)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Delete!',
                                    text: 'Your record deleted successfully.',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload(); // Reload the page
                                    }
                                });
                            },
                            error: function (error) {
                                // Handle the error response (e.g., show an error message)
                                Swal.fire('Error', 'An error occurred while deleting the record.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush


