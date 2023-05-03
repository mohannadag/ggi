@extends('admin.main')
@section('content')
<body>
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import and Export Excel data
                  to database.
            </div>
            <div class="card-body">
                <form action="{{ route('admin.import') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file"
                           class="form-control">
                    <br>
                    <button class="btn btn-success">
                          Import Properties Data
                       </button>
                    <a class="btn btn-warning"
                       href="{{ route('admin.export') }}">
                              Export Properties Data
                      </a>
                </form>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.importImages') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file1"
                           class="form-control">
                    <br>
                    <button class="btn btn-success">
                          Import Images Data
                    </button>
                </form>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.importDetails') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file2"
                           class="form-control">
                    <br>
                    <button class="btn btn-success">
                          Import Details Data
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
@endsection
