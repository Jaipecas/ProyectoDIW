import { shallowMount } from "@vue/test-utils";
import Dashboard from "@components/DashboardTestComponent";

// Crear una batería de tests (conjunto de test) llamada "Component: Dashboard"
describe("Component: Dashboard", () => {
  const propsData = {
    user: {
      id: 23,
      name: "Cameron Howe",
      email: "cameron.howe@mutiny.com",
      country: "USA",
      favourite_language: "en",
      updated_at: "2021-01-11T19:11:41.000000Z",
    },
    avatar: "fakeImage.png",
    variables: [],
  };

  const game = {
    gameId: 20,
    lang: "es",
    oppoId: 54,
    oppoName: "Vader, Darth",
    oppoCountry: "UK",
    oppoAvatar: null,
  };

  // al ejecutar los test da un error ya que no conoce el objeto window (y por lo tanto tampoco la
  // función alert) ya que es un módulo que proporciona el navegador.
  // existen dos opciones para solucionarlo:
  // - instalarlo via npm (https://www.npmjs.com/package/window) e importarlo
  // - ya que solo queremos manipular una función del módulo, que además va a ser "mockeada" y que
  // no tiene mucho peso en entornos de producción, definirla de la manera más sencilla posible
  window.alert = () => {};

  // para cada test de la bateria
  beforeEach(() => {
    jest.resetModules();
    jest.clearAllMocks();
  });

  test("exists", () => {
    const wrapper = shallowMount(Dashboard, { propsData });

    expect(wrapper.exists()).toBe(true);
  });

  it("has listen-for-broadcast component", () => {
    const wrapper = shallowMount(Dashboard, { propsData });

    expect(wrapper.findComponent({ name: "ListenForBroadcast" }).exists()).toBe(
      true
    );
  });

  it("[T010] AcceptedChallenge received => call processBoradcastEvent", () => {
    // creo un mock espia para poder obtener si ha sido llamado o no
    // OJO!! hay que crearlo antes del montaje
    const processBroadcastEvent = jest.spyOn(
      Dashboard.methods,
      "processBroadcastEvent"
    );

    const wrapper = shallowMount(Dashboard, { propsData });

    // emito el mensaje desde uno de los componentes
    wrapper
      .findComponent({ name: "ListenForBroadcast" })
      .vm.$emit("broadcast:event", "user.2", "AcceptedChallenge", game);

    // para poder comprobar si ha sido llamado necesito pasar un mock,
    // no valdria algo como expect(wrapper.vm.processBroadcastEvent).toHaveBeenCalled();
    expect(processBroadcastEvent).toHaveBeenCalled();
  });

  // este test no tiene mucho sentido práctico ya que su objetivo es testear un alert
  // y los alerts no deberían aparecer en producción
  it("[T011] AcceptedChallenge received => show alert with game info", () => {
    const alert = jest.spyOn(window, "alert");
    const wrapper = shallowMount(Dashboard, { propsData });
    wrapper
      .findComponent({ name: "ListenForBroadcast" })
      .vm.$emit("broadcast:event", "user.2", "AcceptedChallenge", game);

    expect(alert).toHaveBeenCalled();
    // la propiedad mock de la función mockeada contiene la información espiada
    // el primer índice indica el número de la llamada, el segundo el orden del parámetro
    expect(alert.mock.calls[0][0]).toContain(game.lang);
    expect(alert.mock.calls[0][0]).toContain(game.oppoName);
  });
});
