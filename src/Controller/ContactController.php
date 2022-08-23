<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";

class ContactController extends AbstractController
{

    /**
     * @return string utilise la methode renderView() définie dans la classe abstrait parent abstractController 
     */
    public function index(): string
    {
        return $this->renderView("/views/template/contact/contact.php");
    }
}

?>