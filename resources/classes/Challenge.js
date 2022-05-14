import axios from "axios";

export default class Challenge {

    constructor(id, created, updated, requestingPlayer, language, level, opposingPlayer) {
        this._id = id;
        this._created = created;
        this._updated = updated;
        this._requestingPlayer = requestingPlayer;
        this._language = language;
        this._level = level;
        this._opposingPlayer = opposingPlayer;
    }

    set language(newLang) {
        this._language = newLang;
    }

    set level(newLevel) {
        this._level = newLevel;
    }

    set opposingPlayer(newOpp) {
        this._opposingPlayer = newOpp;
    }

    async postChallenge(type) {
        let url = "";

        switch (type) {
            case 'random':
                url = `/scrabble/challenge/request/${this._language}`
                break;
            case 'against':
                url = `/scrabble/challenge/request/${this._language}/against/${this._opposingPlayer.id}`
                break;
            case 'level':
                url = `/scrabble/challenge/request/${this._language}/level/${this._level}`
                break;
        }

        try {
            await axios.post(url);
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }
}