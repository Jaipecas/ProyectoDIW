// mock para suplantar todo el módulo de axios
// el nombre del fichero tiene que ser igual al del módulo a suplantar
// ¡el módulo tiene que importarse!

/* module.exports = {
  post: jest.fn((route) => {
    return Promise.resolve({
      data: {
        path: "\\path\\to\\image",
      },
    });
  }),
}; */

module.exports = {
  post: jest.fn((route, data) => {
    // tirada
    if (route.slice(-11) == "/user/throw") {
      switch (data.word) {
        case "wrong":
          return Promise.reject({
            response: {
              status: 403,
              statusText: "Incorrect word.",
            },
          });

        case "wrongpos":
          return Promise.reject({
            response: {
              status: 403,
              statusText: "Incorrect position. There are a token in that cell",
            },
          });

        case "busy":
          return Promise.reject({
            response: {
              status: 403,
              statusText: "Incorrect position",
            },
          });

        default:
          return Promise.resolve({
            data: {
              newtokens: {
                length: data.word.length,
              },
              pscore: 36,
            },
          });
      }
    }

    // actualización del avatar
    if (route == "/scrabble/upload/avatar") {
      return Promise.resolve({
        data: {
          path: "\\path\\to\\image",
        },
      });
    }
  }),
};
