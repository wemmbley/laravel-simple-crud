<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-3 mb-3 mt-3">
                        <form action="{{ route('employee.create') }}">
                            <button type="submit" class="btn btn-block btn-success">Create new employee</button>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Companies list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Company id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->company_id }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}">
                                                <button type="button" class="btn btn-block btn-default" id="edit">Edit</button>
                                            </a>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-block btn-danger" id="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{ $employees->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</x-app-layout>
