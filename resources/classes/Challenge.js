import axios from "axios";

export default class Challenge {

    constructor(id, created, updated, requestingPlayer, language, level, opposingPlayer) {
        this.id = id;
        this.created = created;
        this.updated = updated;
        this.requestingPlayer = requestingPlayer;
        this.language = language;
        this.level = level;
        this.opposingPlayer = opposingPlayer;
    }

    async postChallenge(type) {
        let url = "";

        switch (type) {
            case 'random':
                url = `/scrabble/challenge/request/${this.language}`
                break;
            case 'against':
                url = `/scrabble/challenge/request/${this.language}/against/${this.opposingPlayer.id}`
                break;
            case 'level':
                url = `/scrabble/challenge/request/${this.language}/level/${this.level}`
                break;
        }

        try {
            await axios.post(url);
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }
}