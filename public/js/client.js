Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

  el: '#manage-vue',

  data: {
    clients: [],
    contacts: [],
    sortKey: 'company_name',
    reverse: false,
    search: '',
    columns: ['company_name', 'branch', 'address'],
    pagination: {
        total: 0,
        per_page: 2,
        from: 1,
        to: 0,
        current_page: 1
      },
    currentShowClient: -1,
    currentClient: -1,
    offset: 4,
    formErrors:{},
    formErrorsUpdate:{},
    newClient : {'company_name':'','branch':'','address':''},
    fillClient : {'company_name':'','branch':'','address':'','id':''},
    newContact : {'contact_name':'','contact_number':'','email':'','label':'','client_id':''},
    fillContact : {'contact_name':'','contact_number':'','email':'','label':'','client_id':'','id':''}
  },

  computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

  ready : function(){
  		this.getVueClients(this.pagination.current_page);
        this.getVueContacts();
  },

  methods : {

        getVueClients: function(page){
          this.$http.get('/vueclients?page='+page).then((response) => {
            this.$set('clients', response.data.data.data);
            this.$set('pagination', response.data.pagination);
          });
        },

        getVueContacts: function(){
          this.$http.get('/vuecontacts').then((response) => {
            this.$set('contacts', response.data);
          });
        },

        sortBy: function(sortKey) {
            this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;
            this.sortKey = sortKey;
        },

        add: function(id){
            console.log(id);
            this.currentClient = id;
        },

        createClient: function(){
		  var input = this.newClient;
		  //$("#create-client").modal('show');
          this.$http.post('/vueclients',input).then((response) => {
		    this.changePage(this.pagination.current_page);
			//$("#create-client").modal('hide');
            //alert(this.lastClientId);
            //this.showClient(input,this.lastClientId);
            this.newClient = {'company_name':'','branch':'','address':''};
            toastr.success('Client Created Successfully.', 'Success Alert', {timeOut: 5000});
		  }, (response) => {
			this.formErrors = response.data;
	    });
	},

        createContact: function(){
		  var input = this.newContact;
            input.client_id = this.currentClient;
		  this.$http.post('/vuecontacts',input).then((response) => {
            $("#show-client").modal('hide');
			this.newContact = {'contact_name':'','contact_number':'','email':'','label':''};
            toastr.success('Contact Created Successfully.', 'Success Alert', {timeOut: 5000});
            $('#create-contact').on('hidden.bs.modal', function () {
                window.location.reload(true);
            })
		  }, (response) => {
			this.formErrors = response.data;
	    });
	},

      deleteClient: function(client){
        this.$http.delete('/vueclients/'+client.id).then((response) => {
            this.changePage(this.pagination.current_page);
            toastr.success('Client Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
      },

      deleteContact: function(contact){
        this.$http.delete('/vuecontacts/'+contact.id).then((response) => {
            this.changePage(this.pagination.current_page);
            toastr.success('Contact Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
      },

      editClient: function(client){
          this.fillClient.company_name = client.company_name;
          this.fillClient.id = client.id;
          this.fillClient.branch = client.branch;
          this.fillClient.address = client.address;
          $("#edit-client").modal('show');
      },

      showClient: function(client,key){
          this.fillClient.company_name = client.company_name;
          this.fillClient.id = client.id;
          this.fillClient.branch = client.branch;
          this.fillClient.address = client.address;
          this.currentShowClient = key;
          $("#show-client").modal('show');
      },

      updateClient: function(id){
        var input = this.fillClient;
        this.$http.put('/vueclients/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillClient = {'company_name':'','branch':'','address':'','id':''};
            $("#edit-client").modal('hide');
            toastr.success('Client Updated Successfully.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },

      changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueClients(page);
      }
  }

});