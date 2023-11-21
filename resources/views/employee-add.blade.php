<x-app-layout>

@if(isset($employeeEdit))
    <form action="{{ route('employee.update', $employeeEdit->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
@else
    <form action="{{ route('employee.index') }}" enctype="multipart/form-data">
@endif

    @csrf
    <div class="modal-body">
        <!-- form start -->
        <div class="card-body">
            <div class="form-group">
                <label for="name">First name</label>
                <input type="text" name="first_name" class="form-control" id="name" placeholder="Enter name"
                    @if(isset($employeeEdit->first_name))
                        value="{{ $employeeEdit->first_name }}"
                    @endif
                >
                @if($errors->has('first_name'))
                    {{ $errors->first('first_name') }}
                @endif
            </div>
            <div class="form-group">
                <label for="last-name">Last name</label>
                <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Enter last name"
                       @if(isset($employeeEdit->last_name))
                           value="{{ $employeeEdit->last_name }}"
                      @endif
                >
                @if($errors->has('last_name'))
                    {{ $errors->first('last_name') }}
                @endif
            </div>
            <div class="form-group">
                <label for="company">Company ID</label>
                <input type="text" name="company_id" class="form-control" id="company" placeholder="Company ID"
                       @if(isset($employeeEdit->company_id))
                           value="{{ $employeeEdit->company_id }}"
                       @endif
                >
                @if($errors->has('company_id'))
                    {{ $errors->first('company_id') }}
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                       @if(isset($employeeEdit->email))
                           value="{{ $employeeEdit->email }}"
                       @endif
                >
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                       @if(isset($employeeEdit->phone))
                           value="{{ $employeeEdit->phone }}"
                       @endif
                >
                @if($errors->has('phone'))
                    {{ $errors->first('phone') }}
                @endif
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
</x-app-layout>
