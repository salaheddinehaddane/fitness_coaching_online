<template>
    <div class="authincation h-100 mt-4">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Réinitialiser votre mot de passe</h4>
                                    <form>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" v-model="user.email" class="form-control"
                                                placeholder="hello@example.com">
                                        </div>

                                        <div class="text-center">
                                            <button @click.prevent="send()" type="submit"
                                                class="btn btn-primary btn-block">Envoyer-moi un email</button>
                                        </div>

                                        <div v-if="error" class=" mt-4 alert alert-danger">
                                            <span>Aucun utilisateur de ce type n’existe sur notre système</span>
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
    data() {
        return {
            user: {
                email: '',
            },
            current_user: [],
            error: false,
        }
    },
    mounted() {
        localStorage.removeItem('id');
        localStorage.removeItem('name');
    },
    methods: {
        send() {
            axios.get("api/mot_pass_oublie/" + this.user.email)
                .then(res => {
                    if(res.data === 1 || res.data === "1")  {
                        Swal.fire(
                            'Initialisé!',
                            'Vérifiez votre email',
                        ).then(
                            result => {
                                if (result.isConfirmed) {
                                    window.location.href = '/';
                                }
                            }
                        )

                    } else {
                        this.error = true;
                }
            })
        },
    }
}
</script>
