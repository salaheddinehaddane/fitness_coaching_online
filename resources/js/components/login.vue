<template>
    <div class="authincation h-100 mt-4">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Connectez-vous</h4>
                                    <form>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" v-model="user.email" class="form-control"
                                                placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Mot de passe</strong></label>
                                            <input type="password" v-model="user.password" class="form-control"
                                                value="1234">
                                        </div>

                                        <div class="text-center">
                                            <button @click.prevent="check()" type="submit"
                                                class="btn btn-primary btn-block">Connecter</button>
                                        </div>
                                        <div class="mt-4 link">
                                            <router-link to="/inscrire"> Vous êtes un coach? S'inscrire </router-link>
                                        </div>
                                        <div class="mt-4 link">
                                            <router-link to="/motpasseoublie"> Initialiser votre mot de pasee </router-link>
                                        </div>
                                        <div class="text-danger mt-4">
                                            {{error}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data(){
        return{
            user:{
                email:'salahhaddane@gmail.com',
                password:'1234'
            },
            current_user:[],
            error:'',
        }
    },
    mounted(){
        localStorage.removeItem('id');
        localStorage.removeItem('name');
    },
    methods:{
        check(){
            axios.post("/api/login",this.user)
            .then(res=>{
                this.current_user=res.data;
                if(this.current_user[0].role == "client"){
                    localStorage.setItem('id',this.current_user[0].id);
                    localStorage.setItem('name',this.current_user[0].name);
                    window.location.href = '/client/client-accueille';
                    // this.$router.push('/client/client-accueille');
                }else if(this.current_user[0].role == "coach" && this.current_user[0].abonnement == "valide"){
                    localStorage.setItem('id',this.current_user[0].id);
                    localStorage.setItem('name',this.current_user[0].name);
                    window.location.href = '/coach/accueille';
                }
                else if(this.current_user[0].role == "coach" && this.current_user[0].abonnement != "valide"){
                    localStorage.setItem('id',this.current_user[0].id);
                    localStorage.setItem('name',this.current_user[0].name);
                    window.location.href = '/renouveler';
                }
                else if(this.current_user[0].role == "admin"){
                    localStorage.setItem('id',this.current_user[0].id);
                    localStorage.setItem('name',this.current_user[0].name);
                    window.location.href = '/admin/admin-accueille';
                }else{
                    this.error="Verifier votre email ou mot de passe";
                }
            })
            .catch(err=>console.log(err));
        }
    }
}
</script>
