import Axios from "axios";


export default class Notification {

    constructor(id, updated_at, type, notification) {
        this.id = id;
        this.updated_at = updated_at;
        this.type = type;
        this.notification = notification;
    }

    //state: delete, read, unread
    static async getNotifications(state) {
        let arrayNotifications = [];
        try {
            const promise = await Axios.get("/scrabble/user/notifications/" + state);
            Array.from(promise.data).forEach(notif => {
                arrayNotifications.push(Object.assign(new Notification, notif));
            })
            return arrayNotifications;
        } catch (error) {
            console.log("ERROR: " + error);
        }

    }

    async updateState(state) {
        try {
            await Axios.put("/scrabble/notification/" + this.id + "/update/" + state)
        } catch (error) {
            console.log("ERROR: " + error);
        }
    }
}