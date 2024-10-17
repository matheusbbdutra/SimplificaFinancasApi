<?php

namespace App\Domain\Financas\Enums;

enum TipoTranscaoEnum: int
{
    case DESPESA = 1;
    case RECEITA = 2;
    case TRANSFERENCIA = 3;
    case DESPESA_CARTAO = 4;
}
