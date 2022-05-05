import Axios from "axios";
import Game from "./Game";
export default class User {

    constructor(id, name, email, type, state, country, created_at, favourite_language, avatar) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.type = type;
        this.state = state;
        this.country = country;
        this.created_at = created_at;
        this.favourite_language = favourite_language;
        this.avatar = avatar;
    }

    async getWonGames() {
        let arrayGames = await Game.getUserGames();
        arrayGames = arrayGames.filter(game => (game.player1.name === this.name && game.score1 > game.score2) || (game.player2.name === this.name && game.score2 > game.score1));
        return arrayGames;
    }

    async getLoseGames() {
        let arrayGames = await Game.getUserGames();
        arrayGames = arrayGames.filter(game => (game.player1.name === this.name && game.score1 < game.score2) || (game.player2.name === this.name && game.score2 < game.score1));
        return arrayGames;
    }

    async updateProfile(new_password, new_password_confirmation, old_password) {
        console.log("object" + this.country);
        try {
            await Axios.put("/scrabble/user/update", {
                name: this.name,
                country: this.country,
                favourite_language: this.favourite_language,
                new_password: new_password,
                new_password_confirmation: new_password_confirmation,
                old_password: old_password,
            });

            /* falta hacer logout en el caso de que se cambie la contraseña  */
        } catch (error) {
            console.log("ERROR: " + error)
        }

    }

}