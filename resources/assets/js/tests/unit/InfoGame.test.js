import { shallowMount } from "@vue/test-utils";
import InfoGame from "@components/InfoGameComponent";

// Crear una batería de tests (conjunto de test) llamada "Component: InfoGame"
describe("Component: InfoGame", () => {
  beforeEach(() => {
    jest.resetModules();
    jest.clearAllMocks();
  });

  // en general todo el proceso de configuración se suele repetir para todos los test
  // asi que es habitual crear una función build que implemente todo el proceso de
  // configuración
  /* *************
   * configuración
   * ************* */
  const game = {
    id: 254,
    state: "turn_p1",
    language: "en",
    remaining_tokens: 14,
    total_tokens: 50,
    tableboard: "   ASD   GT  HJ       KISREDO    CASA   ",
  };

  const build = () => {
    const user = {
      id: 23,
      name: "Cameron Howe",
      email: "cameron.howe@mutiny.com",
      country: "USA",
      favourite_language: "en",
      updated_at: "2021-01-11T19:11:41.000000Z",
      tokens: [
        { value: 1, letter: "A" },
        { value: 4, letter: "Z" },
        { value: 2, letter: "Y" },
        { value: 2, letter: "Y" },
      ],
    };

    const opponent = {
      id: 15,
      name: "Gordon Clark",
      email: "gordon.clark@cardiffelectric.com",
      country: "USA",
      favourite_language: "en",
      updated_at: "2021-12-14T22:28:34.000000Z",
      tokens: [
        { value: 1, letter: "B" },
        { value: 4, letter: "W" },
        { value: 1, letter: "A" },
        { value: 6, letter: "S" },
      ],
    };

    const wrapper = shallowMount(InfoGame, {
      propsData: {
        user: user,
        opponent: opponent,
        game: game,
      },
      methods: {},
    });

    return wrapper;
  };

  test("exists", () => {
    const wrapper = build();

    expect(wrapper.exists()).toBe(true);
  });

  test("calls sendWord when button send is clicked", () => {
    const sendWord = jest.spyOn(InfoGame.methods, "sendWord");
    const wrapper = build();

    wrapper.find("#send").trigger("click");
    expect(sendWord).toHaveBeenCalled();
  });

  test("[T012] when the word is accepted the number of pieces in the bag decreases", () => {
    const word = {
      word: "interfaz",
      row: "C",
      column: "3",
      direction: "H",
    };
    const wrapper = build();
    const log = wrapper.find(".log");

    wrapper.vm.$data.word = word.word;
    wrapper.vm.sendWord();
    let newlog = game.remaining_tokens + " / " + game.total_tokens;
    expect(log.text()).toContain(newlog);
  });
});
