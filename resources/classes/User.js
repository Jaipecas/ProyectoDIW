export default class User {

    constructor(id, name, avatar, country, email, language) {
        this.id = id;
        this.name = name;
        this.avatar = avatar;
        this.country = country;
        this.email = email;
        this.language = language;
    }

    static createUser(json) {
        let user = new User(json.id, json.name, json.avatar, json.country, json.email, json.language);
        return user;
    }

}