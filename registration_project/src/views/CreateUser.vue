<script>
import { create_participant } from '../services/CreateService.js'
export default {
    data() {
        return {
            nom: '',
            prenom: '',
            mail: '',
            numero: '',
            status: false,
            messageStatus: false,
            message: '',
        }
    },
    methods: {
        async create() {
            if (this.nom !== "" && this.prenom !== "" && this.mail !== "" && this.numero !== "") {
                const response = await create_participant(this.nom, this.prenom, this.mail, this.numero);
                if (response.status === true) {
                    this.$router.push('/success')
                }else{
                    this.messageStatus = true
                    this.message = response.message
                }
            }
        },
        validateNumero() {
            // Expression régulière pour vérifier si le champ contient uniquement des chiffres
            const regex = /^\d+$/;

            if (!regex.test(this.numero)) {
                this.status = true;
            } else {
                this.status = false;
            }
        }
    }
}
</script>

<template>
    <div class="section-create">
        <div class="card card-shadow rounded-0" style="width: 35rem;" @submit.prevent="create">
            <form class="card-body" autocomplete="off">
            <button class="my-4 btn btn-outline-dark px-4" @click="this.$router.push('/')"><i class='bx bx-arrow-back'></i> <span>Accueil</span> </button>
                <h5 class="card-title fw-bold mb-3">Enregistrer un participant</h5>
                <p class="text-danger mb-3" v-if="messageStatus" >{{ message }}</p>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du participant <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nom" placeholder="Kouassi" maxlength="50" v-model="nom"
                        required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom du participant <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="prenom" placeholder="Marc" maxlength="100" v-model="prenom"
                        required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Adresse email du participant <span
                            class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="Email" placeholder="example@gmail.com" maxlength="100"
                        v-model="mail" required>
                </div>

                <div class="mb-3">
                    <label for="numero" class="form-label">Numero du participant <span class="text-danger">*</span></label>
                    <input type="text" minlength="10" maxlength="10" class="form-control" id="numero"
                        placeholder="01XXXXXXXX" v-model="numero" required @input="validateNumero">
                    <p class="text-danger" v-if="status">Veuillez s'il vous plait entrer que des chiffres</p>
                </div>
                <p class="text-muted">NB: les champs marqués d'un (<span class="text-danger">*</span>) sont obligatoires.
                </p>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.section-create {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>