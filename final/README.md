logeense con 

usuario:admin
password:admin

para crear usuarios, ver los reportes etc. 

!!!ATENCI�N : deben activar "permitir secuencias de comando de sitios no autorizados" p�ra poder ver los gr�ficos de highchart. El problema surge porque hightcharts usa http para las librer�as y el cliente se queja por el servidor estar sobre https.


---solucionado :::: mi trabajo final requiere que cierta carpeta tenga permisos de escritura.
La carpeta en particular es : /home/gitlab/gitlab-satellites/ayudantes/grupo_38/final/app/tmp
necesita tener permisos de escritura.

---solucionado :::: hay un problema de redirecci�n que no puse solucional, cuando se logeen y deslogueen hay que modificar la url para que quede /index.php

------------------------------------------------------------------------------------



PROYECTO DE SOFTWARE 2014
TRABAJO DE PROMOCI�N
FRAMEWORK PHP � CAKEPHP
TIBALDO JUAN AGUST�N



 Para el trabajo de promoci�n utilic� el framework CakePHP. El trabajo utilizando dicho framework fue bastante simple y fluido en general. Prob� las versiones 2.6.x y 3.0 que sali� el 22 de febrero. El trabajo final lo hice sobre 2.6.3. Tuve una gran p�rdida de tiempo al implementa el modelo de autorizaci�n, siendo que al principio iba a implementar un sistema Acl, pero despu�s de d�as decid� trabajar con un modelo m�s simple. 
 Cabe se�alar que el trabajo lo realic� solo, dado que mi grupo no aprob� la cursada.
 A continuaci�n se detallan los puntos solicitados por la c�tedra

Fundamentaci�n sobre la elecci�n del framework 
Elegido:

 El framework me lo hab�a recomendado un compa�ero el a�o pasado, me hab�a comentado que era muy sencillo de utilizar y que dispon�a de una consola muy potente que hac�a gran parte del trabajo. Al mirar varios frameworks (phalcon, yii, symphony php) y leer que era lo que opinaba la gente me decid� por utilizar CakePHP.

Las referencias de donde sacaron los materiales 
(libros, tutoriales, cursos, etc) :

B�sicamente me guie por el cookbook : http://book.cakephp.org/2.0/en/index.html el cual es la documentaci�n oficial y est� bastante completo (aunque en algunas cosas est�n pobremente documentadas como ser Acl).
 Tambi�n me gu�e por ejemplos dentro de la p�gina oficial de cakephp.
Youtube : https://www.youtube.com/watch?v=zvwQGZ1BxdM para login y autorizaci�n.

-La descripci�n de los m�dulos desarrollados en el 
trabajo de la cursada que pudieron ser 
aprovechados para ser usados por el framework:

los m�dulos que reutilic� (con modificaciones) fueron : consultas para los reportes y vistas de los reportes.
 Las consultas las tuve que pasar de PDO al sistema de consultas SQL de cakephp (poco esfuerzo de no haber cambiado el nombre de las tablas en la DB para cumplir con el est�ndar de nombres de cake.). 
 Las vistas tuvieron que ser cambiadas dado que las anteriores estaban construidas utilizando plantillas twig y cakephp utiliza plantillas ctp (b�sicamente html con php embebido).

El mecanismo provisto para el manejo de 
seguridad y routing (si es que lo tiene):

Manejo de seguridad: Consultas preparadas, formularios autogenerados, filtros de m�todos HTTP, autorizaci�n centralizada con posibilidad de deshabilitar todo salvo lo expl�citamente habilitado para determinados usuarios, validaciones en el modelo (estos fueron los que us�)
Routing: se puede redefinir el root y varios otras rutas en b�sicas en Config/routes.
En el resto de la aplicaci�n se utiliza el patr�n controlador/acci�n para direccionarse. Toda acci�n o petici�n o vista siempre est� en el �mbito de un controlador. Dichos controladores administran la aplicaci�n �ntegramente.
Adem�s se puede definir ciertas redirecciones basadas en el estado de la sesi�n. Por ejemplo a donde redireccionar ante login o logouts, fallos de autorizaci�n.

El mecanismo provisto para operaciones CRUD (si 
es que lo tiene):

La generaci�n de la aplicaci�n que permite realizar operaciones CRUD se hace a trav�s de la consola mediante interacci�n de interfaz de comandos con el usuario. Cake bake detecta nuestro modelo a partir de la base de datos una vez que �sta ha sido configurada. Luego se puede construir todo el sistema MVC a partir de estos de forma autom�tica o interviniendo en dicha creaci�n. 
 Siempre que se sigan las convenciones, adem�s detecta de manera autom�tica las relaciones entre tablas, campo descriptor de la tabla, etc.
 Luego todo el sistema de operaciones CRUD est� seteado. Aun as� posee m�todos delete, save, list, find, query para aumentar los controladores.

La forma de manejar el MVC: explicando 
detalladamente el �rbol de directories:

La aplicaci�n es generada a partir de la consola de cake. 

Los directorios que intervienen al MVC son los siguientes:
App/Controler/Component : son los controladores de la aplicaci�n, la convenci�n es camelCase del nombre de la tabla de la base de datos(si la hay) seguida por Controller.php. Adem�s se dispone de la AppController.php, superclase que permite setear comportamiento general de todos los controladores.
App/Model/Datasource/: son los modelos de la aplicaci�n, representan un modelo siendo la convenci�n utilizar el nombre del objeto en singular y camelCase. AppModel es un modelo general que permite dar comportamiento general para todos los modelos.
App/View/: ac� est�n todas las carpetas que poseen las vistas para un controlador espec�fico. Dentro de estas carpetas se pueden poner las vistas que corresponden a los m�todos que maneja un controlador, aunque esto no siempre se dar� de esta forma. Por ejemplo, nuestro UsersController posee el m�todo logout que no se corresponde a ninguna vista (ya que redirecciona al root).


La comunicaci�n entre los tres est� manejada autom�ticamente siguiente ciertos m�todos que nos da Cake para esto. 
Por ejemplo el controlador usa $this->set(�mi_variable�,$mi_variable)  para asignar $mi_variable del controlador a $mi_variable de la vista.
O $this->User->m�todo para invocar m�todos del modelo desde el controlador. 
Adem�s cada m�todo del controlador es asignado a una vista de forma autom�tica, dicha vista tiene el mismo nombre que el m�todo, como ser public function edit con la vista ecit.ctp.



											.
