/**
 * Ce serice gère l'enregistrement du patient dans la base de données
 * @author OKA MARC ARIEL
 * @returns {char} un tableau de chaine de caractère
 */

import axios from 'axios';
import { API_INSERT_URL } from '../constant';

export async function create_participant(nom, prenom, mail, numero){
    const formData = new FormData();
    // enregistrement des informations recueillient du formulaire dans la varible formdata
    formData.append('nom', nom);
    formData.append('prenom', prenom);
    formData.append('mail', mail);
    formData.append('numero', numero);

    const response = await axios.post(API_INSERT_URL, formData, {
        method:"POST",
        headers:{
            "Content-Type":"multipart/form-data"
        }
    });

    return response.data;
}