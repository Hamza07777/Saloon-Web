@extends("layouts.app")

@section("content")

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Add Category</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('caregory.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                  <div class="form-group m-form__group">
                    <label>Category Name</label>
                    <div class="input-group">
                      <input type="text" placeholder="Category Name"   id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Category Description</label>
                    <div class="input-group">
                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Category Description" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Category Image</label>
                    <div class="input-group">
                      <input  class="form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="{{ old('image') }}" required >
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
    </div>

        <script type="text/javascript">



        </script>
@endsection
