@extends("layouts.app")

@section("content")


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Categories</h5>
                    <div class="card-header-right">
                        <a href="/categories/add" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <div class="card-body">

                    @include("common.error-message")

                    <form action="">
                        <div class="row">

                            <div class="col-lg-3">
                                <input name="search" type="text" class="form-control" placeholder="search...">
                            </div>
                            <div class="col-lg-1">
                                <button onclick="clearSearch()" type="button" class="btn btn-sm btn-light">Clear</button>
                            </div>
                        </div><br>
                    </form>

                    <div class="table-responsive shadow shadow-showcase p-25">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td align="center" scope="row"><a title="Edit Category" href="/categories/edit/{{ $category->id }}"><i data-feather="edit"></i></a></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if ($category->status)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <a href="#" title="Delete Project" class="text-danger m-r-10"><i data-feather="minus-circle" onclick="deleteConfirm({{ $category->id }})"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        @if($categories->hasPages())
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ $categories->links() }}
                                </div>

                            </div>
                        @endif



                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Category permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/categories/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection