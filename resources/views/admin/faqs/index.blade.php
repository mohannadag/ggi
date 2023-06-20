@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>FAQs</h5><br>

                            <a href="{{route('admin.faqs.create')}}" class="btn v3">Add FAQ</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="faq_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Question</th>
                                        <th>Category</th>
                                        <th>Order</th>
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
        $('#faq_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.faqs.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'question',
                    name: 'question'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'order',
                    name: 'order'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
