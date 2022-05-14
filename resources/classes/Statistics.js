export default class Statistics {

    constructor(user_id, language_code, level, won, lost, most_valuable_word, most_valuable_word_points, most_valuable_word_game, shortest_game, longest_game) {
        this.user_id = user_id;
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

}