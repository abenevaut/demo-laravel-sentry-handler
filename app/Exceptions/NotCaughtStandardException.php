<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class NotCaughtStandardException extends \Exception
{
    /**
     * @return Response
     */
    public function render(): Response
    {
        return response()->json(['message' => $this->getMessage()], $this->getCode());
    }
}
