@extends("layouts.app")

@section("content")
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice{
      margin-top: 6px !important;
}
</style>
    <div class="row">
        <div class="col-sm-2">
        </div> 
      <div class="col-sm-8">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>Add Comapny Bussiness Hours</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">

                <form action="{{ route('company_days.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group m-form__group">
                        <label>Number of Working Days</label>
                        <div class="input-group">
                          <input id="day"  class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}"  autocomplete="day" autofocus type="text" placeholder="3">
                          @error('day')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                        </div>

                      </div>

                      <div class="form-group m-form__group">
                        <label>First Working Day</label>
                        <div class="input-group">
                          <select class="js-example-basic-single col-sm-12" name="from">
                            <optgroup label="Week Days" >
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                               <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                               <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                    <div class="form-group m-form__group">
                        <label>Last Working Day</label>
                        <div class="input-group">
                          <select class="js-example-basic-single col-sm-12" name="to">
                            <optgroup label="Week Days" >
                             <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                               <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                               <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                        <div class="form-group m-form__group">
                        <label>Off Day</label>
                        <div class="input-group ">
                          <select class="js-example-basic-single col-sm-12 " name="is_off_day" >
                            <optgroup label="Week Days">
                                <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                               <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                               <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                               <option value="Sunday">Sunday</option>
                            </optgroup>
                          </select>
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
