<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Classe responsável pelas URL da API do PagSeguro
 * Ao configurar o CodeIgnter acessará essas configurações
 */
class PagSeguro extends BaseConfig {

  /**
     * E-mail para configuração do PagSeguro
     * @var String
     */
 // public $email = "jean@uaau.digital";
  public $email = "luis.aguiarr1@gmail.com";
  
  /**
     * Token para configuração do PagSeguro
     * @var String
     */
  // public $token = "F8BE170BD99040FFB3DBABB6D296769E";
  public $token = "51f90e64-40b0-4cea-81b8-8027217a9f17c66d1a86430c85ecd1203fe8c2e8f3c805d8-e70c-40de-9580-f9a1f8c15267";

  /**
     * URL para gerar as sessões
     * Para alterar para modo de produção basta mudar para: https://ws.pagseguro.uol.com.br/v2/sessions
      * Para alterar para modo de sandbox basta mudar para: https://ws.sandbox.pagseguro.uol.com.br/v2/sessions
     * @var String
     */
  public $urlSession = 'https://ws.pagseguro.uol.com.br/v2/sessions';

  /**
     * URL para gerar as transações
      * Para alterar para modo de produção basta mudar para: https://ws.pagseguro.uol.com.br/v2/transactions/
      * Para alterar para modo de sandbox basta mudar para: https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/
     * @var String
     */
  public $urlTransaction = 'https://ws.pagseguro.uol.com.br/v2/transactions/';

  /**
     * URL para gerar as atualizações das transações
     * Para alterar para modo de produção basta mudar para: https://ws.pagseguro.uol.com.br/v3/transactions/notifications/
        * Para alterar para modo de sandbox basta mudar para: https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/
     * @var String
     */
  public $urlNotification = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/';

  /**
     * URL para gerar as atualizações recorrentes das transações
     * Para alterar para modo e produção basta mudar para: https://ws.pagseguro.uol.com.br/pre-approvals/notifications/
       * Para alterar para modo e produção basta mudar para: https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/notifications/
     * @var String
     */
  public $urlNotificationRecorrente = 'https://ws.pagseguro.uol.com.br/pre-approvals/notifications/';

  /**
    * URL para gerar os pagamentos recorrentes
     * Para alterar para modo e produção basta mudar para: 	https://ws.pagseguro.uol.com.br/pre-approvals/
       * Para alterar para modo e produção basta mudar para: 	https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/
     * @var String
     */

  public $urlRecorrente = 'https://ws.pagseguro.uol.com.br/pre-approvals/';

}
