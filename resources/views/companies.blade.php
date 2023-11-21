<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-3 mb-3 mt-3">
                        <form action="{{ route('company.create') }}">
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
                                        <th>Name</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app/' . $company->logo) }}" alt="logotype">
                                            </td>
                                            <td>{{ $company->website }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>
                                                <a href="{{ route('company.edit', $company->id) }}">
                                                    <button type="button" class="btn btn-block btn-default" id="edit">Edit</button>
                                                </a>
                                                <form action="{{ route('company.destroy', $company->id) }}" method="POST" >
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
                        {{ $companies->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</x-app-layout>
