<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }
	
	// Действие Action
	public function saveAction()
    {
        // Проверка метода HTTP
        if ($this->request->isPost()) {
            // Получаем запрос
			$request = $this->request;
			
			// Создаем запись авторизации
			$auth = new Auths();

			// Заполняем запись
			$auth->ip = $request->getClientAddress();
			$auth->date = date();
			$auth->token = $this->request->getPost('token');

			// Сохраняем
			if ($auth->save() === false) {
    			echo 'Ошибка сохранения в базу';
			} else {
				echo 'Успешно создана запись ID:'.$auth->getId();
			}
		}
		
	}
}

?>