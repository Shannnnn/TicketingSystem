@extends('layouts.default')

@section('content')
<div class="ui container">

   <div class="ui huge header">Create New Ticket</div>

        <form method="POST" action="{{ url('/tickets') }}">
        <div class="ui form blue segment">
         <h3 class="ui dividing header">User Information</h3>

         <div class="eight wide field">
          <div class="field">
            <label>Company: *</label>
            <select class="ui search dropdown" id="companyname">
            <option value="" disabled="true" selected="true">Select Company</option>
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->company}}</option>
            @endforeach
            </select>
          </div>

          <div class="field">
            <label>Branch: *</label>
            <select class="ui search dropdown" id="branchname">
                <option value="" disabled="true" selected="true">Select Branch</option>
            </select>
          </div>

          <div class="field">
            <label>Address: *</label>
            <div class="ui input focus">
                <input type="text" placeholder="Enter address" id="branchaddress">
            </div>
          </div>
         </div>
        </div>

        <table class="ui teal celled table" id="contacts">
           <thead>
              <tr>
                <th>Contact Name</th>
                <th>Contact Number</th>
                <th>E-mail address</th>
                <th>Label</th>
              </tr>
           </thead>
           <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
           </tbody>
        </table>

       <input type="hidden" class="clientid" name="clientid" id="clientid">

       <div class="ui form yellow segment">
         <div class="twelve wide field">
            <h3 class="ui dividing header">Ticket Information</h3>
            <div class="two fields">
              <div class="field">
                <label>Ticket Source: *</label>
                <select class="ui search dropdown ticket_source" id="ticket_source" name="ticket_source">
                    <option value="" disabled="true" selected="true">Select Ticket Source</option>
                    @foreach($sources as $source)
                        <option value="{{$source->source}}">{{$source->source}}</option>
                    @endforeach
                </select>
            </div>

              <div class="field">
                <label>Help Topic: *</label>
                <select class="ui search dropdown help_topic" id="help_topic" name="help_topic">
                    <option value="" disabled="true" selected="true">Select Help Topic</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->topic}}">{{$topic->topic}}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="two fields">
              <div class="field">
                <label>SLA Plan: *</label>
                <select class="ui search dropdown sla_plan" id="sla_plan" name="sla_plan">
                    <option value="" disabled="true" selected="true">Select SLA Plan</option>
                    @foreach($slaplans as $slaplan)
                        <option value="{{$slaplan->sla_plan}}">{{$slaplan->sla_plan}}</option>
                    @endforeach
                </select>
              </div>

              <div class="field">
                <label>Department:</label>
                <select class="ui search dropdown department" id="department" name="department">
                    <option value="" disabled="true" selected="true">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{$department->department}}">{{$department->department}}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="two fields">
              <div class="field">
                <label>Assign to: *</label>
                <select class="ui search dropdown assigned_to" id="assigned_to" name="assigned_to">
                    <option value="" disabled="true" selected="true">Select Assignee</option>
                        @foreach($assignees as $assignee)
                    <option value="{{$assignee->name}}">{{$assignee->name}}</option>
                @endforeach
                </select>
              </div>

              <div class="field">
                <label>Scheduled Date: *</label>
                <div class="ui calendar">
                    <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="text" id="scheduled_date" name="scheduled_date" placeholder="Date">
                    </div>
                </div>
              </div>
            </div>

            <h3 class="ui dividing header">Ticket Details</h3>
            <div class="two fields">
              <div class="field">
                <label>Products Group(with problem/s): *</label>
                <select class="ui search dropdown product" id="product" name="product">
                    <option value="" disabled="true" selected="true">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{$product->product}}">{{$product->product}}</option>
                    @endforeach
                </select>
              </div>

              <div class="field">
                <label>Warranty: *</label>
                <select class="ui search dropdown warranty" id="warranty" name="warranty">
                    <option value="" disabled="true" selected="true">Select Warranty</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
              </div>
            </div>

            <div class="two fields">
              <div class="field">
                <label>Brand:</label>
                <select class="ui search dropdown brand" id="brand" name="brand">
                    <option value="" disabled="true" selected="true">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                    @endforeach
                </select>
              </div>

              <div class="field">
                <label>Turn Over Date: *</label>
                <div class="ui calendar">
                    <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="text" placeholder="Date" value="" id="turn_over_date" name="turn_over_date">
                    </div>
                </div>
              </div>
            </div>

            <div class="eight wide field">
              <div class="field">
                <label>Problem Description: *</label>
                <select class="ui search dropdown description" id="description" name="description">
                    <option value="" disabled="true" selected="true">Select Description</option>
                    @foreach($descriptions as $description)
                        <option value="{{$description->description}}">{{$description->description}}</option>
                    @endforeach
                </select>
              </div>
            </div>

              <div class="field">
                <label>Problem Summary: *</label>
                <textarea class="summary" name="summary" id="summary"></textarea>
              </div>

            <h3 class="ui dividing header">Reports</h3>
            <div class="two fields">
              <div class="field">
                <label>Priority: *</label>
                <select class="ui search dropdown priority" id="priority" name="priority">
                    <option value="" disabled="true" selected="true">Select Priority Level</option>
                    @foreach($priorities as $priority)
                        <option value="{{$priority->priority}}">{{$priority->priority}}</option>
                    @endforeach
                </select>
              </div>
            </div>

              <div class="field">
                <label>Remarks: *</label>
                <textarea class="remark" id="remark" name="remark"></textarea>
              </div>

            <div class="twelve wide field">
              <div class="field">
                <label>Tags <i class="tags icon"></i></label>
                  <select class="ui fluid search dropdown tag" name="tag" id="tag" multiple="">
                        @foreach($descriptions as $description)
                            <option value="{{$description->description}}">{{$description->description}}</div>
                         @endforeach
                         @foreach($products as $product)
                            <option value="{{$product->product}}">{{$product->product}}</div>
                         @endforeach
                        </div>
                  </select>
              </div>
            </div>

            <input type="hidden" name="selectedTags" id="selectedTags"/>

            <button class="ui teal button"><i class="ticket icon"></i>Open Ticket</button>
         </div>
       </div>
       </form>
   </div>
