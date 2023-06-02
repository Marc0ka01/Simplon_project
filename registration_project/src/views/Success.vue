<script></script>

<template>
    <div class="success">
        <div class="card card-shadow" style="width: 30rem;">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <img src="../assets/simplon.png" alt="simplon logo" height="50" width="50" class="img-thumbnail me-3">
                    <div>
                        <p class="fw-bold">Simplon Côte d'Ivoire</p>
                    </div>
                </div>
                <h5 class="card-title text-success text-center fw-bold">Enregistrement éffectué avec succès</h5>
                <p class="card-text text-center">Vous venez d'enregistrer un participant dans la base de données. Choisissez la prochaine action que vous voulez éffectuer?</p>
                <div class="text-center">
                    <a href="/" class="nav-item me-3">Retour à la page d'accueil</a>
                    <a href="/create-participant" class="nav-item ">Ajouter un autre participant</a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.success{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>