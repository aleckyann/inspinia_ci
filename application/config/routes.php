<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#CONFIG
$route['translate_uri_dashes'] = FALSE;
$route['404_override']                          = 'Site/error_404';
$route['500_override']                          = 'Site/error_500';


#SITE
$route['default_controller']                    = 'Site/Index';
$route['politica-de-privacidade']               = 'Site/politica_de_privacidade';
$route['termos-de-uso']                         = 'Site/termos_de_uso';
$route['perguntas-frequentes']                  = 'Site/perguntas_frequentes';
$route['criar-conta']                           = 'Site/criar_conta';
$route['chat']                                  = 'Site/chat';

#LOGIN
$route['login']                                 = 'Login/Index';


#NEWSLLETER
$route['assinar-newsletter']                    = 'Site/assinar_newsletter';

#AUTH
$route['inautenticar']                          = 'Site/inautenticar';
$route['autenticar']                            = 'Site/autenticar';
