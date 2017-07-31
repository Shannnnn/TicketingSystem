@extends('layouts.default')

@section('content')
<div class="ui container">
    <div class="ui huge header">Client Management</div>
    <button class="ui blue button add-client">Add Client</button>
    
    <table id="client-table" class="ui celled table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Branch</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

    <div class="ui large modal modify-client-box">
        <div class="ui header modify-title">
            Add Client
        </div>
        <div class="scrolling content modify-client-content">
            <div class="ui form">
                <div class="field">
                        <label>Company</label>
                        <div class="two fields">
                            <div class="field">
                                <select class="ui selection dropdown company-dropdown">
                                    <option value="">Company</option>
                                    <option value="new">New Company</option>
                                </select>
                            </div>
                            <div class="field">
                                <input id="new-company" type="text" placeholder="New Company Name" disabled>
                            </div>
                        </div>
                </div>
                <div class="field">
                    <label>Branch</label>
                    <input type="text" id="branch" placeholder="Branch Name">
                </div>
                <div class="field">
                    <label>Address</label>
                    <input type="text" id="address" placeholder="Branch Address">
                </div>
            </div>
            <table id="contacts-table" class="ui celled table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contact Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Label</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
            <div class="ui blue button add-new-contact">Add Contact</div>
        </div>
        <div class="actions modify-client-actions">
            <div class="ui green ok button add-client-submit">
                <i class="checkmark icon"></i>
                Add
            </div>
            <div class="ui green ok button add-client-ok">
                <i class="checkmark icon"></i>
                OK
            </div>
            <div class="ui green ok button update-client-submit">
                <i class="checkmark icon"></i>
                Update
            </div>
            <div class="ui red cancel button add-client-cancel">
                <i class="remove icon"></i>
                Cancel
            </div>
        </div>
    </div>

    @component('components/prompt')
    @slot('title')
        Title
    @endslot
    @slot('actions')
        <div class="ui green ok button prompt-yes">
            <i class="checkmark icon"></i>
            Yes
        </div>
        <div class="ui red cancel button prompt-no">
            <i class="remove icon"></i>
            No
        </div>
    @endslot

    Message
    @endcomponent

    @component('components/message')
    @slot('title')
        Title
    @endslot

    Message
    @endcomponent
