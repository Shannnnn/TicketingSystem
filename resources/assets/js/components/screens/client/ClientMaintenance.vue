<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Client Management</div>

                    <div class="panel-body">
                        <div class="toolbar">
                            <button class="btn btn-primary">Add Client</button>
                        </div>

                        <filter-bar></filter-bar>
                        <vuetable ref="vuetable"
                            api-url="http://localhost:8000/api/clients"
                            :fields="fields"
                            pagination-path=""
                            :muti-sort="true"
                            :sort-order="sortOrder"
                            :append-params="moreParams"
                            @vuetable:pagination-data="onPaginationData"
                        ></vuetable>
                        <div class="vuetable-pagination ui basic segment grid">
                            <vuetable-pagination-info ref="paginationInfo"
                            ></vuetable-pagination-info>

                            <vuetable-pagination ref="pagination"
                                @vuetable-pagination:change-page="onChangePage"
                            ></vuetable-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable';
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo';
    import CustomActions from '../../table/CustomActions.vue';
    import FilterBar from '../../table/FilterBar.vue';
    import Vue from 'vue';
    import VueEvents from 'vue-events';

    Vue.use(VueEvents);

    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            CustomActions,
            FilterBar
        },
        data() {
            return {
                fields: [
                    {
                        name: 'id',
                        title: 'ID',
                        sortField: 'id'
                    },
                    {
                        name: 'company_name',
                        title: 'Company',
                        sortField: 'company_name'
                    },
                    {
                        name: 'branch',
                        title: 'Branch',
                        sortField: 'branch'
                    },
                    {
                        name: 'address',
                        title: 'Address',
                        sortField: 'address'
                    },
                    {
                        name: '__component:custom-actions',
                        title: 'Actions',
                        titleClass: 'center aligned',
                        dataClass: 'center aligned'
                    }
                ],
                  sortOrder: [
                    {
                      field: 'company_name',
                      sortField: 'company_name',
                      direction: 'asc'
                    }
                  ],
                  moreParams: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.$events.$on('filter-set', eventData => this.onFilterSet(eventData))
            this.$events.$on('filter-reset', e => this.onFilterReset())
        },
        methods: {
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page)
            },
            onFilterSet(filterText) {
                this.moreParams = {
                    'filter': filterText
                }
                Vue.nextTick( () => this.$refs.vuetable.refresh())
            },
            onFilterReset() {
                this.moreParams = {}
                Vue.nextTick( () => this.$refs.vuetable.refresh())
            }
        }
    }
</script>
