// incluye las funciones para la creacion de tarjetas
export default {
  data() {
    return {
      c_cards: [],
    };
  },
  methods: {
    createCard(title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };
      this.c_cards.push(newcard);
    },
  },
};
