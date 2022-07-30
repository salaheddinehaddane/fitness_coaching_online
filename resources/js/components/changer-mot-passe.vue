<template>
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-12">
                <div class="card" style="padding:20px; width: 50%; margin: auto;">
                    <form>
                        <div class="form-group">
                            <label class="mb-1"><strong>Votre ancien mot de passe</strong></label>
                            <input v-model="pwd" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Nouveau mot de passe</strong></label>
                            <input v-model="npwd" type="password" class="form-control">
                        </div>

                        <div class="text-center">
                            <button @click.prevent="change_pwd()" type="submit" class="btn btn-primary">Changer</button>
                        </div>
                        <div v-if="error" class="alert alert-danger mt-4">
                            Vérifier votre ancien mot de passe
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data() {
        return {
            pwd:"",
            npwd: "",
            error:false
        }
    },
    mounted() {

        if (localStorage.getItem('id') == null) {
            window.location.href = '/';
        }

    },
    methods: {
        change_pwd() {
            axios.get("/api/changer_password/"+ localStorage.getItem('id') +"/" +this.pwd+"/"+this.npwd)
                .then(res => {
                    if (res.data == 1 || res.data == "1") {
                        swal.fire(
                            "Done",
                            "Mot de passe changé"
                        )
                        this.pwd = "";
                        this.npwd = "";
                        this.error = false;

                    } else {
                        this.error = true;
                    }

                })
            .catch(err=>console.log('error :'+err))
        }

    },
}

</script>
<style scoped>

</style>


