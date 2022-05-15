export default class News {
    constructor(id, header, abstract, url, type, expires_at, created_at, updated_at) {
        this.id = id;
        this.header = header;
        this.abstract = abstract;
        this.url = url;
        this.type = type;
        this.expires_at = expires_at;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
}