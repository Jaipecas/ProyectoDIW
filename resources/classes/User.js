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
        this.avatar = avatar;
        this.avatar_type = avatar_type;
    }

    async updateProfile(new_password, new_password_confirmation, old_password) {
        console.log("object" + this.country);
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

}