</div>
@endsection
@section('javascript')
<script src="{{ asset('js/api-calls.js') }}"></script>
<script>
    $(document).ready(function() {
        let currentClient = 0;
        let clientTable = $('#client-table').DataTable({
            "ajax": "api/clients",
            "columns": [
                { "data": "id" },
                { "data": "company_name" },
                { "data": "branch" },
                { "data": "address" },
                {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='ui blue button show-action'>Show</button>"
                        + "<button class='ui green button edit-action'>Edit</button>"
                        + "<button class='ui red button delete-action'>Delete</button>"
                }
            ]
        });

        let contactsTable = $('#contacts-table').DataTable({
            "columns": [
                { "data": "id", "visible": false },
                { "data": "contact_name" },
                { "data": "contact_number" },
                { "data": "email" },
                { "data": "label" },
                {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='ui red button delete-action'>Delete</button>"
                }
            ],
            "paging": false,
            "info": false,
            "searching": false
        });

        // Initialize modal
        let showModifyModal = function(setupFn) {
            getAllCompanies(function(data) {
                let companies = data.map(c => c["company_name"]);
                $('.company-option').remove();
                for(let company of companies) {
                    $('.company-dropdown select').append('<option value="' + company + '" class="company-option">' + company + '</option>');
                }
                
                setupFn();

                $(".modify-client-box").modal('show');
            });            
        };

        let setSelectedCompany = function(company) {
            setTimeout(function () {
                $(".company-dropdown").dropdown('set selected', company);
            }, 1);
        };

        // Main screen functions
        $(".add-client").click(function() {
            showModifyModal(function() {
                $(".modify-title").html("Add Client");

                $("#new-company").show();
                $(".add-client-submit").show();
                $(".add-client-cancel").show();
                $(".add-new-contact").show();
                $(".add-client-ok").hide();
                $(".update-client-submit").hide();
                contactsTable.column(5).visible(true);
            });
        });

        $("#client-table").on('click', '.show-action', function () {
            let selectedClient = clientTable.row($(this).parents('tr')).data();
            getContacts(selectedClient.id, function(response) {
                showModifyModal(function() {
                    $(".modify-title").html("View Client");

                    $("#new-company").hide();
                    $(".add-client-submit").hide();
                    $(".add-client-cancel").hide();
                    $(".add-new-contact").hide();
                    $(".update-client-submit").hide();
                    $(".add-client-ok").show();
                    contactsTable.column(5).visible(false);

                    $(".company-dropdown").addClass("disabled");
                    setSelectedCompany(selectedClient.company_name);
                    $(".company-dropdown.disabled").css("opacity", 1);
                    $(".company-dropdown > .dropdown.icon").hide();

                    $("#branch").attr("readonly", "");
                    $("#branch").val(selectedClient.branch);
                    $("#address").attr("readonly", "");
                    $("#address").val(selectedClient.address);
                    
                    if(response.data) {
                        for(let contact of response.data) {
                            contactsTable.row.add({
                                "id": contact.id,
                                "contact_name": contact.contact_name,
                                "contact_number": contact.contact_number,
                                "email": contact.email,
                                "label": contact.label
                            }).draw(false);
                        }
                        contactsTable.draw();
                    }
                });
            });
        });

        $("#client-table").on('click', '.edit-action', function () {
            let selectedClient = clientTable.row($(this).parents('tr')).data();
            currentClient = selectedClient.id;
            getContacts(currentClient, function(response) {
                showModifyModal(function() {
                    $(".modify-title").html("Edit Client");

                    $("#new-company").show();
                    $(".add-new-contact").show();
                    $(".update-client-submit").show();
                    $(".add-client-cancel").show();
                    $(".add-client-submit").hide();
                    $(".add-client-ok").hide();
                    contactsTable.column(5).visible(true);

                    setSelectedCompany(selectedClient.company_name);
                    $("#branch").val(selectedClient.branch);
                    $("#address").val(selectedClient.address);
                    
                    if(response.data) {
                        for(let contact of response.data) {
                            contactsTable.row.add({
                                "id": contact.id,
                                "contact_name": '<input type="text" class="borderless-input new-contact-name" value="' + contact.contact_name + '">',
                                "contact_number": '<input type="text" class="borderless-input new-contact-number" value="' + contact.contact_number + '">',
                                "email": '<input type="text" class="borderless-input new-contact-email" value="' + contact.email + '">',
                                "label": '<input type="text" class="borderless-input new-contact-label" value="' + contact.label + '">'
                            }).draw(false);
                        }
                        contactsTable.draw();
                    }
                });
            });
        });

        $("#client-table").on('click', '.delete-action', function () {
            let data = clientTable.row($(this).parents('tr')).data();
            showPrompt("Delete Client",
                "Are you sure you want to delete the selected client (<b>" + data.company_name + " - " + data.branch + "</b>)?",
                function() {
                    deleteClient(data.id, function() {
                        let name = data.company_name;
                        let branch = data.branch;
                        clientTable.ajax.reload();
                        showMessage("Status", "Successfully deleted the client (<b>" + name + " - " + branch + "</b>)");
                    });
                });
        });

        // Modify client modal functions
        $('.company-dropdown').dropdown({
            allowTab: false
        });
        
        $(".company-dropdown").change(function() {
            let selectedCompany = $(this).dropdown("get value");
            if(selectedCompany === "new") {
                $("#new-company").attr("disabled", null);
            } else {
                $("#new-company").val("").attr("disabled", "");
            }
        });

        $("#contacts-table").on('click', '.delete-action', function () {
            let row = $(this).parents('tr');
            let data = contactsTable.row(row).data();
            if(data.id === 0) {
                contactsTable.row(row).remove().draw();
            } else {
                data.id *= -1;
                row.hide();
            }
        });

        $(".add-new-contact").click(function() {
            contactsTable.row.add({
                "id": 0,
                "contact_name": '<input type="text" class="borderless-input new-contact-name">',
                "contact_number": '<input type="text" class="borderless-input new-contact-number">',
                "email": '<input type="text" class="borderless-input new-contact-email">',
                "label": '<input type="text" class="borderless-input new-contact-label">'
            }).draw(false);
        });
        
        $(".add-client-submit").click(function() {
            let client = {};

            // save client
            client["company"] = $(".company-dropdown").dropdown("get value");
            client["companyOther"] = $("#new-company").val();
            client["branch"] = $("#branch").val();
            client["address"] = $("#address").val();
            
            // save contacts
            let contacts = [];
            let contactNames = $.map($(".new-contact-name"), c => c.value);
            let contactNumbers = $.map($(".new-contact-number"), c => c.value);
            let contactEmails = $.map($(".new-contact-email"), c => c.value);
            let contactLabels = $.map($(".new-contact-label"), c => c.value);

            for(let i = 0; i < contactNames.length; i++) {
                let contact = {
                    name: contactNames[i],
                    number: contactNumbers[i],
                    email: contactEmails[i],
                    label: contactLabels[i]
                };
                contacts.push(contact);
            }

            addClient(client, function(client) {
                for(let i = 0; i < contacts.length; i++) {
                    let contact = contacts[i];
                    contact.client_id = client.id;
                    addContact(contact, (contact) => console.log(contact));
                }
                clientTable.ajax.reload();
                showMessage("Status", "Successfully added the client (<b>" + client.company_name + " - " + client.branch + "</b>)");
            });
        });

        $(".update-client-submit").click(function() {
            let client = {};

            // save client
            client["id"] = currentClient;
            client["company"] = $(".company-dropdown").dropdown("get value");
            client["companyOther"] = $("#new-company").val();
            client["branch"] = $("#branch").val();
            client["address"] = $("#address").val();
            
            // save contacts
            let contacts = [];
            let contactIds = contactsTable.column(0).data();
            console.log(contactIds);
            let contactNames = $.map($(".new-contact-name"), c => c.value);
            let contactNumbers = $.map($(".new-contact-number"), c => c.value);
            let contactEmails = $.map($(".new-contact-email"), c => c.value);
            let contactLabels = $.map($(".new-contact-label"), c => c.value);

            for(let i = 0; i < contactNames.length; i++) {
                let contact = {
                    id: contactIds[i],
                    name: contactNames[i],
                    number: contactNumbers[i],
                    email: contactEmails[i],
                    label: contactLabels[i]
                };
                contacts.push(contact);
            }

            updateClient(client, function(client) {
                for(let i = 0; i < contacts.length; i++) {
                    let contact = contacts[i];
                    contact.client_id = client.id;
                    if(contact.id == 0) {
                        addContact(contact, (contact) => console.log(contact));
                    } else if(contact.id > 0) {
                        updateContact(contact, (contact) => console.log(contact));
                    } else {
                        deleteContact(contact.id * -1, (contact) => console.log(contact));
                    }
                }
                clientTable.ajax.reload();
                showMessage("Status", "Successfully added the client (<b>" + client.company_name + " - " + client.branch + "</b>)");
            });
        });

        $(".modify-client-box").modal({
            onHide: function (){
                // Reset client fields
                $(".company-dropdown").dropdown("restore defaults");
                $(".company-dropdown > .dropdown.icon").show();
                $("#new-company").val("");
                $("#new-company").attr("disabled", "");
                $("#branch").val("");
                $("#address").val("");

                // Reset fields
                $(".company-dropdown").removeClass("disabled");
                $("#branch").attr("readonly", null);
                $("#address").attr("readonly", null);

                // Reset contacts table
                contactsTable.rows().remove().draw();
            }
        });
    });
</script>
@endsection