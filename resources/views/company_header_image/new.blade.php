@extends("layouts.app")

@section("content")

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Header Image</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('company_header.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                  <div class="form-group m-form__group">
                    <label>Upload Header Image For Application (.jpeg, .png)</label>
                    <div class="input-group">
                      <input  class="form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="{{ old('image') }}" required >
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
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
