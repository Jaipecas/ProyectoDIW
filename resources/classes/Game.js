import User from "./User";

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

    static setPrototypeGame(games) {
        let arrayGames = [];
        games.forEach(game => {
            arrayGames.push(this.createGame(game));
        });
        return arrayGames;
    }

}