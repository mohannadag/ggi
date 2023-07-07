@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Blogs</h5><br>

                            <a href="{{route('admin.blogs.create')}}" class="btn v3">Add New Blog</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="paginationFullNumbers">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th style="max-width:100px">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{route('admin.blogs.edit',$property)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>|
                                                        <a href="{{route('news.show', ['news' => $property->slug])}}" class="edit btn btn-success btn-sm" target="_blank"><i class="la la-eye"></i></a>
                                                        | <form action="{{route('admin.blogs.destroy',$property)}}" method="POST">
                                                            {{csrf_field()}}
                                                            {{method_field("DELETE")}}
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="la la-trash"></i></button>
                                                            </form>
                                                    </div>
                                                </td>
                                                <td>{{$property->category->blogCategoryTranslation->name ?? null}}</td>
                                                <td>{{ ($property->user->f_name.' '.$property->user->l_name) ?? '-'}}</td>
                                                <td>{{$property->blogTranslation->title ?? $property->title}}</td>
                                                <td>
                                                    @if($property->status == 'approved')
                                                        <span class="bg-primary p-1 text-white">Approved</span>
                                                    @elseif($property->status == 'pending')
                                                        <span class="bg-warning p-1 text-white">Pending</span>
                                                    @else
                                                        <span class="bg-danger p-1 text-white">Rejected</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
<script type="text/javascript">

    $(document).ready(function () {
        // Data table
        $('#paginationFullNumbers').DataTable();

        //delete button
        $('#paginationFullNumbers tbody').on("click", ".delete", function () {

            var id = this.id;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/category/delete/" + id,
                        method: "POST",
                        headers: {
                            "RequestVerificationToken": "@GetAntiXsrfRequestToken()"
                        }
                    }).fail(function () {
                        Swal.fire(
                            'Error!',
                            'someting went wrong please try again later.',
                            'error'
                        )
                    }).done(function () {
                        Swal.fire(
                            'done',
                            'the item has been deleted',
                            'success'
                        )
                    }).done(function () {
                        window.location.href = '/admin/category';
                    })
                }
            })
        })
    });



</script>

<script>
    (function($){
        "use strict";
        $('#package_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.blogs.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action1',
                    name: 'action1'
                }
            ]
        });
    })(jQuery);
</script>

@endpush
