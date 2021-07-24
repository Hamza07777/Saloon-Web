@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-sm-2">
        </div> 
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Purpose Category</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('purpose_Category.store') }}" method="post">
                    @csrf


                  <div class="form-group m-form__group">
                    <label>Category Name</label>
                    <div class="input-group">
                      <input type="text" placeholder="Category Name"   id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                    </div>
                  </div>


              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
      </div>
    </form>
    <div class="col-sm-2">
    </div> 
    </div>

        <script type="text/javascript">



        </script>
@endsection
