import { mount } from "@vue/test-utils";
import CardContainer from "@components/CardContainerComponent";

describe("Integration: CardContainer", () => {
  beforeEach(() => {
    jest.resetModules();
    jest.clearAllMocks();
    jest.restoreAllMocks();
    cards = [];
  });

  var cards = [];

  const build = () => {
    const card = {
      order: 0,
      type: "Prueba respuesta server",
      errorCode: 200,
      statusCode: "OK",
      output: "2",
    };

    cards.push(card);

    for (let i = 0; i < 5; i++) {
      let copyCard = Object.assign({}, card); // clono el card
      copyCard.order = i + 1;
      cards.push(copyCard);
    }

    cards[2].errorCode = 404;
    cards[2].statusCode = "Not found";

    const wrapper = mount(CardContainer, {
      propsData: {
        cards: cards,
      },
    });

    return wrapper;
  };

  /* es similar al test snapshot [T013/T014] o al unitario [T015], pero en este caso 
     mediante un test de integración. Puedo preguntar por la clase que aparece en el componente */
  test("[T016] renders cards for each card in props.cards", () => {
    const wrapper = build();
    expect(wrapper.findAll(".output-card")).toHaveLength(cards.length);
  });

  test("[T017] renders a card with class error", () => {
    const wrapper = build();
    const card = wrapper
      .findAll(".output-card")
      .filter((node) => node.text().match("404"))
      .at(0);

    expect(card.find(".error").exists()).toBe(true);
  });
});
