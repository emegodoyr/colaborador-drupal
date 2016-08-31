**Como trabajar con Sass**

considerando que los cambios en Sass deben ser aplicados en el servidor de desarrollo,
tendremos que instalar algunar depedencias para poder prepocesar Sass

_Requerimientos_

- Ruby
    - Compass (gem)
    - Sass (gem)
    
para instalar `Ruby` debemos ejecutar el comando:

`sudo apt-get install ruby-full`

una vez instalado, debemos proceder a instalar las gemas de la siguiente forma:

`gem install sass`

`gem install compass -v 0.12.7`

___

cumplido los requerimientos, debemos situarnos en la carpeta del theme, que en este caso seria

`sites/all/themes/modern`

una vez dentro de esta carpeta, debemos ejecutar el comando:

`compass compile`

y de forma automatica compilara los cambios en la carpeta CSS, recordemos que los cambios
siempre deben ser aplicados en los archivos con extension `.scss`

para mayor información, comuniquese con Moisés Godoy
