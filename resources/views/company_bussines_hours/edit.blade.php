@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-sm-2">
    </div> 
    <div class="col-sm-8">
      <div class="card" style="padding: 20px;">
        <div class="card-header">
          <h5>Edit Company Working Days</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
                <form action="{{ url('company_days/'.$company->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}


                    <div class="form-group m-form__group">
                        <label>Number of Working Days</label>
                        <div class="input-group">
                          <input id="day"  class="form-control @error('day') is-invalid @enderror" name="day" value="{{ $company->day  }}" required autocomplete="day" autofocus type="text" placeholder="3">
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
                              <option value="Monday" @if ($company->from=='Monday')
                                selected
                            @endif
                              >Monday</option>
                              <option value="Tuesday"
                              @if ($company->from=='Tuesday')
                                selected
                            @endif
                              >Tuesday</option>
                               <option value="Wednesday"
                               @if ($company->from=='Wednesday')
                                selected
                            @endif

                               >Wednesday</option>
                              <option value="Thursday"
                              @if ($company->from=='Thursday')
                                selected
                            @endif

                              >Thursday</option>
                               <option value="Friday"
                               @if ($company->from=='Friday')
                                selected
                            @endif
                               >Friday</option>
                              <option value="Saturday"
                              @if ($company->from=='Saturday')
                                selected
                            @endif
                              >Saturday</option>
                                <option value="Sunday"
                                @if ($company->from=='Sunday')
                                selected
                            @endif
                                >Sunday</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                    <div class="form-group m-form__group">
                        <label>Last Working Day</label>
                        <div class="input-group">
                          <select class="js-example-basic-single col-sm-12" name="to">
                                <optgroup label="Week Days" >
                              <option value="Monday" @if ($company->to=='Monday')
                                selected
                            @endif
                              >Monday</option>
                              <option value="Tuesday"
                              @if ($company->to=='Tuesday')
                                selected
                            @endif
                              >Tuesday</option>
                               <option value="Wednesday"
                               @if ($company->to=='Wednesday')
                                selected
                            @endif

                               >Wednesday</option>
                              <option value="Thursday"
                              @if ($company->to=='Thursday')
                                selected
                            @endif

                              >Thursday</option>
                               <option value="Friday"
                               @if ($company->to=='Friday')
                                selected
                            @endif
                               >Friday</option>
                              <option value="Saturday"
                              @if ($company->to=='Saturday')
                                selected
                            @endif
                              >Saturday</option>
                                <option value="Sunday"
                                @if ($company->to=='Sunday')
                                selected
                            @endif
                                >Sunday</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                        <div class="form-group m-form__group">
                        <label>Off Day</label>
                        <div class="input-group ">
                          <select class="js-example-basic-single col-sm-12 " name="is_off_day" >
                               <optgroup label="Week Days" >
                              <option value="Monday" @if ($company->is_off_day=='Monday')
                                selected
                            @endif
                              >Monday</option>
                              <option value="Tuesday"
                              @if ($company->is_off_day=='Tuesday')
                                selected
                            @endif
                              >Tuesday</option>
                               <option value="Wednesday"
                               @if ($company->is_off_day=='Wednesday')
                                selected
                            @endif

                               >Wednesday</option>
                              <option value="Thursday"
                              @if ($company->is_off_day=='Thursday')
                                selected
                            @endif

                              >Thursday</option>
                               <option value="Friday"
                               @if ($company->is_off_day=='Friday')
                                selected
                            @endif
                               >Friday</option>
                              <option value="Saturday"
                              @if ($company->is_off_day=='Saturday')
                                selected
                            @endif
                              >Saturday</option>
                                <option value="Sunday"
                                @if ($company->is_off_day=='Sunday')
                                selected
                            @endif
                                >Sunday</option>
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
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Fetch all records

      fetchRecords(0);



      });


      function fetchRecords(id){
        $.ajax({
            url: '/company_deals/get_services/'+id,
          type: 'get',
          dataType: 'json',
          success: function(response){

            var len = 0;
            $('#chk_boxes_jquery').empty();
            if(response['data'] != null){
               len = response['data'].length;
            }

            if(len > 0){
               for(var i=0; i<len; i++){
                var id = response['data'][i].id;
                var name = response['data'][i].name;



                var tr_str = "<div class='col-md-3 mt-2'>" +
                    "<label class='d-block' for='chk-ani'>" +"<input class='checkbox_animated' name='services[]' id='chk-ani' value="+name+" type='checkbox'>"+ name+ "</label>" +


                  "</div>";




                  $("#chk_boxes_jquery").append(tr_str);
               }
            }

          }
        });
      }


</script>
@endsection
