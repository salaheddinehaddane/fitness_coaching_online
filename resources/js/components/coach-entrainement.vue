<template>
        <div class="content-body">
            <div class="container-fluid">
                <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h4>Ajouter un entrainement</h4>
                           <a @click="clean()" data-toggle="modal" data-target="#basicModal" class="plus-icon text-white rounded bg-primary"><i class="las la-plus scale-2"></i></a>

                       </div>
                   </div>
                </div>
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List des entrainement</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Exercice</th>
                                                <th>Cible</th>
                                                <th>Type</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr v-for="entrainement in entrainements" :key="entrainement.id">
                                                <td> {{entrainement.name}} </td>
                                                <td> {{entrainement.cible}} </td>
                                                <td> {{entrainement.type}} </td>
                                                <td>
                                                    <div>
                                                       <button href="#" class="btn btn-primary shadow btn-xs sharp mr-1" @click="getEntrainement(entrainement.id)" data-toggle="modal" data-target="#basicModal"><i class="fa fa-pencil"></i></button>
                                                        <button href="#" class="btn btn-danger shadow btn-xs sharp" @click="Delete(entrainement.id)" ><i class="fa fa-trash"></i></button>
                                                    </div>
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
                                                    <button type="button"  class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Exercice</label>
                                                            <input v-model="entrainement.name" type="text" class="form-control"  placeholder="Intitulé de l'entrainement">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Cible</label>
                                                            <input v-model="entrainement.cible" type="text" class="form-control"  placeholder="Cible de l'entrainement">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Type</label>
                                                            <input v-model="entrainement.type" type="text" class="form-control"  placeholder="Type de l'entrainement">
                                                        </div>


                                                        </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                                                    <button v-if="!updating" type="button" class="btn btn-primary" @click="store()">Enregistrer</button>
                                                    <button v-if="updating"  type="button" @click="update(entrainement.id)" class="btn btn-warning">Update </button>
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
                success:'',
                updating:false,
                entrainement:{
                    id:0,
                    name:'',
                    cible:'',
                    type:'',
                    id_coach: localStorage.getItem('id'),
                },
                entrainements:[],
                id_coach: localStorage.getItem('id'),
            }
        },
        mounted() {
            // this.DataTable();
            // this.getItems();
            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
            this.getEntrainements();
        },
    methods: {
         clean(){
            this.updating=false;
            this.nutrition.name='';
            this.nutrition.calorie='';
            this.nutrition.glucide='';
            this.nutrition.protein='';
        },
        popUp1(){
            this.$toaster.success('Inséré avec succès');
        },
        popUp2(){
            this.$toaster.error('Supprimé avec succès');
        },
        Delete(id){
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
                axios.delete('/api/delete-entrainement/'+id)
                .then(res=>{
                this.getEntrainements();
                this.popUp2();
            })
            .catch(err=> console.log('this is the error: '+err));
                Swal.fire(
                'Suprrimé!',
                'Entrainement est supprimé',
                'Supprimé'
                )
                }
            })
        },
        getEntrainement(id){
            axios.get('/api/get-ent/'+id)
            .then(res=>{
                this.entrainement = res.data;
                this.updating=true;
            })
        },
        getEntrainements(id_coach){
            axios.get('/api/get-entrainements/' + this.id_coach)
            .then(res=>{
                $(document).ready(function() {
                $('#myTable').DataTable();
                });
                this.entrainements=res.data;
            })
            .catch(err=>console.log('this is the error: '+err))
        },
        store(){
            axios.post('/api/store-entrainement',this.entrainement)
            .then(res=>{
                this.entrainement.name="";
                this.entrainement.cible="";
                this.entrainement.type="";
                this.getEntrainements();
                this.popUp1();
            })
            .catch(err=> console.log('this is the error: '+err))
        },
        passe(id,name,cible){
            this.id=id;
            this.entrainement.name = name;
            this.entrainement.cible = cible;
        },
        update(id){
            axios.put('/api/update-entrainement/'+id,this.entrainement)
            .then(res=>{
                 this.getEntrainements();
                 this.entrainement.name='';
                 this.entrainement.cible='';
                 this.entrainement.type='';
                 this.updating=false;
            })
            .catch(err=> console.log('this is the error: '+err))
        },

    },

    }

</script>

<style scoped>
td,th{
    text-align: center;
}
</style>
