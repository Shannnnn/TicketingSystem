// Client API Calls
let addClient = function(client, callback) {
    $.post("api/clients/add", client, function(data) {
        callback(data);
    });
};

let updateClient = function(client, callback) {
    $.post("api/clients/update", client, function(data) {
        callback(data);
    });
};

let deleteClient = function(id, callback) {
    $.get("api/clients/delete/" + id, function(data) {
        callback(data);
    });
};

let getAllCompanies = function(callback) {
    $.get("api/client/companies", function(data) {
        callback(data);
    });
};

// Contact API Calls
let getContacts = function(id, callback) {
    $.get("api/contacts/" + id, function(data) {
        callback(data);
    });
};

let addContact = function(contact, callback) {
    $.post("api/contacts/add", contact, function(data) {
        callback(data);
    });
};

let updateContact = function(contact, callback) {
    $.post("api/contacts/update", contact, function(data) {
        callback(data);
    });
};

let deleteContact = function(id, callback) {
    $.get("api/contacts/delete/" + id, function(data) {
        callback(data);
    });
};

// Ticket API Calls
let getTickets = function(id, callback) {
    $.get("api/tickets/" + id, function(data) {
        callback(data);
    });
};

let closeTicket = function(id, callback) {
    $.post("/tickets/" + id, function (data) {
        callback(data);
    });
};