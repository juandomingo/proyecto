// app/Lib/Error/AppExceptionRenderer.php
<?php
App::uses('EceptionRenderer', 'Error');
class AppExceptionRenderer extends ExceptionRenderer {
    public function error400($error) { 
        return $this->controller->redirect('/');
    }
}
