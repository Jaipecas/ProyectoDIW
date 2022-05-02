import Axios from "axios";


export default class UserStats {

    constructor(language_code, level, won, lost, most_valuable_word, most_valuable_word_points, most_valuable_word_game, shortest_game, longest_game) {
        this.language_code = language_code;
        this.level = level;
        this.won = won;
        this.lost = lost;
        this.most_valuable_word = most_valuable_word;
        this.most_valuable_word_points = most_valuable_word_points;
        this.most_valuable_word_game = most_valuable_word_game;
        this.shortest_game = shortest_game;
        this.longest_game = longest_game;
    }

    static async getUserStats() {
        let url = "/scrabble/user/statistics"
        let userStatsList = [];
        try {
            const promise = await Axios.get(url);
            Array.from(promise.data).forEach(stats => {
                userStatsList.push(Object.assign(new UserStats, stats));
            })
            return userStatsList;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }
}