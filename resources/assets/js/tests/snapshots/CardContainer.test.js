import { mount } from "@vue/test-utils";
import CardContainer from "@components/CardContainerComponent";

/* Lo normal seria incluirlo en la prueba unitaria (de hecho gran parte del código es el mismo).
   Se separa por razones académicas */
describe("Snapshot: CardContainer", () => {
  const build = (random) => {
    const cards = [];
    const card = {
      order: 0,
      type: "Prueba respuesta server",
      errorCode: 200,
      statusCode: "OK",
      output: "2",
    };

    cards.push(card);

    // fijos
    for (let i = 0; i < 5; i++) {
      let copyCard = Object.assign({}, card); // clono el card
      copyCard.order = i + 1;
      cards.push(copyCard);
    }

    // random
    if (random) {
      const errorCode = [201, 400, 401, 403, 404, 500];
      // el código de error se genera de manera aleatoria
      cards[0].errorCode =
        errorCode[Math.floor(Math.random() * errorCode.length)];
    }

    // hago un mount para cargar tambien los componentes hijos
    const wrapper = mount(CardContainer, {
      propsData: {
        cards: cards,
      },
    });

    return wrapper;
  };

  test("[T013] should render 6 cards", () => {
    const wrapper = build(false);

    expect(wrapper.html()).toMatchSnapshot();
  });

  // objetivamente es el mismo test que el anterior, pero se ha  modificado uno de los cards
  // para que su valor sea aleatorio entre diferentes ejecuciones del test.
  // Eso podria provocar fallos en los snapshots al poder ser diferente el valor cada
  // vez que se ejecuta el test
  // test FAIL
  test("[T014] should render 6 cards (random mode)", () => {
    const wrapper = build(true);

    // deberia comprobar que los datos que se renderizan son siempre los mismos
    // esto puede pasar de manera habitual con elementos que rendericen
    // valores de tiempo relativo, por ejemplo "se conectó por última vez hace XX dias")
    expect(wrapper.html()).toMatchSnapshot();
  });
});
