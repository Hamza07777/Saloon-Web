@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Change Passowrd</span>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('change_password') }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}

                      <div class="form-group m-form__group">
                        <label>Passowrd</label>
                        <div class="input-group">
                          <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Confirm Password</label>
                        <div class="input-group">
                          <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">
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
        </form>
          </div>
    </div>
        <script type="text/javascript">


        </script>
@endsection
