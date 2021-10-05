<?php
declare(strict_types=1);
namespace HauerHeinrich\HhIndexedSearch\Middleware;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \Psr\Http\Message\ResponseInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Server\MiddlewareInterface;
use \Psr\Http\Server\RequestHandlerInterface;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

class CallIndexerMiddleware implements MiddlewareInterface {

    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        $response = $handler->handle($request);

        $tsfe = $GLOBALS['TSFE'];
        $TypoScriptFrontendHook = GeneralUtility::makeInstance(\TYPO3\CMS\IndexedSearch\Hook\TypoScriptFrontendHook::class);
        if(!$tsfe->no_cache) {
            $TypoScriptFrontendHook->indexPageContent([], $tsfe);
        }

        return $response;
    }
}
