<?php


namespace Controllers;


class LanguageController extends AbstractController
{
    public function setLanguage($lang)
    {
        $this->sessionService->setValue(['lang' => $lang]);
        $this->redirect('../home');
    }
}