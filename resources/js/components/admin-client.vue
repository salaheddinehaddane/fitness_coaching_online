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
                                        <th>Coach</th>
                                        <th>Supprimer ce compte</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in items" :key="item.id">
                                        <td> {{item.nameCl}} </td>

                                        <td>
                                            {{item.nameCo}}
                                        </td>
                                        <td>
                                            <button @click="Delete(item.id)" class="btn btn-danger shadow btn-xs sharp"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un entrainement</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Intitulé</label>
                                <input type="text" class="form-control" placeholder="Intitulé de l'entrainement">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Description</label>
                                <textarea style="height:150px" class="form-control" placeholder="Brief description... ">
                                                            </textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Type</label>
                                <select name="" id="" class="form-control">
                                    <option value="Course">Course</option>
                                    <option value="Youga">Youga</option>
                                    <option value="Fitness">Fitness</option>
                                    <option value="Cardio">Cardio</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Large Modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Client</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Choisir un autre

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Sortir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Large Modal 2 -->


        <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Plan de semain</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Sortir</button>
                        <button type="button" class="btn btn-primary">Enregistrer</button>
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
                items:[]
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
        DataTable(){
          $(document).ready(function() {
          $('#myTable').DataTable();
                });
        },
        Delete(id) {
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
                            Swal.fire(
                                'Suprrimé!',
                                'Client est supprimé',
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
            axios.get('/api/clients')
            .then(res=>{
                this.items=res.data;
                $(document).ready(function() {
                $('#myTable').DataTable();
                });
                })
            .catch(err=>console.log(err));
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
