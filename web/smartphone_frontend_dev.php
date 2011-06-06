<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('smartphone_frontend', 'dev', true);

# sfContext::createInstance($configuration)->dispatch();
$instance = sfContext::createInstance($configuration);
$instance->dispatch();
# $instance->getUser()->setMemberId(8);
#$this->getUser()->setCurrentAuthMode($memberConfig->getMember()->getConfig('register_auth_mode'));
#sfContext::getInstance()->getUser()->setMemberId(1);

