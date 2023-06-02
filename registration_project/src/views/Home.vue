<script>
export default {
    methods:{
        swhitchPage(route){
            this.$router.push(`/${route}`)
        }
    }
}
</script>

<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="padding-top: 14.55%;padding-bottom: 14.55%;">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h2 class="text-center fw-bold mb-4">Sélectionnez l'action que vous souhaitez effectuer!</h2>
                        <button class="btn btn-outline-danger mb-3 p-3" @click="swhitchPage('create-participant')">
                            <i class='bx bx-user'></i>
                            Enregistrer un participant
                        </button>
                        <button class="btn btn-outline-danger p-3" @click="swhitchPage('show-participants')">
                            <i class='bx bx-table' ></i>
                            Voir la liste des participants
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark" style="padding-top: 19.55%;padding-bottom: 9.55%;">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="../assets/simplon.png" class="me-3" alt="simplon logo" height="100" width="100">
                        <h4 class="fw-bold text-white">Simplon Côte d'Ivoire</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.home {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
