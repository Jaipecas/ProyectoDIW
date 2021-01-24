// mock para suplantar todo el módulo de axios
// el nombre del fichero tiene que ser igual la módulo a suplantar

module.exports = {
  post: jest.fn(() =>
    Promise.resolve({
      data: {
        path: "\\path\\to\\image",
      },
    })
  ),
};
