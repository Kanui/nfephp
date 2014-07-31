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
 *      Versão 2 dos webservices da SEFAZ com comunicação via SOAP 1.2
 *      e conforme Manual de Integração Versão 5
 *
 * Atenção: Esta classe não mantêm a compatibilidade com a versão 1.10 da SEFAZ !!!
 *
 * @package   NFePHP
 * @name      ToolsNFePHP
 * @version   3.0.77
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL v.3
 * @copyright 2009-2012 &copy; NFePHP
 * @link      http://www.nfephp.org/
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 *
 *        CONTRIBUIDORES (em ordem alfabetica):
 *
 *              Allan Rett <allanlimao at gmail dot com>
 *              Antonio Neykson Turbano de Souza <neykson at gmail dot com>
 *              Bernardo Silva <bernardo at datamex dot com dot br>
 *              Bruno Bastos <brunomauro at gmail dot com>
 *              Bruno Lima <brunofileh at gmail.com>
 *              Bruno Tadeu Porto <brunotporto at gmail dot com>
 *              Daniel Viana <daniellista at gmail dot com>
 *              Diego Mosela <diego dot caicai at gmail dot com>
 *              Edilson Carlos Belluomini <edilson at maxihelp dot com dot br>
 *              Eduardo Gusmão <eduardo.intrasis at gmail dot com>
 *              Eduardo Pacheco <eduardo at onlyone dot com dot br>
 *              Fabio A. Silva <binhoouropreto at gmail dot com>
 *              Fabricio Veiga <fabriciostuff at gmail dot com>
 *              Felipe Bonato <montanhats at gmail dot com>
 *              Fernando Mertins <fernando dot mertins at gmail dot com>
 *              Gilmar de Paula Fiocca <gilmar at tecnixinfo dot com dot br>
 *              Giovani Paseto <giovaniw2 at gmail dot com>
 *              Giuliano Nascimento <giusoft at hotmail dot com>
 *              Glauber Cini <glaubercini at gmail dot com>
 *              Guilherme Filippo <guilherme at macromind dot com dot br>
 *              Jorge Luiz Rodrigues Tomé <jlrodriguestome at hotmail dot com>
 *              Leandro C. Lopez <leandro dot castoldi at gmail dot com>
 *              Mario Almeida <prog dot almeida at gmail.com>
 *              Nataniel Fiuza <natan at laxus dot com dot br>
 *              Odair Jose Santos Junior <odairsantosjunior at gmail dot com>
 *              Paulo Gabriel Coghi <paulocoghi at gmail dot com>
 *              Paulo Henrique Demori <phdemori at hotmail dot com>
 *              Rafael Stavarengo <faelsta at gmail dot com>
 *              Roberto Spadim <rspadim at gmail dot com>
 *              Romulo Cordeiro <rrromulo at gmail dot com>
 *              Vinicius L. Azevedo <vinilazev at gmail dot com>
 *              Walber da Silva Sales <eng dot walber at gmail dot com>
 *
 */
//define o caminho base da instalação do sistema
if (!defined('PATH_ROOT')) {
    define('PATH_ROOT', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
}

/**
 * Classe complementar
 * necessária para a comunicação SOAP 1.2
 * Remove algumas tags para adequar a comunicação
 * ao padrão "esquisito" utilizado pelas SEFAZ
 *
 * @version 1.0.4
 * @package NFePHP
 * @name NFeSOAP2Client
 *
 */
if (class_exists("SoapClient")) {
    class NFeSOAP2Client extends SoapClient
    {
        function __doRequest($request, $location, $action, $version, $one_way = 0)
        {
            $request = str_replace(':ns1', '', $request);
            $request = str_replace('ns1:', '', $request);
            $request = str_replace("\n", '', $request);
            $request = str_replace("\r", '', $request);
            return parent::__doRequest($request, $location, $action, $version);
        }
    }
}
