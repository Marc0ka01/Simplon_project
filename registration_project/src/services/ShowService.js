/**
 * Ce service sert à récupérer tous les utilisateurs enregistrés dans la base de données
 * @author OKA MARC ARIEL
 */

import axios from 'axios';
import { API_SHOW_URL } from '../constant';

export async function show_participant(){
    const response = await axios.get(API_SHOW_URL, {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    });

    return response.data.participant;
}