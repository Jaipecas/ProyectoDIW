// librería de funciones de apoyo para gestionar la partida

export const ScrabbleHelper = {
  // devuelve la letra de la ficha en función del idioma
  // es necesario ya que en ocasiones una ficha tiene una letra doble
  // como la ch, la rr o la ll
  getLetter(language, code) {
    let lang = language.toUpperCase();

    switch (lang) {
      case "ES":
        if (code === "c") return "CH";
        if (code === "r") return "RR";
        if (code === "l") return "LL";
        if (code === "n") return "Ñ";
        return code;

      case "EN":
        return code;
    }
  },
  // inversa de la función anterior
  getCode(language, letter) {
    let lang = language.toUpperCase();

    switch (lang) {
      case "ES":
        if (letter === "CH") return "c";
        if (letter === "RR") return "r";
        if (letter === "LL") return "l";
        if (letter === "Ñ") return "n";
        return letter;

      case "EN":
        return letter;
    }
  },
  // devuelve un nuevo tablero con la nueva palabra insertada
  updateTableboard(tableboard, col, row, ori, word) {
    let _col = col - 1;
    let _row = row.charCodeAt(0) - 65;
    let index = _col + 15 * _row;

    if (ori == "H") {
      return (
        tableboard.substr(0, index) +
        word +
        tableboard.substr(index + word.length)
      );
    } else {
      for (let car = 0; car < word.length; car++) {
        tableboard =
          tableboard.substr(0, index) +
          word.charAt(car) +
          tableboard.substr(index + 1);
        index += 15;
      }

      return tableboard;
    }
  },
};
