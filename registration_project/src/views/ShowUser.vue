<script>
import axios from 'axios'
import { show_participant } from '../services/ShowService.js'
import { API_SEARCH_URL } from '../constant'

export default {
    data() {
        return {
            participants: [],    // liste des participants
            searchQuery: '',     // recherche
            currentPage: 1,      // Page actuelle
            pageSize: 10,        // Nombre d'éléments par page
            totalParticipants: 0 // Total des participants
        }
    },
    created() {
        this.getParticipants()
    },
    methods: {
        async getParticipants() {
            const response = await show_participant()
            this.participants = response
            this.totalParticipants = this.participants.length
        },
        async searchParticipants() {
            // const formData = new FormData()
            // formData.append('search', this.searchQuery)
            if (this.searchQuery.length >= 2) {
                const response = await axios.get(`${API_SEARCH_URL}`, {
                    method: 'GET', params: {
                        search: this.searchQuery
                    }, headers: {
                        "Content-Type": "application/json"
                    }
                });
                if (response.data && response.data.participants) {
                    this.participants = response.data.participants;
                    this.totalParticipants = this.participants.length;
                } else {
                    this.participants = [];
                }
            } else {
                this.getParticipants();
            }
        },
    },
    computed: {
        displayedParticipants() {
            if (this.participants) {
                const start = (this.currentPage - 1) * this.pageSize;
                const end = start + this.pageSize;
                return this.participants.slice(start, end);
            }
            return []
        },
        totalPages() {
            return Math.ceil(this.totalParticipants / this.pageSize);
        }
    }
}

</script>

<template>
    <div class="show-user d-flex justify-content-center align-items-center">
        <div class="container">
            <button class="my-4 btn btn-outline-dark px-4" @click="this.$router.push('/')"><i class='bx bx-arrow-back'></i>
                <span>Accueil</span> </button>
            <h2 class="card-title fw-bold mb-5">Liste des participants enregistrés</h2>
            <form class="col-md-4 mb-3" @submit.prevent="searchParticipants">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Recherche" v-model="searchQuery">
                    <button class="btn btn-danger input-group-text"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom des participants</th>
                        <th scope="col">Prénom des participants</th>
                        <th scope="col">Adresse email des participants</th>
                        <th scope="col">Numero des particiants</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(participant, index) in displayedParticipants" :key="participant.id">
                        <th scope="row">{{ participant.nom_participant }}</th>
                        <td>{{ participant.prenom_participant }}</td>
                        <td>{{ participant.mail_participant }}</td>
                        <td>{{ participant.numero_participant }}</td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example mt-4">
                <ul class="pagination">
                    <li class="page-item">
                        <button class="page-link btn btn-danger" aria-label="Previous" :disabled="currentPage === 1"
                            @click="currentPage--">
                            <span aria-hidden="true">Précédent</span>
                        </button>
                    </li>
                    <li class="page-item"><a class="page-link">{{ currentPage }}</a></li>
                    <li class="page-item">
                        <button class="page-link btn btn-danger" :disabled="currentPage === totalPages"
                            @click="currentPage++" aria-label="Next">
                            <span aria-hidden="true">Suivvant</span>
                        </button>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</template>

<style scoped>
.show-user {
    min-height: 100vh;
}

input[type=search]:focus {
    outline: none;
    box-shadow: none;
    border-color: #dee2e6;
}</style>