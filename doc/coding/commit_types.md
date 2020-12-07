# Tipos de commit

Lista de tipos de commit y abreviatura/emoji a utilizar

| Tipo | abreviatura| emoji | descripción |
| :--: | :-------:  | :--- | :--------- | 
| _config_ | [cfg]| :wrench: `:wrench:`| Modificación o creación archivos de configuración |
| _feature_ | [feat] | :sparkles: `:sparkles:` | Nueva característica |
| _fix_ | [bug] | :bug: `:bug:` | Error corregido |
| _docs_ | [doc] | :memo: `:memo:` | Actualización de documentación |
| _lint_ | [lint] | :shirt: `:shirt:` | Corrección linter o compilación. En general cualquier cosa que no afecte al significado del código |
| _refactor_ | [rfct] |  :recycle: `:recycle:` | Refactorización de código | 
| _test_ | [test] | :rotating_light: `:rotating_light:` |  Cualquier cosa relacionada con testing |
| _work in progress_ | [wip] | :construction: `:construction:` | Trabajo sin finalizar |

<br/>

## Configuración

Para poder visualizar emojis en VSCode es necesario instalar y configurar algunos elementos:

1. Instalar la extensión Markdown Emoji (aparece entre las extensiones recomendadas del proyecto :mag:  _@recommended_)

2. Añadir en _editor.fontFamily_ como **última fuente**:
   - _Linux_: 'Noto Color Emoji'
   - _MacOS_:  'Apple Color Emoji'
   - _Windows_:  'Segoe UI Emoji'

3. Reiniciar VSCode

### Fuentes

- [Noto Color Emoji](https://www.google.com/get/noto/#emoji-zsye-color). Se puede instalar simplemente haciendo doble click sobre el fichero.

### Linux
Es posible que algunos emojis sean sobreescritos por otras fuentes. Para solucionarlo hay que modificar el fichero  _~/.fonts.conf_ para que quede:

```
<?xml version="1.0"?><!DOCTYPE fontconfig SYSTEM "fonts.dtd">
<fontconfig>
 <dir>~/.fonts</dir>
<alias>
 <family>sans-serif</family>
 <prefer>
   <family>Noto Color Emoji</family>
   <family>Noto Emoji</family>
 </prefer>
</alias>

<alias>
 <family>serif</family>
 <prefer>
   <family>Noto Color Emoji</family>
   <family>Noto Emoji</family>
 </prefer>
</alias>

<alias>
 <family>monospace</family>
 <prefer>
   <family>Noto Color Emoji</family>
   <family>Noto Emoji</family>
 </prefer>
</alias>

</fontconfig>
```

y posteriormente reconstruir la caché
```
sudo fc-cache -fv
```

<br/>

Basado en la [propuesta](https://gitmoji.carloscuesta.me/) de Carlos Cuesta.