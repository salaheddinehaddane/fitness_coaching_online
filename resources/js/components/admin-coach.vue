<template>
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List des coachs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Nom complete</th>
                                        <th>Date fin de l'abonnement</th>
                                        <th>Ses clients</th>
                                        <th>Supprimer ce compte</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in items" :key="item.id">
                                        <td> {{item.name}} </td>
                                        <td> {{item.date_fin}} </td>
                                        <td>
                                            <button type="button" @click="getClients(item.id)" data-toggle="modal"
                                                data-target=".bd-example-modal-lg2"
                                                class="btn btn-sm btn-rounded btn-info"><span
                                                    class="btn-icon-left text-info"><i
                                                        class="fa fa-info color-info"></i>
                                                </span>Voir</button>
                                        </td>
                                        <td>
                                            <button href="#" class="btn btn-danger shadow btn-xs sharp"
                                                @click="Delete(item.id,item.id_payement)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Large Modal 2 -->


        <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">List de ses clients</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nom complete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="client in clients" :key="client.id">
                                    <td v-if="full"> {{client.nameCl}}</td>
                                    <td v-else>Pas de client </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button @click="clean()" type="button" class="btn btn-danger light"
                            data-dismiss="modal">Sortir</button>
                    </div>
                </div>
            </div>
        </div>








    </div>
</template>
<script>
import axios from "axios";
    export default {
        data(){
            return{
                full:false,
                items:[],
                clients:[],
            }
        },
        mounted() {
           if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
            // this.DataTable();
            this.getItems();
        },
    methods: {
        clean(){
            this.full=false;
        },

        Delete(id_coach,id_paymenet){
            Swal.fire({
            title: 'êtes-vous sûr?',
            text: "Supprimer le de façon permanente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#19647E',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non'
            }).then((result) => {
            if (result.isConfirmed) {
                axios("/api/delete_coach/"+id_coach+"/"+id_paymenet)
                .then(res=>{
                    Swal.fire(
                        'Suprrimé!',
                        'Coach est supprimé',
                        'Supprimé'
                    );
                    this.getItems()
                    }
                    )
                .catch;

                }
            })
        },
        getItems(){
            axios.get('/api/coachs')
            .then(res=>{
                this.items=res.data;
                $(document).ready(function() {
                $('#myTable').DataTable();
                });
                })
            .catch(err=>console.log(err));
        },
        getClients(id){
            axios.get('/api/clients_de_coach/'+id)
            .then(res=>{
                this.clients=res.data
                if(this.clients.length != 0)
                this.full=true;
            })
            .catch();
        }

    },
    }

</script>

<style scoped>
    td,th{
        text-align: center;
    }
    .lt{
        background-color: #F3F3F3;
        padding:20px;
        border-radius: 20px;
    }
</style>
