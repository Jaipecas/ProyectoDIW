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
  const build = () => {
    const cards = [];
    const newcard = {
      order: 0,
      type: "Prueba respuesta server",
      errorCode: 200,
      statusCode: "OK",
      output: "2",
    };

    for (let i = 0; i < 6; i++) {
      newcard.order = i + 1;
      cards.push(newcard);
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

  test("scrolls to the right of container", () => {
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
});
