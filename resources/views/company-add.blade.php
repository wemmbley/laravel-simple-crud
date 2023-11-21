<x-app-layout>

@if(isset($companyEdit))
    <form action="{{ route('company.update', $companyEdit->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
@else
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
@endif

    @csrf
    <div class="modal-body">
        <!-- form start -->
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"
                    @if(isset($companyEdit->name))
                        value="{{ $companyEdit->name }}"
                    @endif
                >
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </div>
            <div class="form-group">
                <label for="last-name">Logo</label>
                <input type="file" name="logo" class="form-control" id="logo" placeholder="Upload logo">
                @if($errors->has('logo'))
                    {{ $errors->first('logo') }}
                @endif
            </div>
            <div class="form-group">
                <label for="company">Website</label>
                <input type="text" name="website" class="form-control" id="website" placeholder="Website"
                       @if(isset($companyEdit->website))
                           value="{{ $companyEdit->website }}"
                       @endif
                >
                @if($errors->has('website'))
                    {{ $errors->first('website') }}
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                       @if(isset($companyEdit->email))
                           value="{{ $companyEdit->email }}"
                       @endif
                >
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
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
