@extends("layouts.app")

@section("content")


@if (count($services)>0)

            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="float-left">
                      <h5>Services of Company</h5>
                      </div>
                      <div class="float-right">
                        <!-- <a name="" id="" class="btn btn-primary" href="#" role="button">Propose Service</a> -->
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="display" id="basic-2">

                          <thead>
                            <tr>
                              <th></th>
                              <th>Name</th>
                              <th>description</th>
                              <th>Category Name</th>
                              <th>status</th>
                              <th>Price</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($services as $key=>$service)
                            <tr>
                                <td align="center" scope="row"><a title="Edit Category" href="{{url('service/'.$service->id .'/edit')}} "><i data-feather="edit"></i></a></td>
                                <td>{{ $service->serviess->name }}</td>
                                <td>{{ $service->serviess->description }}</td>
                                <td>{{ $service->category->name }}</td>
                                <td>
                                    @if ($service->status)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-warning">Inactive</span>
                                    @endif
                                </td>

                                 {{--  <td>{{ $service->serviess->price }}</td>  --}}
                                 <td>{{ $service->price }}</td>
                                <td align="center">
                                    <a href="" data-toggle="modal" data-original-title="change Status" data-target="#exampleModal{{$key+1  }}">Change Status</a>
                                </td>
                                <div class="modal fade" id="exampleModal{{$key+1  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form action="{{ route('service.change_status') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                        <div class="modal-body">


                                                      <input type="hidden" name="service_id" value="{{$service->id }}">

                                                    <div class="row">
                                                    <div class="col-md-12 " >
                                                     <select class="js-example-basic-single" style="width: 100%;" name="service_status">
                                                       <optgroup label="Status">
                                                         <option value="1">Active</option>
                                                         <option value="0">Inactive</option>

                                                       </optgroup>
                                                     </select>
                                                   </div>



                                          </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                          <button class="btn btn-secondary" type="submit">Save Status</button>
                                        </div>
                                      </form>
                                      </div>
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
            </div>

            @else
            <div class="page-wrapper compact-wrapper" id="pageWrapper">
                <!-- error-400 start-->
                <div class="error-wrapper">
                  <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
                    <div class="error-heading mb-5">
                      <h2 class="font-info">Company Services are Not Found</h2>
                    </div>
                    <div class="col-md-8 offset-md-2">
                      <p class="sub-content">Company Services are not yet added for further Proceding Add Company Services</p>
                    </div>
                    <div>
                        <a name="" id="" class="btn btn-primary" href="{{ route('service_category.create') }}" role="button">Select Company Services</a>
        
                    </div>
                  </div>
                </div>
                <!-- error-400 end-->
              </div>
            @endif
          </div>

            <!-- Container-fluid Ends-->









        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Service permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/services/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection
