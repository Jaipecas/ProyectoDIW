import Axios from "axios";
export default class User {

    constructor(id, name, email, type, state, country, created_at, updated_at, favourite_language, avatar, avatar_type) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.type = type;
        this.state = state;
        this.country = country;
        this.created_at = created_at;
        this.updated_at = updated_at;
        this.favourite_language = favourite_language;
        this._avatar = avatar;
        this.avatar_type = avatar_type;
    }

    get avatar() {
        if (!this._avatar) return "/img/gamer.png"
        return this._avatar;
    }
    set avatar(avatar) {
        this._avatar = avatar;
    }

    async updateProfile(old_password, new_password, new_password_confirmation) {

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

    async uploadAvatar(formData) {
        try {
            const response = await Axios.post("/scrabble/upload/avatar", formData);
            return response.data.path

        } catch (error) {
            console.log("ERROR: " + error)
        }
    }

    async removeAvatar() {
        try {
            await Axios.post("/scrabble/user/avatar/remove");

        } catch (error) {
            console.log("ERROR: " + error)
        }
    }

    async getUserGames(url) {
        try {
            const response = await Axios.get(url);
            return response.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    async getScoreHistory(lang) {
        let page = await this.getUserGames("/scrabble/user/games/");
        let scoresDates = {
            dates: [],
            scores: []
        };
        if (!page.data) return;

        this.getScoreDates(page, scoresDates, lang)

        while (page.next_page_url) {
            page = await this.getUserGames(page.next_page_url);
            this.getScoreDates(page, scoresDates, lang);
        }
        return scoresDates;
    }

    getScoreDates(page, scoreDates, lang) {
        let date;

        page.data.forEach(game => {
            if (lang === game.language && (game.state === "win_p1" || game.state === "win_p2")) {
                date = new Date(game.updated_at);
                date = date.toLocaleDateString("es-ES");

                scoreDates.dates.push(date);

                if (this.id === game.player_1) {
                    scoreDates.scores.push(game.player_1_score);
                } else {
                    scoreDates.scores.push(game.player_2_score);
                }
            }
        })
    }


}