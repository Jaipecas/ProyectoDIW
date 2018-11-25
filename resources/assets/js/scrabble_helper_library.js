// librería de funciones de apoyo para gestionar la partida

export const ScrabbleHelper = {
    
    // devuelve la letra de la ficha en función del idioma
    // es necesario ya que en ocasiones una ficha tiene una letra doble
    // como la ch, la rr o la ll
    getLetter: function(language, letter) {

        var lang = language.toUpperCase();

        switch (lang) {
            case 'ES':
                if (letter === 'c') return "CH";
                if (letter === 'r') return "RR";
                if (letter === 'l') return "LL";
                return letter;
                break;
            
            case 'EN':
                // TODO
                break;
        }  
    } 
};