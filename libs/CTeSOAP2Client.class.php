<?php
/**
 * Este arquivo é parte do projeto NFePHP - Nota Fiscal eletrônica em PHP.
 *
 * Este programa é um software livre: você pode redistribuir e/ou modificá-lo
 * sob os termos da Licença Pública Geral GNU (GPL)como é publicada pela Fundação
 * para o Software Livre, na versão 3 da licença, ou qualquer versão posterior
 * e/ou
 * sob os termos da Licença Pública Geral Menor GNU (LGPL) como é publicada pela Fundação
 * para o Software Livre, na versão 3 da licença, ou qualquer versão posterior.
 *
 * Este programa é distribuído na esperança que será útil, mas SEM NENHUMA
 * GARANTIA; nem mesmo a garantia explícita definida por qualquer VALOR COMERCIAL
 * ou de ADEQUAÇÃO PARA UM PROPÓSITO EM PARTICULAR,
 * veja a Licença Pública Geral GNU para mais detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Publica GNU e da
 * Licença Pública Geral Menor GNU (LGPL) junto com este programa.
 * Caso contrário consulte <http://www.fsfla.org/svnwiki/trad/GPLv3> ou
 * <http://www.fsfla.org/svnwiki/trad/LGPLv3>.
 *
 * Está atualizada para :
 *      PHP 5.3
 *
 * Esta é a classe principal para a geração, controle e comunicação dos
 * Conhecimentos de Transporte Eletrônicos CTe
 *
 * @package   NFePHP
 * @name      CTeNFePHP
 * @version   1.0.19
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL v.3
 * @copyright 2009-2012 &copy; CTePHP
 * @link      http://www.nfephp.org/
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @author    Fabrício Veiga <fabriciostuff at gmail dot com>
 *
 *        CONTRIBUIDORES (em ordem alfabetica):
 *          Bernardo Silva <bernardo at datamex dot com dot br>
 *          Chrystian Toigo <ctoigo at gmail dot com>
 *          Fernando Mertins <fernando.mertins at gmail dot com>
 *          Herbert Silva <hebert2 at gmail dot com>
 *          Lucimar A. Magalhaes <lucimar.magalhaes at assistsolucoes dot com dot br>
 *          Matheus Marabesi <matheusmarabesi at gmail dot com>
 *          Roberto Spadim  <roberto at spadim dot com dot br>
 *          Rodrigo Rysdyk <rodrigo_rysdyk at hotmail dot com>
 *
 *
 *
 */
// Define o caminho base da instalação do sistema
if (!defined('PATH_ROOT')) {
    define('PATH_ROOT', dirname(dirname( __FILE__ )) . DIRECTORY_SEPARATOR);
}

/**
 * Classe complementar
 * necessária para a comunicação SOAP 1.2
 * Remove algumas tags para adequar a comunicação
 * ao padrão Ruindows utilizado
 *
 * @version 1.2
 * @package CTePHP
 * @author  Roberto L. Machado <linux.rlm at gmail dot com>
 *
 */
if(class_exists("SoapClient")){
    class CTeSOAP2Client extends SoapClient {
        function __doRequest($request, $location, $action, $version) {
        $request = str_replace(':ns1', '', $request);
        $request = str_replace('ns1:', '', $request);
        $request = str_replace("\n", '', $request);
        $request = str_replace("\r", '', $request);
        return parent::__doRequest($request, $location, $action, $version);
        }
    } // Fim CTeSOAP2Client
}
