<div align= "center">

# Instalación Plugin PrestaShop v.1.7.6.0
</div>

### Requerimientos técnicos:

- PrestaShop 1.7.6.0
- PHP 7.3

Este manual es para integrar el plugin de conekta a la plataforma de Prestashop v.1.7.6.0.
Te recomendamos trabajar sólo con esta versión para que funcione correctamente.

Una vez tengamos instalado nuestro ambiente Prestashop, pasaremos a descargar el plugin de conekta para esta versión en el siguiente link.

## Nota:

- Al descargar el plugin, obtendremos un archivo .zip. Deberás descomprimir el archivo, y encontrar la carpeta con el nombre conekta_prestashop_master; cambiar el nombre y sólo dejar conekta_prestashop. Después vuelve a comprimir la carpeta en un .zip. 
- Ahora sí podemos iniciar el siguiente proceso. 

Paso 1:
--------

- Para la instalación de plugin Conekta en prestashop, da clic en Menú en la opción de Módulos-> Module Manager, en donde te dirigirá a la siguiente página en donde deberás dar click en “Subir un módulo”.

![tutorial](/views/img/tutorial/1.1.png)

- Click en “selecciona el archivo”.

![tutorial](/views/img/tutorial/1.2.png)

- Selecciona el archivo que descargaste anteriormente con nombre conekta_prestashop.
- Una vez que termine de instalar, da clic en “Configurar”.

![tutorial](/views/img/tutorial/1.3.png)


Paso 2:
--------

- Te dirigirá a la siguiente página de configuración donde deberás llenar los campos con los datos que se solicitan. 
- Recuerda que las llaves privadas y llaves públicas que solicita esta página, las encontrarás en el Admin de Conekta.

![tutorial](/views/img/tutorial/2.1.png)

- En el botón que se encuentra del lado derecho de “Payment Method” dar clic para desplazar las opciones de pago.

![tutorial](/views/img/tutorial/2.2.png)

- Aquí deberás seleccionar las opciones que vayas a utilizar para este plugin. Al finalizar, sólo da clic en Guardar y quedará configurado plugin Conekta en nuestra página.

## Notas:

- Los meses sin sin intereses son de 3, 6, 9 y 12.
- Para poder aplicar los meses sin intereses, los montos deben de ser mayores a 100 MXN al mes, por ejemplo, el monto mínimo para aplicar a 3 meses sin intereses, es de 300 MXN.
- El máximo para realizar el pago en Oxxo es de 10,000 MXN, de exceder esta cantidad, señalará un error y no procederá el pago.






