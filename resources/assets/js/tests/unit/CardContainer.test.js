import { shallowMount } from "@vue/test-utils";
import CardContainer from "@components/CardContainerComponent";

// Crear una batería de tests (conjunto de test) llamada "Component: CardContainer"
describe("Component: CardContainer", () => {
  // en general todo el proceso de configuración se suele repetir para todos los test
  // asi que es habitual crear una función build que implemente todo el proceso de
  // configuración
  /* *************
   * configuración
   * ************* */
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

    const wrapper = shallowMount(CardContainer, {
      propsData: {
        cards: cards,
      },
    });

    return wrapper;
  };

  test("exists", () => {
    const wrapper = build();

    expect(wrapper.exists()).toBe(true);
  });

  test("[T008] scrolls to the right of container", () => {
    const wrapper = build();

    /* *********
     * Ejecución
     ***********/
    // ejecuto el método de manera externa
    wrapper.vm.scroll(true);

    /* ***********
     * validación
     * *********** */
    expect(wrapper.element.scrollLeft).toBe(wrapper.element.scrollWidth);
  });

  test("[T015] renders cards for each card in props.cards", () => {
    const wrapper = build();
    expect(
      wrapper.findAllComponents({ name: "OutputCardComponent" })
    ).toHaveLength(cards.length);
  });
});
