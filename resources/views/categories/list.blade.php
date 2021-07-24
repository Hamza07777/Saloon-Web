@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>All Categories</span></h5>
        </div>
        <div class="card-body">
          <div class="row ">
            @foreach($category as $category)
            <div class="col-md-3 col-6">
                <figure class=" img-hover ">



                    <div>


                        @if (!@empty($category->image))
                        <img src="{{ $category->image }}" class="img-fluid"  alt="Image description">
                        @else
                        <img src="../assets/images/lightgallry/08.jpg" class="img-fluid"  alt="Image description">
                        @endif



                    </div>

                  <h6 class="text-center mt-3">{{ $category->name }}</h6>
                  <p class="text-center">{{ $category->description }}</p>

                </figure>
                {{--  <a name="" id="edit_product" class="btn btn-info text-center ml-lg-5" role="button" href="{{url('caregory/'.$category->id .'/edit')}}">edit</a>  --}}

            </div>


            @endforeach
          </div>
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
