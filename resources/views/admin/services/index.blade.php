@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Services</h5><br>

                            <a href="{{route('admin.services.create')}}" class="btn v3">Add Service</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="service_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    (function($){
        "use strict";
        $('#service_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.services.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'description',
                    name: 'description'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