</div><br>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
                $(document).ready(function(){

                    $('#companyname').change(function() {
                        var companyId = $(this).val();
                        var branchDropdown = $('#branchname');

                        branchDropdown.dropdown('restore defaults');
                        branchDropdown.html('');

                        $.get('api/branch/' + companyId, function(data) {
                            var options = '<option value="" selected disabled>Select Branch</option>\n';
                            for(var i = 0; i < data.length; i++) {
                                options += '<option value="' + data[i].id + '">' + data[i].branch + '</option>\n';
                            }
                            branchDropdown.append(options);
                        });
                    });

                    let getAddress = function() {
                        var companyId = $('#companyname').val();
                        var branchId = $('#branchname').val();
                        var addressInput = $('#branchaddress');

                         $.get('api/branch-address/' + companyId + '/' + branchId, function(data) {
                              addressInput.val(data[0].branch_address);
                         });
                    };

                    let getContacts = function() {
                        var companyId = $('#companyname').val();
                        var branchId = $('#branchname').val();
                        var contactTable = $('#contacts');

                        contactTable.html('');

                        $.get('api/contact/' + companyId + '/' + branchId, function(data) {
                            var tables = '<table class="ui celled table" id="contacts">'
                                              +'<thead>'+
                                                 '<tr>'+
                                                  '<th>Contact Name</th>'+
                                                  '<th>Contact Number</th>'+
                                                  '<th>Email</th>'+
                                                  '<th>Label</th>'+
                                                '</tr>'+
                                              '</thead>';
                            for(var i = 0; i < data.length; i++) {
                                tables +=      '<tbody>'
                                                +'<tr>'+
                                                  '<td>' + data[i].contact_name + '</td>'+
                                                  '<td>' + data[i].contact_number + '</td>'+
                                                  '<td>' + data[i].email + '</td>'+
                                                  '<td>' + data[i].label + '</td>'+
                                                '</tr>'+
                                               '</tbody>';
                            }
                            contactTable.append(tables);
                        });
                    };

                    let getClientId = function() {
                        var companyId = $('#companyname').val();
                        var branchId = $('#branchname').val();
                        var clientInput = $('#clientid');

                        clientInput.html('');

                        $.get('api/client/' + companyId + '/' + branchId, function(data) {
                            clientInput.val(data.id);
                        });
                    };

                    $('#branchname').change(function() {
                        if($(this).val()) {
                            getAddress();
                            getContacts();
                            getClientId();
                        }
                    });

                    $('input[name="scheduled_date"]').daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true
                    });

                    $('input[name="turn_over_date"]').daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true
                    });

                    $('#tag').change(function() {
                        $("#selectedTags").val($('.ui.dropdown.tag').dropdown('get value').join("||"));
                    });

                    $('.ui.dropdown.tag').dropdown({
                        allowAdditions: true,
                        hideAdditions: false
                    });
                });
</script>
