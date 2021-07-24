@extends("layouts.app")

@section("content")

<div class="row">
    @if (count($company)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>Company Working Days Details</h5>
          </div>
  

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display" id="basic-2">

              <thead>
                <tr>
                  
                  <th>Company Name</th>
                  <th>First Day</th>
                  <th>Last Day</th>
                  <th>Off Day</th>
                  <th>Number of Working Days</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($company as $company)
                <tr>

                
                  <td>{{ $company->company_name($company->company_id) }}</td>
                  <td>{{ $company->from }}</td>
                  <td>{{ $company->to }}</td>
                  <td>{{ $company->is_off_day }}</td>
                  <td>{{ $company->day }}</td>
                  <div class="col-6">
                 </div>
                 <div class="col-6">

                 </div>
                  <td>
                    <a class="float-left mt-2" name="" id=""  href="{{url('company_days/'.$company->id .'/edit')}} "><i class="fa fa-edit"></i></a>
                     </td>
                </tr>
                @endforeach
              </tbody>
            </table>

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
              <h2 class="font-info">Company Working Days  Not Found</h2>
            </div>
            <div class="col-md-8 offset-md-2">
              <p class="sub-content">Company Working Days are not yet added for further Proceding Add Company Working Days</p>
            </div>
            <div>
                <a name="" id="" class="btn btn-primary" href="{{ route('company_days.create') }}" role="button">Add Working Days Detail</a>

            </div>
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
