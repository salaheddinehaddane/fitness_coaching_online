<template>
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List des mes clients</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Nom complete</th>
                                        <th>Ses informations</th>
                                        <th>Plan de semaine</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="client in clients" :key="client.id">
                                        <td>
                                            {{client.name}}
                                            <!-- <button type="button" class="btn btn-danger mb-2  mr-2" id="toastr-danger-top-right">Error</button> -->
                                        </td>
                                        <td>
                                            <button type="button" @click.prevent="getClient(client.id)"
                                                data-toggle="modal" data-target=".bd-example-modal-lg"
                                                class="btn btn-sm btn-rounded btn-primary"><span
                                                    class="btn-icon-left text-primary"><i class="fa fa-info"></i>
                                                </span>Voir</button>
                                        </td>
                                        <td v-if="true">
                                            <button type="button" @click="getNutritionByCoach(client.id)"
                                                data-toggle="modal" data-target=".bd-example-modal-lg2"
                                                class="btn btn-sm btn-rounded btn-info"><span
                                                    class="btn-icon-left text-info"><i
                                                        class="fa fa-plus color-info"></i>
                                                </span>Ajouter</button>
                                        </td>
                                        <td v-else>
                                            <button type="button"
                                                class="btn btn-sm btn-rounded btn-info"><span
                                                    class="btn-icon-left text-info"><i
                                                        class="fa fa-plus color-info"></i>
                                                </span>Ajouter</button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- <div v-for="(d,i) in nut" :key="i">
                        <input type="text" v-model="d.id_nutrition">
                        <input type="text" v-model="d.repas"><br>
                        <button @click="test()" > add  </button>

                    </div> -->


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

                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <!-- <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Home</a>
                                        </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                                class="la la-user mr-2"></i> Profile</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#formatCible"><i
                                                class="la la-tripadvisor mr-2"></i> Format cible</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Suivie"><i
                                                class="la la-eye mr-2"></i> Evolution</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Bilan"><i
                                                class="la la-calendar-check-o mr-2"></i> Bilan Hebdomadaire</a>
                                    </li>
                                </ul>
                                <div v-for="cl in client" :key="cl.id" class="tab-content">

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
                                    <!-- <div class="tab-pane fade" id="formatCible">
                                        <div class="pt-4">
                                            <div class="lt">
                                                <h4 class="text-center" >{{cl.name}}</h4>
                                                <table class="table mx-auto" style="width:50%">
                                                    <tr>
                                                        <th>
                                                            Poids:
                                                        </th>
                                                        <td>{{cl.poid_cible}} kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Poitrine
                                                        </th>
                                                        <td>{{cl.poitrine_cible}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Bra
                                                        </th>
                                                        <td>{{cl.bras_cible}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Cuisse
                                                        </th>
                                                        <td>{{cl.cuisse_cible}} cm</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="tab-pane fade" id="Bilan">
                                        <div class="pt-4">
                                            <div class="lt">
                                                <h4 class="text-center">Date: {{cl.date_hebdo}}</h4>
                                                <table class="table mx-auto" style="width:70%">
                                                    <tr>
                                                        <th>
                                                            Les entrainement:
                                                        </th>
                                                        <td>{{cl.entrainement}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Les alimentations
                                                        </th>
                                                        <td>{{cl.nutrition}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Mes sensations
                                                        </th>
                                                        <td>{{cl.sensation}}</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Suivie">
                                        <div class="pt-4">
                                            <div class="lt">
                                                <h4 class="text-center">Date: {{cl.date_hebdo}}</h4>
                                                <h4 class="text-center">Evolution</h4>
                                                <table class="table mx-auto" style="width:50%">
                                                    <tr>
                                                        <th>
                                                            Poids:
                                                        </th>
                                                        <td>{{cl.poid_evolution}} Kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Poitrine
                                                        </th>
                                                        <td>{{cl.poitrine_evolution}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Bra
                                                        </th>
                                                        <td>{{cl.bras_evolution}} cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Cuisse
                                                        </th>
                                                        <td>{{cl.cuisse_evolution}} cm</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="Suivie">
                                            <div class="pt-4">
                                               <div class="lt">
                                                   <h4 class="text-center" >Date: 05/05/2022</h4>
                                                        <table class="table mx-auto" style="width:70%">
                                                            <tr>
                                                                <th>
                                                                    Les entrainement:
                                                                </th>
                                                                <td>J'ai effectué presque toute mes entrainements</td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Les alimentations
                                                                </th>
                                                                <td>J'ai suivie le plan à la lettre </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Mes sensations
                                                                </th>
                                                                <td>Je me sens bien, le programme me va</td>
                                                            </tr>

                                                        </table>
                                                   <h4 class="text-center" >Date: 05/05/2022</h4>
                                                        <table class="table mx-auto" style="width:70%">
                                                            <tr>
                                                                <th>
                                                                    Les entrainement:
                                                                </th>
                                                                <td>J'ai effectué presque toute mes entrainements</td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Les alimentations
                                                                </th>
                                                                <td>J'ai suivie le plan à la lettre </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Mes sensations
                                                                </th>
                                                                <td>Je me sens bien, le programme me va</td>
                                                            </tr>

                                                        </table>
                                                   <h4 class="text-center" >Date: 05/05/2022</h4>
                                                        <table class="table mx-auto" style="width:70%">
                                                            <tr>
                                                                <th>
                                                                    Les entrainement:
                                                                </th>
                                                                <td>J'ai effectué presque toute mes entrainements</td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Les alimentations
                                                                </th>
                                                                <td>J'ai suivie le plan à la lettre </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Mes sensations
                                                                </th>
                                                                <td>Je me sens bien, le programme me va</td>
                                                            </tr>

                                                        </table>
                                                   <h4 class="text-center" >Date: 05/05/2022</h4>
                                                        <table class="table mx-auto" style="width:70%">
                                                            <tr>
                                                                <th>
                                                                    Les entrainement:
                                                                </th>
                                                                <td>J'ai effectué presque toute mes entrainements</td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Les alimentations
                                                                </th>
                                                                <td>J'ai suivie le plan à la lettre </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Mes sensations
                                                                </th>
                                                                <td>Je me sens bien, le programme me va</td>
                                                            </tr>

                                                        </table>
                                                   <h4 class="text-center" >Date: 05/05/2022</h4>
                                                        <table class="table mx-auto" style="width:70%">
                                                            <tr>
                                                                <th>
                                                                    Les entrainement:
                                                                </th>
                                                                <td>J'ai effectué presque toute mes entrainements</td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Les alimentations
                                                                </th>
                                                                <td>J'ai suivi le plan à la lettre </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Mes sensations
                                                                </th>
                                                                <td>Je me sens bien, le programme me va</td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                            </div>
                                        </div> -->
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Sortir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Large Modal 2 -->


            <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Plan de semain</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <!-- <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Home</a>
                                        </li> -->

                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#lundi"><i
                                                class="la la-calendar-check-o mr-2"></i>Lundi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#mardi"><i
                                                class="la la-calendar-check-o mr-2"></i>Mardi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#mercredi"><i
                                                class="la la-calendar-check-o mr-2"></i>Mercredi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#jeudi"><i
                                                class="la la-calendar-check-o mr-2"></i>Jeudi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#vendredi"><i
                                                class="la la-calendar-check-o mr-2"></i>Vendredi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#samedi"><i
                                                class="la la-calendar-check-o mr-2"></i>Samedi</a>
                                    </li>

                                </ul>
                                <div class="tab-content">

                                    <div class="tab-pane fade active show" id="lundi">
                                        <div class="pt-4">
                                            <div class="row mt-1">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row" v-for="(input,index1) in plan_nut[0][0]"
                                                        :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_lundi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[0][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_lundi(index1)"
                                                                    v-if="index1 == plan_nut[0][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[0][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_lundi(index2)"
                                                                    v-if="index2 || ( !index2 && plan_nut[0][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_lundi(index2)"
                                                                    v-if="index2 == plan_nut[0][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[0][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_lundi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[0][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_lundi(index3)"
                                                                    v-if="index3 == plan_nut[0][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row" v-for="(input3,index4) in plan_ent[0]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_lundi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_lundi(index4)"
                                                                    v-if="index4 == plan_ent[0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="mardi">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row" v-for="(input,index1) in plan_nut[1][0]"
                                                        :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_mardi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[1][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_mardi(index1)"
                                                                    v-if="index1 == plan_nut[1][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[1][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_mardi(index2)"
                                                                    v-if="index2 || (!index2 && plan_nut[1][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_mardi(index2)"
                                                                    v-if="index2 == plan_nut[1][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[1][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_mardi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[1][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_mardi(index3)"
                                                                    v-if="index3 == plan_nut[1][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row" v-for="(input3,index4) in plan_ent[1]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_mardi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_mardi(index4)"
                                                                    v-if="index4 == plan_ent[1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="mercredi">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row" v-for="(input,index1) in plan_nut[2][0]"
                                                        :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_mercredi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[2][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_mercredi(index1)"
                                                                    v-if="index1 == plan_nut[2][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[2][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_mercredi(index2)"
                                                                    v-if="index2 || ( !index2 && plan_nut[2][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_mercredi(index2)"
                                                                    v-if="index2 == plan_nut[2][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[2][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_mercredi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[2][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_mercredi(index3)"
                                                                    v-if="index3 == plan_nut[2][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row"
                                                        v-for="(input3,index4) in plan_ent[2]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_mercredi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_mercredi(index4)"
                                                                    v-if="index4 == plan_ent[2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="jeudi">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row" v-for="(input,index1) in plan_nut[3][0]"
                                                        :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_jeudi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[3][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_jeudi(index1)"
                                                                    v-if="index1 == plan_nut[3][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[3][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_jeudi(index2)"
                                                                    v-if="index2 || ( !index2 && plan_nut[3][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_jeudi(index2)"
                                                                    v-if="index2 == plan_nut[3][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[3][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_jeudi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[3][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_jeudi(index3)"
                                                                    v-if="index3 == plan_nut[3][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row" v-for="(input3,index4) in plan_ent[3]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_jeudi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[3].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_jeudi(index4)"
                                                                    v-if="index4 == plan_ent[3].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="vendredi">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row"
                                                        v-for="(input,index1) in plan_nut[4][0]" :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_vendredi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[4][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_vendredi(index1)"
                                                                    v-if="index1 == plan_nut[4][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[4][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_vendredi(index2)"
                                                                    v-if="index2 || ( !index2 && plan_nut[4][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_vendredi(index2)"
                                                                    v-if="index2 == plan_nut[4][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[4][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_vendredi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[4][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_vendredi(index3)"
                                                                    v-if="index3 == plan_nut[4][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row"
                                                        v-for="(input3,index4) in plan_ent[4]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_vendredi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[4].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_vendredi(index4)"
                                                                    v-if="index4 == plan_ent[4].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="samedi">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Petit déjeuner</h3>
                                                    <div class="form-row"
                                                        v-for="(input,index1) in plan_nut[5][0]" :key="index1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove1_samedi(index1)"
                                                                    v-if="index1 || ( !index1 && plan_nut[5][0].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add1_samedi(index1)"
                                                                    v-if="index1 == plan_nut[5][0].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4"
                                                    style="border-left:1px black solid; border-right:1px black solid">
                                                    <h3 class="text-center mt-1 mb-4">Déjeuner</h3>
                                                    <div class="form-row" v-for="(input2,index2) in plan_nut[5][1]"
                                                        :key="index2 + 1">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input2.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>
                                                            <!-- <input type="text" class="form-control" id="inputPassword4" > -->
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input2.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                                    @click="remove2_samedi(index2)"
                                                                    v-if="index2 || ( !index2 && plan_nut[5][1].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add2_samedi(index2)"
                                                                    v-if="index2 == plan_nut[5][1].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h3 class="text-center mt-1 mb-4">Diner</h3>
                                                    <div class="form-row" v-for="(input3,index3) in plan_nut[5][2]"
                                                        :key="index3 + 2">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Nutrition</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id_nutrition">
                                                                <option v-for="nut in nutrition" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPassword4">g/unité</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.quantite">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove3_samedi(index3)"
                                                                    v-if="index3 || ( !index3 && plan_nut[5][2].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add3_samedi(index3)"
                                                                    v-if="index3 == plan_nut[5][2].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Entrainement</h3>
                                                    <div class="form-row" v-for="(input3,index4) in plan_ent[5]"
                                                        :key="index4 + 3">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Entrainement</label>
                                                            <select name="" id="" class="form-control"
                                                                v-model="input3.id">
                                                                <option v-for="nut in entrainement" :key="nut.id"
                                                                    :value="nut.id"> {{nut.name}} </option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Serie (Ex: 12-10-8-6)</label>
                                                            <input type="text" class="form-control creditCardText"
                                                                id="inputPassword4" v-model="input3.serie">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputPassword4">Temps de repos</label>
                                                            <input type="number" class="form-control"
                                                                id="inputPassword4" v-model="input3.temps">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Action</label><br>
                                                            <div class="d-flex mt-1">
                                                                <button class="btn btn-danger shadow btn-xs sharp "
                                                                    @click="remove4_samedi(index4)"
                                                                    v-if="index4 || ( !index4 && plan_ent[5].length > 1)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button class="btn btn-primary shadow btn-xs sharp ml-1"
                                                                    @click="add4_samedi(index4)"
                                                                    v-if="index4 == plan_ent[5].length-1">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" @click="clean()" class="btn btn-danger light"
                                data-dismiss="modal">Sortir</button>
                            <button type="button" @click="store()" class="btn btn-primary">Enregistrer</button>
                        </div>
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
            // let today = new Date('06/05/2022');
            // const l= new Date(today.getFullYear(), today.getMonth()+1, today.getDate() + 1);

            return{
                clients:[],
                client:[],
                nutrition:[],
                entrainement:[],
                id:localStorage.getItem('id'),
                plan_nut:[
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }],
                    ],
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }],
                    ],
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }],
                    ],
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }],
                    ],
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }],
                    ],
                    [
                        [{
                            id_nutrition:0,
                            quantite:"",
                            repas:1,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:2,
                        }],
                       [ {
                            id_nutrition:0,
                            quantite:"",
                            repas:3,
                        }]
                    ],
                    [
                            [
                                {
                                duppliquer: 0
                                }
                            ]
                    ]

                ],
                plan_ent:[
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                        {
                            id:0,
                            serie:"",
                            temps:"",
                        }
                    ],
                    [
                       {
                        duppliquer:0
                       }
                    ]
                ],
            }
        },
        mounted() {

            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
           this.getClients();
           this.addDash();
        //    this.tuto();
        },
    methods: {
            getEntrainement(){
            axios.get('/api/get-entrainements/' + this.id)
                .then(res => {
                    this.entrainement = res.data;
                })
                .catch()
            },
        getNutritionByCoach(idd){
            this.getEntrainement();
            localStorage.setItem("id_client", idd);
             for(let i =0 ; i < this.plan_nut.length - 1 ; i++){
                    for(let j = 0 ; j< this.plan_nut[i].length ; j++){
                        this.plan_nut[i][j][0].id_client = idd;
                    }
                };
                for(let i = 0 ; i< this.plan_ent.length -1 ; i++){
                    for(let j=0 ; j<this.plan_ent[i].length ; j++){
                        this.plan_ent[i][j].id_client = idd;
                    }
                }
            axios.get('/api/get-nutrition/'+this.id)
            .then(res=>{
                this.nutrition=res.data;
            })
            .catch()
        },
        clean(){
            localStorage.removeItem("id_client");
        },
        tuto(){
           console.log("this the array : "+this.nutt[0][0].name);
        },
        storeNut(){
            axios.post('/api/store_plan_nut',this.plan_nut)
            .then(res=>console.log(res.data))
            .catch(err=>console.log('this is the error: '+err))
        },
        storeEnt(){

            axios.post('/api/store_plan_ent', this.plan_ent)
                .then(res => console.log(res.data))
                .catch(err => console.log('this is the error: ' + err))

        },
        store(){
            Swal.fire({
                title: 'Vous souhaitez le duppliquer pour les semaines prochaines?',
                text: "Duppliquer",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#19647E',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non'
            }).then((result) => {
                if (result.isConfirmed) {
                    let dp=prompt("Combien de semaine?");
                   while(isNaN(dp)){
                       dp = prompt("Entrez un nombre entier valide?");
                   }
                   if(dp !== null && dp != ""){
                       this.plan_ent[6][0].duppliquer=dp;
                       this.plan_nut[6][0][0].duppliquer=dp;
                        this.storeNut();
                       this.storeEnt();
                       console.log("dp: "+dp);
                        Swal.fire(
                            'Le plan a été duppliqué en ' + dp + ' semaines !',
                        )
                   }else{
                    this.storeNut();
                    this.storeEnt();
                    Swal.fire(
                        'Le plan a été envoyé avec suuccès sans dupplication !',
                    )
                }
                }else{
                    this.storeNut();
                    this.storeEnt();
                    Swal.fire(
                        'Le plan a été envoyé avec suuccès sans dupplication !',
                    )
                }
            })


        },
        remove1_lundi(index) {
    //   this.petit_dejeuner_lundi.splice(index, 1);
      this.plan_nut[0][0].splice(index,1)
    },
        remove2_lundi(index) {
            this.plan_nut[0][1].splice(index, 1)
    },
        remove3_lundi(index) {
            this.plan_nut[0][2].splice(index, 1)
    },
    remove4_lundi(index){
        this.plan_ent[0].splice(index, 1)
    },
        remove1_mardi(index) {
            this.plan_nut[1][0].splice(index, 1)
    },
        remove2_mardi(index) {
            this.plan_nut[1][1].splice(index, 1)
    },
        remove3_mardi(index) {
            this.plan_nut[1][2].splice(index, 1)
    },
    remove4_mardi(index){
        this.plan_ent[1].splice(index, 1)
    },
        remove1_mercredi(index) {
            this.plan_nut[2][0].splice(index, 1)
    },
        remove2_mercredi(index) {
            this.plan_nut[2][1].splice(index, 1)
    },
        remove3_mercredi(index) {
            this.plan_nut[2][2].splice(index, 1)
    },
    remove4_mercredi(index){
        this.plan_ent[2].splice(index, 1)
    },
        remove1_jeudi(index) {
            this.plan_nut[3][0].splice(index, 1)
    },
        remove2_jeudi(index) {
            this.plan_nut[3][1].splice(index, 1)
    },
        remove3_jeudi(index) {
            this.plan_nut[3][2].splice(index, 1)
    },
    remove4_jeudi(index){
        this.plan_ent[3].splice(index, 1)
    },
        remove1_vendredi(index) {
            this.plan_nut[4][0].splice(index, 1)
    },
        remove2_vendredi(index) {
            this.plan_nut[4][1].splice(index, 1)
    },
        remove3_vendredi(index) {
            this.plan_nut[4][2].splice(index, 1)
    },
    remove4_vendredi(index){
        this.plan_ent[4].splice(index, 1)
    },
        remove1_samedi(index) {
            this.plan_nut[5][0].splice(index, 1)
    },
        remove2_samedi(index) {
            this.plan_nut[5][1].splice(index, 1)
    },
        remove3_samedi(index) {
            this.plan_nut[5][2].splice(index, 1)
    },
    remove4_samedi(index){
        this.plan_ent[5].splice(index, 1)
    },
        // add1_lundi(i){
        //     this.petit_dejeuner_lundi.push({
        //             nutrition:'',
        //             qt:''
        //                     });
        // },
        add1_lundi(){
           this.plan_nut[0][0].push(
            {
                   id_nutrition: 0,
                   id_client: localStorage.getItem("id_client"),
                   quantite: "",
                   repas: 1,

            }
           )
        },
        add2_lundi(i){
            this.plan_nut[0][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_lundi(i){
            this.plan_nut[0][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_lundi(i){
            this.plan_ent[0].push({
                id:"",
                    serie:"",
                    temps:"",
                    id_client:localStorage.getItem("id_client"),
            })
        },
        add1_mardi(i){
            this.plan_nut[1][0].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add2_mardi(i){
            this.plan_nut[1][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_mardi(i){
            this.plan_nut[1][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_mardi(i){
            this.plan_ent[1].push({
                id:"",
                    serie:"",
                    temps:"",
                id_client: localStorage.getItem("id_client"),
            })
        },
        add1_mercredi(i){
            this.plan_nut[2][0].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add2_mercredi(i){
            this.plan_nut[2][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_mercredi(i){
            this.plan_nut[2][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_mercredi(i){
            this.plan_ent[2].push({
                id:"",
                    serie:"",
                temps: "",
                id_client: localStorage.getItem("id_client"),
            })
        },
        add1_jeudi(i){
            this.plan_nut[3][0].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add2_jeudi(i){
            this.plan_nut[3][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_jeudi(i){
            this.plan_nut[3][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_jeudi(i){
            this.plan_ent[3].push({
                id:"",
                    serie:"",
                    temps:"",
                id_client: localStorage.getItem("id_client"),
            })
        },
        add1_vendredi(i){
            this.plan_nut[4][0].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add2_vendredi(i){
            this.plan_nut[4][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_vendredi(i){
            this.plan_nut[4][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_vendredi(i){
            this.plan_ent[4].push({
                id:"",
                    serie:"",
                    temps:"",
                id_client: localStorage.getItem("id_client"),
            })
        },
        add1_samedi(i){
            this.plan_nut[5][0].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add2_samedi(i){
            this.plan_nut[5][1].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add3_samedi(i){
            this.plan_nut[5][2].push(
                {
                    id_nutrition: 0,
                    id_client: localStorage.getItem("id_client"),
                    quantite: "",
                    repas: 1,

                }
            )
        },
        add4_samedi(i){
            this.plan_ent[5].push({
                id:"",
                    serie:"",
                    temps:"",
                id_client: localStorage.getItem("id_client"),
            })
        },
        addDash(){
            document.querySelector('.creditCardText').addEventListener('input', function(e) {
            var foo = this.value.split("-").join("");
            if (foo.length > 0) {
                foo = foo.match(new RegExp('.{1,2}', 'g')).join("-");
            }
            this.value = foo;
                });
        },


        Delete(){
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
                Swal.fire(
                'Suprrimé!',
                'Entrainement est supprimé',
                'Supprimé'
                )
                }
            })
        },

        getClients(){

            axios.get('/api/get-client/'+this.id)
            .then(res=>{
                 $(document).ready(function() {
                $('#myTable').DataTable();
                });
                this.clients=res.data;
            })
            .catch(err=>console.log('This is the error: '+err));
        },
        getClient(id){
            axios.get('/api/get-info-client/'+id)
            .then(res=>{
                this.client = res.data;
            })
           .catch(err=>console.log('This is the error: '+err));
        },

    },
    }

</script>

<style scoped>
    td,th{
        text-align: center;
    }
    .lt{
        background-color: #fcf8f8;
        padding:20px;
        border-radius: 20px;
    }
</style>
