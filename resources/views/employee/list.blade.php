@extends("layouts.app")

@section("content")

<div class="row">
    @if (count($employee)>0)
    @foreach ($employee as $employee)


    <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
      <div class="card custom-card">
        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/1.jpg" alt=""></div>
        <div class="card-profile">
        @if (!@empty($employee->image))
                        <img src="{{ $employee->image }}" class="rounded-circle"  alt="Image description">
                        @else
                       <img class="rounded-circle" src="../assets/images/avtar/3.jpg" alt="">
                        @endif
                    </div>

        <div class="text-center profile-details mt-3">
          <h4>{{ $employee->name }}</h4>
          <h6>{{ $employee->designation }}</h6>

         <p>{{ $employee->get_services($employee->id) }} etc</p>



      </div>


        <div class="card-footer row">
          <div class="col-12 col-sm-12">
            <h6>Email</h6>
            <p>{{ $employee->email }}</p>
          </div>
        <hr>
          <div class="col-12 col-sm-12">
            <h6>Address</h6>
            <p>{{ $employee->address }}</p>
          </div>
          <div class="col-6">
             <a name="" id="" class="btn btn-info" href="{{url('employee/'.$employee->id .'/edit')}} " role="button">edit</a>
          </div>
          <div class="col-6">
          <form action="{{url('employee/'.$employee->id)}}" method="POST">
            @csrf
            @method('DELETE')

            <a name="" id="" class="btn btn-danger" href="" role="button">Delete</a>
        </form>
          </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @else
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- error-400 start-->
        <div class="error-wrapper">
          <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
            <div class="error-heading mb-5">
              <h2 class="font-info">Employees Not Found</h2>
            </div>
            <div class="col-md-8 offset-md-2">
              <p class="sub-content">Employess are not yet added in a company for further Proceding Add some Employees</p>
            </div>
            <div><a class="btn btn-info-gradien btn-lg" href="{{ route('employee.create') }}">Add Employee</a></div>
          </div>
        </div>
        <!-- error-400 end-->
      </div>
    @endif



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
