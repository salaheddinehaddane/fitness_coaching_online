<template>
        <div class="content-body">
            <div class="container-fluid">
                <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h4>Ajouter une nutrition</h4>
                           <a @click="clean()" data-toggle="modal" data-target="#basicModal" class="plus-icon text-white rounded bg-primary"><i class="las la-plus scale-2"></i></a>

                       </div>
                   </div>
                </div>
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List des nutritions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Intitulé</th>
                                                <th>Calories</th>
                                                <th>Glucide</th>
                                                <th>Protein</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr v-for="nutrition in nutritions" :key="nutrition.id">
                                                <td> {{nutrition.name}}</td>
                                                <td> {{nutrition.calorie}} mg</td>
                                                <td> {{nutrition.glucide}} mg</td>
                                                <td> {{nutrition.protein}} mg</td>
                                                <td>
                                                    <div>
                                                       <button @click="getNut(nutrition.id)" href="#" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#basicModal"><i class="fa fa-pencil"></i></button>
                                                        <button href="#" class="btn btn-danger shadow btn-xs sharp" @click="Delete(nutrition.id)" ><i class="fa fa-trash"></i></button>
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
                                                    <h5 class="modal-title">Ajouter une nutrition</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Intitulé</label>
                                                            <input v-model="nutrition.name" type="text" class="form-control"  placeholder="Intitulé de l'entrainement">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Calories (mg)</label>
                                                            <input v-model="nutrition.calorie" type="number" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Glucide (mg)</label>
                                                            <input v-model="nutrition.glucide" type="number" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Protein (mg)</label>
                                                            <input v-model="nutrition.protein" type="number" class="form-control"  >
                                                        </div>


                                                        </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                                                    <button v-if="!updating" @click="store()" type="button" class="btn btn-primary">Enregistrer</button>
                                                    <button v-if="updating" @click="update(nutrition.id)" type="button" class="btn btn-warning">Update</button>
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
                items:[],
                updating:false,
                nutritions:[],
                nutrition:
                  {  id:0,
                    name:'',
                    calorie:'',
                    glucide:'',
                    protein:'',
                    id_coach:localStorage.getItem('id'),
                    },
                    id:localStorage.getItem('id'),

            }
        },
        mounted() {
            // this.DataTable();
            // this.getItems();
            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
            this.getNutrition();
        },
    methods: {
        clean(){
            this.updating=false;
            this.nutrition.name='';
            this.nutrition.calorie='';
            this.nutrition.glucide='';
            this.nutrition.protein='';
        },
        Delete(id){
            Swal.fire({
            title: 'êtes-vous sûr?',
            text: "Supprimer la de façon permanent",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#19647E',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non'
            }).then((result) => {
            if (result.isConfirmed) {
                 axios.delete('/api/delete-nutrition/'+id)
                .then(res=>{
                this.getNutrition();
                     })
                .catch(err=>console.log('this is the error: '+err));
                Swal.fire(
                'Supprimé!',
                'Nutrition est supprimé',
                'Supprimé',
                )
                }
            })
        },
        getNutrition(){
            axios.get('/api/get-nutrition/'+this.id)
            .then(res=>{
                 $(document).ready(function() {
                 $('#myTable').DataTable();
                });
                this.nutritions=res.data;
            })
            .catch(err=>console.log('this is the error: '+err));
        },
        store(){
            axios.post('/api/store-nutrition',this.nutrition)
            .then(res=>{
                this.getNutrition()
                this.updating=false;
                this.nutrition.name='';
                this.nutrition.calorie='';
                this.nutrition.glucide='';
                this.nutrition.protein='';
            })
            .catch(err=>console.log('this is the error: '+err));
        },
        getNut(id){
            axios.get('/api/get-nut/'+id)
            .then(res=>{
                this.updating=true;
                this.nutrition=res.data;

            })
            .catch(err=>console.log('this is the error: '+err));
        },
        update(id){
            this.updating=true;
            axios.put('/api/update-nutrition/'+id,this.nutrition)
            .then(res=>{
                this.getNutrition();
                this.updating=false;
                this.nutrition.name='';
                this.nutrition.calorie='';
                this.nutrition.glucide='';
                this.nutrition.protein='';
            })
            .catch(err=>console.log('this is the error: '+err));
        }

    },
    }

</script>
<style scoped>
td,th{
    text-align: center;
}
</style>


