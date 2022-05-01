import User from "./User";
import axios from "axios";

export default class Game {

    constructor(id, language, state, score1, score2, updated, player1, player2) {
        this.id = id;
        this.language = language;
        this.state = state;
        this.score1 = score1;
        this.score2 = score2;
        this.updated = updated;
        this.player1 = player1
        this.player2 = player2
    }

    static createGame(json) {
        let match = new Game(
            json.id,
            json.language,
            json.state,
            json.player_1_score,
            json.player_2_score,
            json.updated_at,
            Object.assign(new User, json.player1),
            Object.assign(new User, json.player2),
        );
        return match;
    }

    static async getUserGames(gamesPage) {
        let url = "/scrabble/user/games/"
        let arrayGames = [];

        if (gamesPage !== undefined) url += gamesPage

        try {
            const promise = await axios.get(url);
            //PREGUNTAR SOBRE SOVERSION DE JSON A OBJECT, LOS HIJOS NO SE CONVIERTEN
            Array.from(promise.data.data).forEach(game => {
                arrayGames.push(this.createGame(game));
            })
            return arrayGames;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async getPendingGames(gamesPage) {
        let arrayGames = await this.getUserGames(gamesPage);
        arrayGames = arrayGames.filter(game => game.state !== "win_p1" && game.state !== "win_p2");
        return arrayGames;
    }

}