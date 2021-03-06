@extends('formsMaster') 

@section('urlTitles')
<?php session(['title' => 'Clients']);
session(['subtitle' => 'addClient']); ?>
@endsection


@section('content')
 
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Client</a></li>
                <li class="active"><a href="javascript:;">Add</a></li>
                 
            </ol> 
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Add <small> New Client</small></h1>
            <!-- end page-header -->
            <!-- begin row -->
             <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                
                                
                            </div>
                            <h4 class="panel-title">Add</h4>
                        </div>
                        <div class="panel-body">

                             
                            <form name="eForm" id="eForm"  method="POST" autocomplete="OFF" class="form-horizontal form-bordered"  enctype="multipart/form-data"  data-fv-framework="bootstrap"  data-fv-message="Required Field"  data-fv-icon-invalid="glyphicon glyphicon-remove"  data-fv-icon-validating="glyphicon glyphicon-refresh">

                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <fieldset>
                                    
                                     
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="name">Name:</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="name"   name="name" data-fv-notempty="true"   value="{{ old('name') }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Industry :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control"  name="industry" data-fv-notempty="true">
                                            <option value="">Please choose</option> 
                                            @foreach($industries as $industry)
                                            <option value="{!! $industry->id !!}">{!! $industry->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Status :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="select-required" name="status" data-fv-notempty="true">
                                            
                                            <option value="">Select</option>
                                            
                                            <option value="1">Qualified</option>
                                            <option value="2">Unqualified</option>
                                            <option value="3">Active</option>
                                            <option value="3">Passive</option>
                                            <option value="4">Do not contact</option>
                                            <option value="5">Negotiation</option>
                                                
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">BD Grade :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="select-required" name="bd_grade" data-fv-notempty="true">
                                            
                                            <option value="">Select</option> 
                                            <option value="1">Key account</option>
                                            <option value="2">Star account</option>
                                            <option value="3">Transactional account</option>
                                            <option value="3">Prospect account</option> 
                                                
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Parent Company :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control"  name="parent_company"  >
                                            <option value="0">None</option>
                                             @foreach($clients as $client)
                                            <option value="{!! $client->id !!}">{!! $client->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="description">Description :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
                                    </div>
                                </div> 

                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="phone">Phone :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="phone"  name="phone" data-fv-notempty="true"   value="{{ old('phone') }}" />
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="url">URL :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="url"  name="url" value="{{ old('url') }}" />
                                    </div>
                                </div>

                                <h4>Address</h4>
                                <hr> 
                               

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Country :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="country"  name="country" data-fv-notempty="true">
                                            <option value="">Please Chose</option>
                                             @foreach($countries as $country)
                                            <option value="{!! $country->Code !!}">{!! $country->Name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">City :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="cityLoader">
                                            <select class="form-control"  name="city" >
                                                <option value="">Please choose</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="postal_code">Postal Code :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="postal_code"  name="postal_code" value="{{ old('postal_code') }}" />
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="address">Address :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" id="address" name="address" rows="3" data-fv-notempty="true">{{ old('address') }}</textarea>
                                    </div>
                                </div> 
 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="reset" class="btn btn-sm btn-error">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>



                                </fieldset>
                            </form>
 
                        </div> 
                    <!-- end panel --> 
                </div>
            <!-- end row -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            App.init(); 

<!-- -------------------------------------------------==================--------------------------------------------- -->

  function cityLoader()
    {
       
      var country = $("#country").val(); 
       

       $.get('/cityLoader',{country:country }, function(branchBlade){ 
              
              $("#cityLoader").html(branchBlade); 
              
          });
    }   

<!-- -------------------------------------------------==================--------------------------------------------- -->

          

            $('#eForm').formValidation({
                message: 'This value is not valid',
                

                fields: {
                      
                
                    phone: {
                        validators: {
                            notEmpty: {},
                            digits: {},
                            
                        }
                    },
                 
            name: {
                     
                     verbose: false,
                     
                     validators: {
                     
                     notEmpty: {},
                     remote: {
                        url: '/clientAddCheck' ,
                        

                    }
                }
            }
        }
    })
    .on('change', '[name="country"]', function(e) {
         cityLoader();
      })
    // This event will be triggered when the field passes given validator
    .on('success.validator.fv', function(e, data) {
        // data.field     --> The field name
        // data.element   --> The field element
        // data.result    --> The result returned by the validator
        // data.validator --> The validator name

         

        if (data.field === 'name'
            && data.validator === 'remote'
            && (data.result.available === false || data.result.available === 'false'))
        {

            // The userName field passes the remote validator
            data.element                    // Get the field element
                .closest('.form-group')     // Get the field parent

                // Add has-warning class
                .removeClass('has-success')
                .addClass('has-warning')

                // Show message
                .find('small[data-fv-validator="remote"][data-fv-for="name"]')
                    .show();
        }


        if (data.field === 'name'
            && data.validator === 'remote'
            && (data.result.available === true || data.result.available === 'true'))
        {
             
            // The userName field passes the remote validator
            data.element                    // Get the field element
                .closest('.form-group')     // Get the field parent

                // Add has-warning class
                .removeClass('has-warning')
                .addClass('has-success')

                // Show message
                .find('small[data-fv-validator="remote"][data-fv-for="name"]')
                    .show();
        }

    })
    // This event will be triggered when the field doesn't pass given validator
    .on('err.validator.fv', function(e, data) { 
         
        // We need to remove has-warning class
        // when the field doesn't pass any validator
         

        if (data.field === 'name') {
            data.element
                .closest('.form-group')
                .removeClass('has-warning')
                  

        }
    });

  });

                            
    </script>
        @endsection