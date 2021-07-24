@extends("layouts.app")

@section("content")
 {{-- {{ dd($empoloyee_service) }} --}}
<div class="row">
    <div class="col-sm-2">
    </div> 
    <div class="col-sm-8">
      <div class="card" style="padding: 20px;">
        <div class="card-header">
          <h5>Add Employee</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
                <form action="{{ url('employee/'.$employee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
            <input type="hidden" id="emp_id" value="{{ $employee->id }}">
                  <div class="form-group m-form__group">
                      <label>Name</label>
                      <div class="input-group">
                        <input id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus type="text" placeholder=" Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label>Email</label>
                      <div class="input-group">
                        <input id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}" required autocomplete="email" autofocus type="email" placeholder="someone@gmail.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>

                    <div class="form-group m-form__group">
                      <label>Phone Number</label>
                      <div class="input-group">
                          <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $employee->phone_number }}" required autocomplete="phone_number" autofocus type="text" placeholder="Phone Number">
                          @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror  
                      </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label>Whatsapp Number</label>
                      <div class="input-group">
                        <input id="whatsapp_number"  class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ $employee->whatsapp_number }}" required autocomplete="whatsapp_number" autofocus type="text" placeholder="Whatsapp Number">
                        @error('whatsapp_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label>Address</label>
                      <div class="input-group">
                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Address" name="address">{{ $employee->address }}</textarea>
                        @error('Address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label>Designation</label>
                      <div class="input-group">
                        <select class="js-example-basic-single col-sm-12" name="designation">
                          <optgroup label="Employee type" >
                            <option value="manager" @if ($employee->designation=='manager')
                                selected
                            @endif>Manager</option>
                            <option value="employee" @if ($employee->designation=='employee')
                                selected
                            @endif >Employee</option>
                          </optgroup>
                        </select>
                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      </div>
                    </div>

                    {{--  <div class="form-group m-form__group">
                      <label>Working Hours</label>
                      <div class="input-group">
                        <input id="working_hours"  class="form-control @error('working_hours') is-invalid @enderror" name="working_hours" value="{{ $employee->working_hours }}" required autocomplete="working_hours" autofocus type="text" placeholder="Working hours">
                      </div>
                    </div>  --}}
                    <div class="form-group m-form__group">
                      <label>Start Time</label>
                      <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                        <input id="start_time"  class="form-control @error('start_time') is-invalid @enderror" name="start_time"  required  autofocus type="text" value="{{ $employee->start_time }}"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        @error('start_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label>End Time</label>
                      <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                        <input id="end_time"  class="form-control @error('end_time') is-invalid @enderror" name="end_time"  required autofocus type="text" value="{{ $employee->end_time }}"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        @error('end_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror    
                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h5>Add Services in Employee Profile</h5>
                          </div>
                          <div class="card-body animate-chk">
                            <div class="row">
                              <div class="col-md-3 bg-light" style="padding-left:0px;padding-right:0px;">
                                <div class="vertical-scroll scroll-demo " style="padding-left:0px;padding-right:0px;height: 171px;">

                                  <ul >
                                    <li class="list-group-item " style="background: none;border:none; width:100%; border-bottom:1px solid black;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords(0)">See All</button></li>

                                        <?php
                                        $x = 1;
                                        $length = count($category);
                                        ?>
                                    @foreach( $category as  $index => $category )

                                    @if ($x === $length)
                                    <li class="list-group-item " style="background: none;border:none; width:100%;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords('{{ $category->id}}')">{{ $category->name	 }}</button></li>

                                    @else
                                    <li class="list-group-item " style="background: none;border:none; width:100%; border-bottom:1px solid black;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords('{{ $category->id}}')">{{ $category->name	 }}</button></li>

                                    @endif
                                    <?php  $x++; ?>
                                    @endforeach
                                  </ul>

                            </div>
                          </div>
                          <div class="col-md-9 " style="padding-left: 1px;">
                            <div class="vertical-scroll scroll-demo" style="height: 171px;" >
                                <div class="row mt-2" id="chk_boxes_jquery">


                                </div>
                              </div>
                          </div>
                            </div>


                            </div>
                          </div>
                        </div>

                    <div class="form-group m-form__group">
                      <label>Image (.PNG,.JPG)</label>
                      <div class="input-group">
                        <input class="form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="  " required >{{ $employee->image }}
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
  <div class="col-sm-2">
</div> 
  </div>
  <script>

      var id=0;

  </script>
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
        var emp_id=document.getElementById("emp_id").value;
        $.ajax({
            type: "get",
            url: '{{ url('/') }}/company_deals/get_services_edit/'+id,
            data:{ 
                "employee_id": emp_id,  
            },
           
            success:function(resp){
                $('#chk_boxes_jquery').empty();
                
                $("#chk_boxes_jquery").append(resp);
            },error:function(){
              alert("Error");
            }
            });

      }


</script>
@endsection
