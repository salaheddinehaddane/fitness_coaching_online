<template>
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List des clients</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Nom complete</th>
                                        <th>Adresse email</th>
                                        <th>No Téléphone</th>
                                        <th>Formats physique</th>
                                        <th>Abonnement</th>
                                        <th>Valider</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="coach in coachs" :key="coach.id">
                                        <td> {{coach.name}} </td>
                                        <td> {{coach.email}} </td>
                                        <td> {{coach.No_tel}} </td>
                                        <td> <button type="button"
                                                @click="getClient(coach.id)"
                                                data-toggle="modal" data-target=".bd-example-modal-lg"
                                                class="btn btn-sm btn-rounded btn-primary"><span
                                                    class="btn-icon-left text-primary"><i class="fa fa-info"></i>
                                                </span>Voir</button> </td>
                                                <td>
                                                    <select v-model="abonnement">
                                                        <option  :value="1">3 mois</option>
                                                        <option :value="2">6 mois</option>
                                                        <option :value="3">12 mois</option>
                                                    </select>
                                                </td>

                                        <td>
                                            <button @click="validerCo(coach.id,coach.id_abonnement)" class="btn btn-xs btn-primary">
                                                Valider
                                            </button>
                                            <button @click="DeleteCo(coach.id)" class="btn btn-xs btn-danger ml-2">
                                                Refuser
                                            </button>
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Client</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                                class="la la-user mr-2"></i> Profile</a>
                                    </li>
                                </ul>
                                <div v-for="cl in clients" :key="cl.id" class="tab-content">

                                    <div class="tab-pane fade active show" id="profile">
                                        <div class="pt-4">
                                            <div class="lt">
                                                <h5 class="text-center">Format physique dès l'inscription :</h5>
                                                <table class="table mx-auto" style="width:50%">
                                                    <tr>
                                                        <th>
                                                            Taille :
                                                        </th>
                                                        <td>{{cl.taille_initial}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Poids :
                                                        </th>
                                                        <td>{{cl.poid_initial}} Kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Poitrine :
                                                        </th>
                                                        <td>{{cl.poitrine_initial}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Bras :
                                                        </th>
                                                        <td>{{cl.bras_initial}} cm</td>
                                                    </tr>

                                                </table>
                                                <div class="text-center">
                                                    <h5>Format physique souhaité : <br><br> <strong>{{cl.name_cible}}</strong></h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Sortir</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>

</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            items: [],
            coachs: [],
            clients:[],
            abonnement:0
        }
    },
    mounted() {
        if (localStorage.getItem('id') == null) {
            window.location.href = '/';
        }
        // this.DataTable();
        this.getCoachs();
    },
    methods: {
        DataTable() {
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        },

        DeleteCo(id) {
            console.log(id)
            Swal.fire({
                title: 'êtes-vous sûr?',
                text: "Supprimer le de façon permanent",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#19647E',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios("/api/delete_client/" + id)
                        .then(res => {
                            Swal.fire({
                                icon:'success',
                                text:'Suprrimé!'}

                            );
                            this.getCoachs()
                        }
                        )
                        .catch;
                }
            })
        },

        getCoachs() {
            axios.get('/api/client_pending/'+localStorage.getItem('id'))
                .then(res => {
                    this.coachs = res.data;
                    $(document).ready(function () {
                        $('#myTable').DataTable();
                    });
                })
                .catch(err => console.log(err));
        },
        getClient(id) {
            axios.get('/api/client_pending2/'+id)
                .then(res => {
                    this.clients = res.data;
                    $(document).ready(function () {
                        $('#myTable').DataTable();
                    });
                })
                .catch(err => console.log(err));
        },
        validerCo(id_client){
            axios.get("/api/valider_client/"+id_client+"/"+this.abonnement)
            .then(res=>
            {
                Swal.fire({
                    icon: 'success',
                    text: 'Accepté!'
                }

                );
                this.getCoachs()
                    }
                )
            .catch(err=>console.log(err));
        },


    },
}

</script>

<style scoped>
td,
th {
    text-align: center;
}

.lt {
    background-color: #fcf8f8;
    padding: 20px;
    border-radius: 20px;
}
</style>
