import Axios from "axios";

export default class Info {

    static async getGeneralInfo() {
        try {
            const response = await Axios.get("/api/info/general");
            return response.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async getCurrentGames(number) {
        try {
            const response = await Axios.get("/api/info/currentgames/" + number);
            return response.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async getRanking(lang, number) {
        try {
            const response = await Axios.get("/api/info/ranking/" + lang + "/" + number);
            return response.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async getNews(type) {
        try {
            const response = await Axios.get("/api/info/news/" + type);
            return response.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async searchUsers(name) {
        try {
            const promise = await Axios.get("/scrabble/search/user/live", {
                params: {
                    name: name,
                },
            })
            return promise.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

    static async getRecentChallenges() {
        try {
            const promise = await Axios.get("/api/info/currentgames/");
            return promise.data;
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }

}