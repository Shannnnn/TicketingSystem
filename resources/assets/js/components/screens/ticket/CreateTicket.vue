<template>
    <div class="container">
        <div class="row">
            <div class="panel panel-default" style="width: 700px;">
                <div class="panel-heading">Create new ticket</div>

                    <div class="panel-body" style="max-height:10; overflow-y:scroll;">
                        <h3>User Information</h3>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Company:</label>
                                <select class="form-control companyname" v-model="selected" name="selected">
                                    <option disabled value="" class="form-control">Select company</option>
                                    <option v-for="company in companies" value="company.id" class="form-control">{{ company.company }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Branch:</label>
                                <select class="form-control branchname">
                                  <option disabled value="">Select branch</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Address:</label>
                                <input type="text" class="form-control branchaddress" placeholder=" Enter address" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        <br><h3>Ticket Information</h3>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Ticket Source:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select ticket source</option>
                                  <option>Phone</option>
                                  <option>Email</option>
                                  <option>Others</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>SLA Plan:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select SLA Plan</option>
                                  <option>PROV(Warranty) - 72 hours</option>
                                  <option>PROV(No Warranty) - 72 hours</option>
                                  <option>NCR(Warranty) - 72 hours</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Help Topic:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select help topic</option>
                                  <option>Service Desk</option>
                                  <option>Incident Report</option>
                                  <option>In-house Request</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>Due Date:</label>
                                <select class="form-control">
                                  <option disabled value="">Please enter due date</option>
                                  <option>Date</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Department:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select department</option>
                                  <option>Sales</option>
                                  <option>Technical</option>
                                  <option>Warehouse</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>Assign to:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select</option>
                                  <option>Standby Technician</option>
                                  <option>Technician</option>
                                  <option>Warehouse</option>
                                </select>
                            </div>
                        </div>

                        <br><h3>Ticket Details</h3>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Products(with problem/s):</label>
                                <select class="form-control">
                                  <option disabled value="">Please select product/s</option>
                                  <option>CCTV</option>
                                  <option>EAS</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label>Warranty:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Brand:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select brand</option>
                                  <option>Fine Camera</option>
                                  <option>Others</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>Turn over date:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select date</option>
                                  <option>Date</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Problem Description:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select problem description:</option>
                                  <option>CCTV</option>
                                  <option>EAS</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <label>Product Summary:</label>
                                <textarea rows="10" cols="20" name="prod_summary" class="form-control" form="usrform">Enter text here...</textarea>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        <br><h3>Reports</h3>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Priority Level:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select priority level</option>
                                  <option>Low</option>
                                  <option>Normal</option>
                                  <option>High</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>Current Status:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select current status</option>
                                  <option>For Phone Support</option>
                                  <option>For Schedule Plotting</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>Assigned TFE:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select technician</option>
                                  <option>TFE 1</option>
                                  <option>TFE 2</option>
                                  <option>TFE 3</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label>Schedule:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select schedule</option>
                                  <option>Date</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label>SRF Number:</label>
                                <input type="text" class="form-control" id="srf_num" name="srf_num" placeholder=" Enter SRF number" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>

                            <div class="col-md-5">
                                <label>Deployment Update:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select update</option>
                                  <option>Visited</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <label>Remarks:</label>
                                <textarea rows="10" cols="20" name="remarks" class="form-control" form="usrform">Enter text here...</textarea>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Tags:</label>
                                <input type="text" class="form-control" id="tag" name="tag" placeholder="Add tags" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>

                            <div class="col-md-4">
                                <label>Ticket Status:</label>
                                <select class="form-control">
                                  <option disabled value="">Please select current status</option>
                                  <option>Open</option>
                                  <option>Close</option>
                                </select>
                            </div>
                          </div>

                        <div class="form-group">
                          <button type="button" class="btn btn-success">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    var Vue = require('vue');
    var VueResource = require('vue-resource');

    Vue.use(VueResource);

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        http: {
            root: 'http://127.0.0.1:8000/',
            headers: {
              Authorization: 'Basic YXBpOnBhc3N3b3Jk'
            }
        },
        data() {
            return{
                selected: '',
                companies: []
            }
        },
        methods: {
            loadCompanies: function() {
                this.$http.get('api/companies').then(response => {
                    this.companies = response.data;
                    console.log(this.companies);

                }, (response) => {
                    console.log(response);
                });
            },
            loadBranches: function() {
                $('.companyname').change(function() {
                    var company_id = $(this).val();
                    var branch_dropdown = $('.branchname');

                    branch_dropdown = "";

                    this.$http.get('api/branch/+company_id').then(response => {
                        var options = '<option disabled value="">Select branch</option>\n';
                            for(var i = 0; i < data.length; i++) {
                                options += '<option value="' + data[i].id + '">' + data[i].branch + '</option>\n';
                            }
                            console.log(options);
                            branch_dropdown.append(options);

                    }, (response) => {
                        console.log(response);
                    });
                });
            }
        },
        created: function() {
            this.loadCompanies();
            this.loadBranches();
        }
    }
</script>

<style>
.container {
    background: none;
    overflow: none;
    display: block;
    z-index: 1;
    }
</style>