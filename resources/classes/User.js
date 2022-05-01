export default class User {

    constructor(id, name, email, type, state, country, created_at, favourite_language, avatar) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.type = type;
        this.state = state;
        this.country = country;
        this.created_at = created_at;
        this.favourite_language = favourite_language;
        this.avatar = avatar;
    }

}